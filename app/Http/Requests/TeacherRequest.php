<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_name' => 'required',
            'teacher_phone' => 'required|min:11',
            'teacher_email' => 'required|unique:tbl_teachers',
            'teacher_address' => 'required',
            'image' => 'required',

        ];
    }
}
