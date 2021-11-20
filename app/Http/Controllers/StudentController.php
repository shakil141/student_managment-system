<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_student = Student::paginate();

        return view('student.all_student',['all_student'=>$all_student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_class = StudentClass::all();

        return view('student.add_student',['all_class'=>$all_class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data =array();
        $data['student_name'] = $request->student_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['parents_email'] = $request->parents_email;
        $data['class_id'] = $request->class_id;

        $image = $request->file('student_image');

        if($image == true)
        {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'studentimage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if($success)
            {
                $data['student_image'] = $image_url;

                Student::insert($data);

                return redirect()->back();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_student = Student::findOrFail($id);

        return view('student.student_profile',['single_student'=>$single_student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single_student = Student::findOrFail($id);
        $all_class = StudentClass::all();

        return view('student.edit-student',['single_student'=>$single_student],['all_class'=>$all_class]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single_student = Student::findOrFail($id);

        $single_student->delete();

        return redirect()->route('student.index');
    }
}
