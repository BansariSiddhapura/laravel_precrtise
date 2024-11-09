<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'=>'required',
            'email'=>'required|unique:students,email|email',
            'gender'=>'required',
            'date_of_birth'=>'required|date',
            'course'=>'required',
            'subjects'=>'required|size:3',
        ];
    }
    public function messages()
    {
        return[
            'subjects.size'=>'select atleast 3 subjects'
        ];
    }
}
