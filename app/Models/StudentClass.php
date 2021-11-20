<?php

namespace App\Models;

use App\Constants\ApplicationConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = 'tbl_classes';

    protected $perPage = 5;

    protected $fillable = [
        'class_name',
        'status'
    ];

    public function getStatusAttribute($value)
    {
        if($value == ApplicationConstant::ACTIVE)
        {
            return "Active";
        }
        else{
            return "InActive";
        }
    }

    public function subject()
    {
        return $this->hasMany(Subject::class , 'class_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class , 'class_id');
    }

}
