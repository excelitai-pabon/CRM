<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use App\Models\AfterHandoverMoney;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;



class ExcelExport implements FromCollection,WithHeadings,WithColumnWidths
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
        $bookingStatus=BookingStatus::where('user_id',$this->id)->select(
            'booking_money',
            'booking_money_payment_type',
            'booking_money_paid',
            'booking_money_due',
            'booking_money_paid_date',
            'booking_money_due_date',
            'booking_money_note',)->first();
        $afterHand=AfterHandoverMoney::where('user_id',$this->id)->select(
            'after_handover_money',
            'after_handover_money_payment_type',
            'after_handover_money_money_paid',
            'after_handover_money_money_due',
            'after_handover_money_paid_date',
            'after_handover_money_due_date',
            'after_handover_money_note',

        )->first();
        $buildingPilling=BuildingPillingStatus::where('user_id',$this->id)->select(
            'building_pilling_money',
            'building_pilling_money_payment_type',
            'building_pilling_money_paid',
            'building_pilling_money_due',
            'building_pilling_money_paid_date',
            'building_pilling_money_due_date',
            'building_pilling_money_note',
        )->first();
        $carParking=CarParkingStatus::where('user_id',$this->id)->select(
            'car_parking_money',
            'car_parking_money_payment_type',
            'car_parking_money_paid',
            'car_parking_money_due',
            'car_parking_money_paid_date',
            'car_parking_money_due_date',
            'car_parking_money_note',
        )->first();
        $downPayment=DownpaymentStatus::where('user_id',$this->id)->select(
            'downpayment_money',
            'downpayment_money_payment_type',
            'downpayment_money_paid',
            'downpayment_money_due',
            'downpayment_money_paid_date',
            'downpayment_money_due_date',
            'downpayment_money_note',

        )->first();
        $finishingWork=FinishingWorkStatus::where('user_id',$this->id)->select(
            'finishing_work_money',
            'finishing_work_money_payment_type',
            'finishing_work_money_paid',
            'finishing_work_money_due',
            'finishing_work_money_paid_date',
            'finishing_work_money_due_date',
            'finishing_work_money_note',
        )->first();
        $floorRoofCasting1st=FloorRoofCasting1st::where('user_id',$this->id)->select(
            'floor_roof_casting_money_1st',
            'floor_roof_casting_money_payment_type_1st',
            'floor_roof_casting_money_paid_1st',
            'floor_roof_casting_money_due_1st',
            'floor_roof_casting_money_paid_date_1st',
            'floor_roof_casting_money_due_date_1st',
            'floor_roof_casting_money_note_1st',
        )->first();


        $landFillingStatus1st=LandFillingStatus1st::where('user_id',$this->id)->select(
            'land_filling_money',
            'land_filling_money_payment_type',
            'land_filling_money_paid',
            'land_filling_money_due',
            'land_filling_money_paid_date',
            'land_filling_money_due_date',
            'land_filling_money_note',
        )->first();
        $landFillingStatus2nd=LandFillingStatus2nd::where('user_id',$this->id)->select(
            'land_filling_money',
            'land_filling_money_payment_type',
            'land_filling_money_paid',
            'land_filling_money_paid_date',
            'land_filling_money_due_date',
            'land_filling_money_note',
        )->first();

        return collect([
            ['1' => 'BookingStatus',  $bookingStatus->booking_money_payment_type,$bookingStatus->booking_money,$bookingStatus->booking_money_paid,$bookingStatus->booking_money_due,$bookingStatus->booking_money_paid_date,$bookingStatus->booking_money_due_date,$bookingStatus->booking_money_payment_type],
            ['2' => 'AfterHandoverMoney',  $afterHand->after_handover_money_payment_type,$afterHand->after_handover_money,$afterHand->after_handover_money_money_paid,$afterHand->after_handover_money_money_due,$afterHand->after_handover_money_paid_date,$afterHand->after_handover_money_due_date,$afterHand->after_handover_money_note],
            ['3' => 'BuildingPillingStatus',  $buildingPilling->building_pilling_money_payment_type,$buildingPilling->building_pilling_money,$buildingPilling->building_pilling_money_paid,$buildingPilling->building_pilling_money_due,$buildingPilling->building_pilling_money_paid_date,$buildingPilling->building_pilling_money_due_date,$buildingPilling->building_pilling_money_note],
            ['4' => 'CarParkingStatus',  $carParking->car_parking_money_payment_type,$carParking->car_parking_money,$carParking->car_parking_money_paid,$carParking->car_parking_money_due,$carParking->car_parking_money_paid_date,$carParking->car_parking_money_due_date,$carParking->car_parking_money_note],
            ['5' => 'DownpaymentStatus',  $downPayment->downpayment_money_payment_type,$downPayment->downpayment_money,$downPayment->downpayment_money_paid,$downPayment->downpayment_money_due,$downPayment->downpayment_money_paid_date,$downPayment->downpayment_money_due_date,$downPayment->downpayment_money_note],
            ['6' => 'FinishingWorkStatus',  $finishingWork->finishing_work_money_payment_type,$finishingWork->finishing_work_money,$finishingWork->finishing_work_money_paid,$finishingWork->finishing_work_money_due,$finishingWork->finishing_work_money_paid_date,$finishingWork->finishing_work_money_due_date,$finishingWork->finishing_work_money_note],
            ['7' => 'FloorRoofCasting1st',  $floorRoofCasting1st->floor_roof_casting_money_payment_type_1st,$finishingWork->floor_roof_casting_money_1st,$finishingWork->floor_roof_casting_money_paid_1st,$finishingWork->floor_roof_casting_money_due_1st,$finishingWork->floor_roof_casting_money_paid_date_1st,$finishingWork->floor_roof_casting_money_due_date_1st,$finishingWork->floor_roof_casting_money_note_1st],
            ['8' => 'LandFillingStatus1st',  $landFillingStatus1st->land_filling_money_payment_type,$landFillingStatus1st->land_filling_money,$landFillingStatus1st->land_filling_money_paid,$landFillingStatus1st->land_filling_money_due,$landFillingStatus1st->land_filling_money_paid_date,$landFillingStatus1st->land_filling_money_due_date,$landFillingStatus1st->land_filling_money_note],
            ['9' => 'LandFillingStatus2nd',  $landFillingStatus2nd->land_filling_money_payment_type,$landFillingStatus2nd->land_filling_money,$landFillingStatus2nd->land_filling_money_paid,$landFillingStatus2nd->land_filling_money_due,$landFillingStatus2nd->land_filling_money_paid_date,$landFillingStatus2nd->land_filling_money_due_date,$landFillingStatus2nd->land_filling_money_note],

        ]);





    }
    public function headings(): array
    {
        return [
            'Basic Information',
            'Payment_Type',
            'Amount',
            'Paid Amount',
            'Due Amount',
            'Payment Date',
            'Due Date',
            'Note',


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

