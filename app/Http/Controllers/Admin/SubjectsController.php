<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTableHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subjects;
use App\Repository\SubjectRepository;
use App\Traits\ControllerHelper;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectsController extends Controller
{
    use ControllerHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subjects.index');
    }

    public function datatable(Request $request)
    {
        $query = Subjects::query();
        $result = $query->select('id', 'name', 'created_at', 'created_by', 'status')
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
            return DataTableHelper::status($result->status, url('/admin/subject/change-status/' . crypt_encrypt($result->id)));
        })
        ->editColumn('created_at', function($result) {
            return appDateFormat($result->created_at);
        })
        ->editColumn('actions', function ($result) {
            return DataTableHelper::actions($result->id, 'subjects', ['delete'], 'on-page-edit');
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
        return view('admin.subjects.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $request->user()->subjects()->create($request->all());
        flash(trans('messages.success-created'), 'success');
        return redirect()->route('subjects.index');
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
        $result = SubjectRepository::getById(crypt_decrypt($id));
        return view('admin.subjects.edit', compact('result', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $request->user()->subjects()->find(crypt_decrypt($id))->fill($request->all())->save();
        flash(trans('messages.success-updated'), 'success');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteCommonAction($id, Subjects::class);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        return $this->changeCommonStatus($id, Subjects::class);
    }
}
