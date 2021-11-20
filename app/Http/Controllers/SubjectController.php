<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubejctRequest;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sub = Subject::query()->with('subjectclass')->with('teacher')->get();


        return view('subject.subject_list',[
            'all_sub'=> $all_sub,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = array();

       $data['all_teacher'] = Teacher::all();

       $data['class'] = StudentClass::all();


        return view('subject.subject_add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubejctRequest $request)
    {
        $data = array();

        $data['subject_name'] = $request->subject_name;
        $data['class_id'] = $request->class_id;
        $data['teacher_id'] = $request->teacher_id;
        $data['total_mark'] = $request->total_mark;
        $data['pass_mark'] = $request->pass_mark;

        Subject::insert($data);

        return back();
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

        $data = array();

        $data['all_teacher'] = Teacher::all();

        $data['class'] = StudentClass::all();
        $data['single_student'] = Subject::findOrFail($id);

        return view('subject.subject_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $single_subject = Subject::findOrFail($id);

        $single_subject->subject_name = $request->subject_name;
        $single_subject->class_id = $request->class_id;
        $single_subject->teacher_id = $request->teacher_id;
        $single_subject->total_mark = $request->total_mark;
        $single_subject->pass_mark = $request->pass_mark;

        $single_subject->update();

        $value = 'Subject Updated Successfully';

        Session::flash('alert-success',$value);
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single_students = Subject::findOrFail($id);

        $single_students->delete();

        $value = 'Subject Deleted Successfully';

        Session::flash('alert-danger',$value);

        return redirect()->route('subject.index');
    }
}
