<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use App\Models\User;
use App\Models\InstallmentYear;
use App\Models\Installment;
use Illuminate\Support\Carbon;

class ExcelAllInstallmentExport  implements FromCollection,WithHeadings,WithColumnWidths
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
        ($user->installment);

        $installmentYear=InstallmentYear::where('user_id', $this->id)->first();
        $installment=Installment::with('user')->where('user_id', $this->id)->get();

        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);











        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);





        $collections=[];



        array_push($collections,$user->member_name);
        array_push($collections,$user->file_no);
        foreach($installment as $key=>$ins){
          array_push($collections,$ins->installment_paid);
          array_push($collections,$ins->installment_due);
        }
        // array_push($collections[0],$singleRow);
       return collect([$collections]);


}


    public function headings(): array
    {
        // $s = "Installment " . 10 ."," ;
        // dd($s);

        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($this->id);
        $string = '';

        $array = [];
        array_push($array,'Client Name');
        array_push($array,'File NO');



        for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)
        {

            $string = "Installment " . ($i+1);
            array_push($array,$string);

            $string = "Installment Due " .($i+1);
            array_push($array,$string);

        }

        // dd($array);

        return $array;


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




