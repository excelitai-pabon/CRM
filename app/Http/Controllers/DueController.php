<?php

namespace App\Http\Controllers;

use App\Models\AfterHandoverMoney;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\Installment;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;

class DueController extends Controller
{
    public function todayAllUserDue()
    {
        $todayDate = Carbon::now();
        $start = $todayDate->startOfDay();
        $start = $start->toDateTime();
        $end = $todayDate->endOfDay();
        $end = $end->toDateTime();



        $booking_status = BookingStatus::whereBetween('booking_money_due_date',[$start,$end])->get();
        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start,$end])->get();
        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start,$end])->get();
        // $car_parking = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start,$end])->get();
        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start,$end])->get();
        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start,$end])->get();
        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start,$end])->get();
        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start,$end])->get();
        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start,$end])->get();
        $installment = Installment::whereBetween('installment_due_date',[$start,$end])->get();


        return view('due.today-due',compact('booking_status','after_handover_money','building_pilling','down_payment','finishing_money','first_floor','land_filling_1st','land_filling_2nd','installment'));
    }
}
