<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $id = $this->student;
        $id = $id ? crypt_decrypt($id) : NULL;

        return [
            'name' => 'required|max:150',
            'email' => 'required|max:250|unique:students,email,id,' . $id . ',deleted_at,NULL',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required|digits_between:1,2',
            'assigned_teacher' => 'required|numeric'

        ];
    }
}
