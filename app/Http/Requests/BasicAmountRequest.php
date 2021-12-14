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



        return [
            'total_amount'=>'required|numeric',
            'installment_number'=>'required|numeric',
            'booking_money'=>"nullable|numeric",
            'installment_amount'=>'required|numeric',
            'installment_start_date'=>'required',
            'installment_years_amount'=>'required|array',

            'booking_money_paid'=>"nullable|numeric|max:{$this->booking_money}",
            'downpayment_money_paid'=>"nullable|numeric|max:{$this->downpayment_money}",
            'car_parking_money_paid'=>"nullable|numeric|max:{$this->car_parking_money}",
            'land_filling_money_paid'=>"nullable|numeric|max:{$this->land_filling_money}",
            'land_filling_money_paid2'=>"nullable|numeric|max:{$this->land_filling_money2}",
            'building_pilling_money_paid'=>"nullable|numeric|max:{$this->building_pilling_money}",
            'floor_roof_casting_money_1st'=>"nullable|numeric|max:{$this->floor_roof_casting_money_paid_1st}",
            'finishing_work_money_paid'=>"nullable|numeric|max:{$this->finishing_work_money}",
            'after_handover_money_money_paid'=>"nullable|numeric|max:{$this->after_handover_money}",
        ];
    }
}
