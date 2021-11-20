<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'tbl_subjects';

    protected $fillable = [
        'subject_name',
        'class_id',
        'teacher_id',
        'total_mark',
        'pass_mark'
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class , 'teacher_id');
    }

    public function subjectclass()
    {
        return $this->belongsTo(StudentClass::class ,'class_id');
    }
}
