<?php

namespace App\Exports;



use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;
    public function __construct($id)
    {
        $this->id = $id;

    }

    public function sheets(): array
    {
        $sheets = [];


            $sheets[0] = new ExcelExport($this->id);
            $sheets[1] = new ExcelInstallmentExport($this->id);
            $sheets[2] = new ExcelAllInstallmentExport($this->id);




        return $sheets;
    }
}
