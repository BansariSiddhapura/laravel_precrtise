<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
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
        //dd($this);
        $userId=$this->id ?? null;
        return [
            'fullName'=>'required',
            'email'=> "required|unique:students,email,$userId|email",
            'password'=> $userId ? 'nullable' : 'required',
            'confirm_password'=>$userId ? 'nullable' : 'required|same:password',
            'gender'=>'required',
            'date_of_birth'=>'required|date|after:today|before:2024-12-30',
            'courses'=>'required',
            'subjects'=>'required|size:3',
            //'subjects'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'subjects.size'=>'select atleast 3 subjects',
            'confirm_password.same'=>"password don't match",
            'date_of_birth.after'=>"you only enter date after today",
            'date_of_birth.before'=>'you only enter date before 30-12-2024'
        ];
    }
    // public function passedValidation(){
    //     $this->merge([
    //         'password'=>Hash::make($this->password)
    //     ]);
    // }
}
