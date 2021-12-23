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
                'file_no'=>'required|string|unique:users,file_no,'.$this->user->id,
                'member_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'father_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'mother_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'husband_wife_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'email'=>'nullable|email|unique:users,email,'.$this->user->id,
                'mailing_address'=>'nullable|string',
                'permanent_address'=>'nullable|string',
                'phone_1'=>'nullable|alpha_num|min:11',
                'phone_2'=>'nullable|alpha_num|min:11',
                'date_of_birth'=>'nullable|date',
                'national_id'=>'nullable|alpha_num',
                'profession'=>'nullable|string',
                'office_address'=>'nullable|string',
                'designation'=>'nullable|string',
                'nominee_name'=>'nullable|regex:/^[a-zA-Z ]*/',
                'relation_with_nominee'=>'nullable|regex:/^[a-zA-Z ]*/',
                'building_no'=>'nullable|string',

            ];
        }
        return [
            'crm'=>'required',
            'file_no'=>'required|string|unique:users,file_no',
            'member_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'father_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'mother_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'husband_wife_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'email'=>'nullable|email|unique:users,email',
            'mailing_address'=>'nullable|string',
            'permanent_address'=>'nullable|string',
            'phone_1'=>'nullable|alpha_num|min:11',
            'phone_2'=>'nullable|alpha_num|min:11',
            'date_of_birth'=>'nullable|date',
            'national_id'=>'nullable|alpha_num',
            'profession'=>'nullable|string',
            'office_address'=>'nullable|string',
            'designation'=>'nullable|string',
            'nominee_name'=>'nullable|regex:/^[a-zA-Z ]*/',
            'relation_with_nominee'=>'nullable|regex:/^[a-zA-Z ]*/',
            'building_no'=>'nullable|string',
            'member_image'=>'nullable|mimes:png,jpg,jpeg,svg',
            'nominee_image'=>'nullable|mimes:png,jpg,jpeg,svg',
            'password'=>'required|min:8',
        ];
    }
}
