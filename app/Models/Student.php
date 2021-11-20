<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =[
        'student_name',
        'email',
        'phone',
        'parents_email',
        'student_image',
        'class_id'
    ];

    public function class()
    {
        return $this->belongsTo(StudentClass::class , 'class_id');
    }

}
