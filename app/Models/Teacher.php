<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'tbl_teachers';

    protected $fillable =[
        'teacher_name',
        'teacher_phone',
        'teacher_email',
        'teacher_address',
        'image',
        'class_id'
    ];

    protected $perPage = 5;

    public function subject()
    {
        return $this->hasMany(Subject::class , 'teacher_id');
    }
}
