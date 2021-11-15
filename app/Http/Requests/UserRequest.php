<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if(isset($this->user)){
            return [
                'file_no'=>'required|string',
                'member_name'=>'required|regex:/^[a-zA-Z ]*/',
                'father_name'=>'required|regex:/^[a-zA-Z ]*/',
                'mother_name'=>'required|regex:/^[a-zA-Z ]*/',
                'husband_wife_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'email'=>'required|email|unique:users,email,'.$this->user->id,
                'mailing_address'=>'required|string',
                'permanent_address'=>'nullable|string',
                'phone_1'=>'required|alpha_num|min:11',
                'phone_2'=>'nullable|alpha_num|min:11',
                'date_of_birth'=>'required|date',
                'national_id'=>'required|alpha_num',
                'profession'=>'required|string',
                'office_address'=>'nullable|string',
                'designation'=>'nullable|string',
                'nominee_name'=>'required|regex:/^[a-zA-Z ]*/',
                'relation_with_nominee'=>'required|regex:/^[a-zA-Z ]*/',
                'building_no'=>'required|string',

            ];
        }
        return [
            'file_no'=>'required|string',
            'member_name'=>'required|regex:/^[a-zA-Z ]*/',
            'father_name'=>'required|regex:/^[a-zA-Z ]*/',
            'mother_name'=>'required|regex:/^[a-zA-Z ]*/',
            'husband_wife_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'email'=>'required|email|unique:users,email',
            'mailing_address'=>'required|string',
            'permanent_address'=>'nullable|string',
            'phone_1'=>'required|alpha_num|min:11',
            'phone_2'=>'nullable|alpha_num|min:11',
            'date_of_birth'=>'required|date',
            'national_id'=>'required|alpha_num',
            'profession'=>'required|string',
            'office_address'=>'nullable|string',
            'designation'=>'nullable|string',
            'nominee_name'=>'required|regex:/^[a-zA-Z ]*/',
            'relation_with_nominee'=>'required|regex:/^[a-zA-Z ]*/',
            'building_no'=>'required|string',
            'member_image'=>'required|mimes:png,jpg,jpeg,svg',
            'nominee_image'=>'required|mimes:png,jpg,jpeg,svg',
            'password'=>'required|min:8',
        ];
    }
}
