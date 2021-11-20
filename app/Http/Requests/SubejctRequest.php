<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubejctRequest extends FormRequest
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
            'subject_name' => 'required|unique:tbl_subjects',
            'class_id' => 'required',
            'teacher_id' => 'required',
            'total_mark' => 'required|numeric',
            'pass_mark' => 'required|numeric'
        ];
    }
}
