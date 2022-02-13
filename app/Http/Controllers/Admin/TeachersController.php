<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTableHelper;
use App\Helpers\StaticData;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teachers;
use App\Repository\TeacherRepository;
use App\Traits\ControllerHelper;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeachersController extends Controller
{
    use ControllerHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teachers.index');
    }

    public function datatable(Request $request)
    {
        $query = Teachers::query();
        $result = $query->select('id', 'name', 'email', 'created_at', 'created_by', 'status')
        ->createdBy()
        ->orderBy('id', 'DESC')
        ->get();

        return DataTables::of($result)
        ->addIndexColumn()
        ->editColumn('created_by', function($result) {
            return $result->added_by->name;
        })
        ->editColumn('name', function($result) {
            return ucFirst($result->name);
        })
        ->editColumn('status', function($result) {
            return DataTableHelper::status($result->status, url('/admin/teachers/change-status/' . crypt_encrypt($result->id)));
        })
        ->editColumn('created_at', function($result) {
            return appDateFormat($result->created_at);
        })
        ->editColumn('actions', function ($result) {
            return DataTableHelper::actions($result->id, 'teachers', [], 'on-page-edit');
        })
        ->rawColumns(['actions', 'status', 'name'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $request['dob'] = date('Y-m-d', strtotime($request->dob));
        $request->user()->teachers()->create($request->all());
        flash(trans('messages.success-created'), 'success');
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = TeacherRepository::getById(crypt_decrypt($id));
        return view('admin.teachers.edit', compact('result', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $request->user()->teachers()->find(crypt_decrypt($id))->fill($request->all())->save();
        flash(trans('messages.success-updated'), 'success');
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteCommonAction($id, Teachers::class);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        return $this->changeCommonStatus($id, Teachers::class);
    }
}
