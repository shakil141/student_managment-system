<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'tbl_marks';

    protected $fillable = [
        'class_id',
        'student_name',
        'subject_name',
        'mark'
    ];

    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'class_id');
    }

    public function subjectname()
    {
        return $this->belongsTo(StudentClass::class, 'teacher_id');
    }
}
