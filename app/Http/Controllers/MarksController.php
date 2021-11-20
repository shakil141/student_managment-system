<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use App\Models\Mark;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarksController extends Controller
{
    public function index()
    {
        $all_classes = StudentClass::all();
        $all_students = Student::get();
        $all_marks = Mark::get();
        $all_subjects = Subject::all();

        return view('mark.mark_index',['all_classes'=>$all_classes,'all_students'=>$all_students,'all_marks'=>$all_marks,'all_subjects'=>$all_subjects]);
    }

    public function classWiseSubject($id)
    {
        $subjects = Subject::query()->where('class_id',$id)->get();

        return response()->json($subjects);
    }

    public function classWiseStudent($id)
    {
        $students = Student::query()->where('class_id',$id)->get();

        return response()->json($students);
    }

    public function markStore(Request $request)
    {
        $mark = new Mark;

        $mark->fill($request->all())->save();

        return back();


    }

    public function sentMail($id)
    {
       $students =  Student::findOrFail($id);

       $details = [
        'title' => 'Mail from ItSolution.com',
        'body' => 'Mr. Parents, if your son files for this exam, you will come to our school very soon and see you.'
        ];

       Mail::to($students->parents_email)->send(new MyTestMail($details));

       return back();
    }

}
