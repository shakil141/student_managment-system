<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $all_teacher = Teacher::paginate();

       return view('Teacher.teacher_list',['all_teacher'=>$all_teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = StudentClass::all();

        return view('Teacher.add_teacher',['class'=>$class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {

        $data =array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_phone'] = $request->teacher_phone;
        $data['teacher_email'] = $request->teacher_email;
        $data['teacher_address'] = $request->teacher_address;
        $data['class_id'] = $request->class_id;


        $image = $request->file('image');

        if($image == true)
        {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'teacherimage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if($success == true)
            {
                $data['image'] = $image_url;

                Teacher::insert($data);

                $value = "Added New Teacher Successfully";

                Session::flash('alert-success',$value);

                return redirect()->route('teacher.index');

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
        $single_teacher = Teacher::findOrFail($id);

        return view('Teacher.teacher_profile',['single_teacher'=>$single_teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single_teacher = Teacher::findOrFail($id);
        $class = StudentClass::all();

        return view('Teacher.teacher_edit',['single_teacher'=>$single_teacher],['class'=>$class]);
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
        $single_teacher = Teacher::findOrFail($id);

        $single_teacher->teacher_name = $request->teacher_name;
        $single_teacher->teacher_phone = $request->teacher_phone;
        $single_teacher->teacher_email = $request->teacher_email;
        $single_teacher->teacher_address = $request->teacher_address;
        $single_teacher->class_id = $request->class_id;

       if($request->hasFile('image'))
       {
            $destination = 'teacherimage/'.$single_teacher->image;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;
            $file->move('teacherimage/',$fileName);

            $single_teacher->image = $fileName;
       }

        $single_teacher->update();

        $value = "Teacher Updated Successfully";

        Session::flash('alert-success',$value);


        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single_teacher = Teacher::findOrFail($id);

        $single_teacher->delete();

        return redirect()->back();
    }
}
