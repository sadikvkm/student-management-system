<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTableHelper;
use App\Helpers\StaticData;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Students;
use App\Repository\StudentRepository;
use App\Repository\TeacherRepository;
use App\Traits\ControllerHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{
    use ControllerHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.students.index');
    }

    public function datatable(Request $request)
    {
        $query = Students::query();
        $result = $query->select('id', 'name', 'email', 'dob', 'gender', 'created_at', 'created_by', 'status', 'assigned_teacher')
        ->createdBy()
        ->assignedTeacher()
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
        ->editColumn('age', function($result) {
            return Carbon::parse($result->dob)->diff(Carbon::now())->y;
        })
        ->editColumn('gender', function($result) {
            return StaticData::gender($result->gender);
        })
        ->editColumn('assigned_teacher', function($result) {
            return $result->teacher->name;
        })
        ->editColumn('status', function($result) {
            return DataTableHelper::status($result->status, url('/admin/students/change-status/' . crypt_encrypt($result->id)));
        })
        ->editColumn('created_at', function($result) {
            return appDateFormat($result->created_at);
        })
        ->editColumn('actions', function ($result) {
            return DataTableHelper::actions($result->id, 'students', [], 'on-page-edit');
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
        $gender = StaticData::gender();
        $assignedTeacher = TeacherRepository::getAllTeachers(['id', 'name'])->pluck('name', 'id');
        return view('admin.students.new', compact('gender', 'assignedTeacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $request->user()->students()->create($request->all());
        flash(trans('messages.success-updated'), 'success');
        return redirect()->route('students.index');
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
        $gender = StaticData::gender();
        $assignedTeacher = TeacherRepository::getAllTeachers(['id', 'name'])->pluck('name', 'id');
        $result = StudentRepository::getById(crypt_decrypt($id));
        return view('admin.students.edit', compact('gender', 'assignedTeacher', 'id', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $request->user()->students()->find(crypt_decrypt($id))->fill($request->all())->save();
        flash(trans('messages.success-updated'), 'success');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteCommonAction($id, Students::class);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        return $this->changeCommonStatus($id, Students::class);
    }
}
