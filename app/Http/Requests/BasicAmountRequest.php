<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicAmountRequest extends FormRequest
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
        // dd($this->all());
        return [
            'total_amount'=>'required|numeric',
            'installment_number'=>'required|numeric',
            'booking_money'=>'required|numeric',
            'installment_amount'=>'required|numeric',
            'installment_start_date'=>'required',
            'installment_years_amount'=>'required|array',
        ];
    }
}
