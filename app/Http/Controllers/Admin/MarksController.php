<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTableHelper;
use App\Helpers\StaticData;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkRequest;
use App\Models\Marks;
use App\Models\SubjectMarks;
use App\Repository\StudentRepository;
use App\Repository\SubjectMarkRepository;
use App\Repository\SubjectRepository;
use App\Traits\ControllerHelper;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MarksController extends Controller
{
    use ControllerHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.marks.index');
    }

    public function datatable(Request $request)
    {
        $query = Marks::query();
        $result = $query->select('id', 'created_by', 'student_id', 'terms', 'created_at', 'status')
        ->createdBy()
        ->student()
        ->subjectMarks()
        ->orderBy('id', 'DESC')
        ->get();

        return DataTables::of($result)
        ->addIndexColumn()
        ->editColumn('name', function($result) {
            return ucfirst($result->student_details->name);
        })
        ->editColumn('maths', function($result) {
            return findObjectById($result->marks, 1, 'subject_id', 'marks');
        })
        ->editColumn('science', function($result) {
            return findObjectById($result->marks, 2, 'subject_id', 'marks');
        })
        ->editColumn('history', function($result) {
            return findObjectById($result->marks, 3, 'subject_id', 'marks');
        })
        ->editColumn('total', function($result) {
            return array_sum(array_column(json_decode($result->marks), 'marks'));
        })
        ->editColumn('terms', function($result) {
            return StaticData::terms($result->terms);
        })
        ->editColumn('created_by', function($result) {
            return $result->added_by->name;
        })
        ->editColumn('status', function($result) {
            return DataTableHelper::status($result->status, url('/admin/marks/change-status/' . crypt_encrypt($result->id)));
        })
        ->editColumn('created_at', function($result) {
            return appDateFormat($result->created_at);
        })
        ->editColumn('actions', function ($result) {
            return DataTableHelper::actions($result->id, 'marks', [], 'on-page-edit');
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
        $allSubjects = SubjectRepository::getAllSubjects(['id', 'name']);
        $students = StudentRepository::getAllStudents(['id', 'name'])->pluck('name', 'id');
        $terms = StaticData::terms();
        $subjects = [];
        foreach($allSubjects as $subject) {
            $subjects[] = [
                'id' => crypt_encrypt($subject->id),
                'name' => $subject->name
            ];
        }
        return view('admin.marks.new', compact('subjects', 'students', 'terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $result = $request->user()->marks()->create($request->all());
        foreach($request->subject_id as $key => $subject) {
            SubjectMarkRepository::createData($result->id, crypt_decrypt($subject), $request['marks_' . $key]);
        }
        flash(trans('messages.success-created'), 'success');
        return redirect()->route('marks.index');
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
        $allSubjects = SubjectRepository::getAllSubjects(['id', 'name']);
        $students = StudentRepository::getAllStudents(['id', 'name'])->pluck('name', 'id');
        $terms = StaticData::terms();
        $result = Marks::findOrFail(crypt_decrypt($id));
        $subjects = [];
        foreach($allSubjects as $subject) {
            $subjects[] = [
                'id' => crypt_encrypt($subject->id),
                'name' => $subject->name,
                'marks' => findObjectById($result->marks, $subject->id, 'subject_id', 'marks')
            ];
        }
        return view('admin.marks.edit', compact('subjects', 'students', 'terms', 'id', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkRequest $request, $id)
    {
        $id = crypt_decrypt($id);
        $request->user()->marks()->find($id)->fill($request->all())->save();
        SubjectMarks::where('mark_id', $id)->delete();
        foreach($request->subject_id as $key => $subject) {
            SubjectMarkRepository::createData($id, crypt_decrypt($subject), $request['marks_' . $key]);
        }
        flash(trans('messages.success-updated'), 'success');
        return redirect()->route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteCommonAction($id, Marks::class);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        return $this->changeCommonStatus($id, Marks::class);
    }
}
