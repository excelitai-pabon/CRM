<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use App\Models\User;
use App\Models\InstallmentYear;
use App\Models\Installment;
use Illuminate\Support\Carbon;




class ExcelInstallmentExport implements FromCollection,WithHeadings,WithColumnWidths
{

    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id) {
           $this->id = $id;


    }



    public function collection()
    {
        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($this->id);

        $installmentYear=InstallmentYear::where('user_id', $this->id)->first();
        $installment=Installment::where('user_id', $this->id)->get();
        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);
        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);


        $collections=[];
        foreach($installment as $key=>$ins){

            $installment=[
                '0'=> $ins->installment_no,
                $ins->installment_amount,
                $ins->payment_installment_type,
                $ins->installment_paid,
                $ins->installment_due,
                $ins->installment_date,
                $ins->installment_due_date
            ];
            array_push($collections,$installment);
        }

        return collect([$collections]);



    }

    public function headings(): array
    {
        return [
            'Installment No',
            'Instalment Amount',
            'Payment Type',
            'Paid Amount',
            'Due Amount',
            'Payment Date',
            'Due Date',


        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 25,
            'C' => 25,
            'D' => 25,
            'E' => 30,
            'F' => 30,
            'G' => 25,
        ];
    }

}




