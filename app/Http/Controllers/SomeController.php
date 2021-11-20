<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function unactive($class_id)
    {
        StudentClass::where('id',$class_id)->update(['status' => 0]);

        return redirect()->back();
    }

    public function active($class_id)
    {
        StudentClass::where('id',$class_id)->update(['status'=> 1]);


        return redirect()->back();
    }

}
