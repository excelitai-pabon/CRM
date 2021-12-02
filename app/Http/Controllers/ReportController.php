<?php

namespace App\Http\Controllers;

use App\Models\AfterHandoverMoney;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\Installment;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function dailyReport(Request $request){

        $startOfTheDay = Carbon::now()->startOfDay();
        $endOfTheDay= Carbon::now()->endOfDay();


        $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $booking_status_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_paid');
        $booking_status_due_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_due');

        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $after_handover_money_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_paid');
        $after_handover_money_due_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_due');

        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $building_pilling_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_paid');
        $building_pilling_due_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_due');

        $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $car_parking_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_paid');
        $car_parking_due_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_due');

        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $down_payment_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_paid');
        $down_payment_due_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_due');

        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $finishing_money_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_paid');
        $finishing_money_due_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_due');

        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $first_floor_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_paid_1st');
        $first_floor_due_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_due_1st');

        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');

        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');


        $totalPaidAmount=$booking_status_total + $after_handover_money_total + $building_pilling_total +$car_parking_total +$down_payment_total + $finishing_money_total +$first_floor_total + $land_filling_1st_total +$land_filling_2nd_total;
        $totalDueAmount=$booking_status_due_total + $after_handover_money_due_total + $building_pilling_due_total +$car_parking_due_total +$down_payment_due_total + $finishing_money_due_total +$first_floor_total + $first_floor_due_total +$land_filling_due_2nd_total;

        return view('report.daily_report',compact('totalPaidAmount','totalDueAmount','booking_status','booking_status_total','after_handover_money','after_handover_money_total','building_pilling','building_pilling_total','car_parking','car_parking_total','down_payment','down_payment_total','finishing_money','finishing_money_total','first_floor','first_floor_total','land_filling_1st','land_filling_1st_total','land_filling_2nd','land_filling_2nd_total'));
    }


    public function monthlyReport(Request $request){


        $startOfTheDay = Carbon::now()->startOfMonth();
        $endOfTheDay= Carbon::now()->endOfMonth();

        if($request->month){
            $startOfTheDay = Carbon::parse($request->month)->startOfMonth();
            $endOfTheDay= Carbon::parse($request->month)->endOfMonth();
        }


        $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $booking_status_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_paid');
        $booking_status_due_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_due');

        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $after_handover_money_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_paid');
        $after_handover_money_due_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_due');

        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $building_pilling_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_paid');
        $building_pilling_due_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_due');

        $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $car_parking_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_paid');
        $car_parking_due_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_due');

        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $down_payment_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_paid');
        $down_payment_due_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_due');

        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $finishing_money_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_paid');
        $finishing_money_due_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_due');

        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $first_floor_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_paid_1st');
        $first_floor_due_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_due_1st');

        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');

        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');


        $totalPaidAmount=$booking_status_total + $after_handover_money_total + $building_pilling_total +$car_parking_total +$down_payment_total + $finishing_money_total +$first_floor_total + $land_filling_1st_total +$land_filling_2nd_total;
        $totalDueAmount=$booking_status_due_total + $after_handover_money_due_total + $building_pilling_due_total +$car_parking_due_total +$down_payment_due_total + $finishing_money_due_total +$first_floor_total + $first_floor_due_total +$land_filling_due_2nd_total;

        return view('report.monthly_report',compact('totalPaidAmount','totalDueAmount','booking_status','booking_status_total','after_handover_money','after_handover_money_total','building_pilling','building_pilling_total','car_parking','car_parking_total','down_payment','down_payment_total','finishing_money','finishing_money_total','first_floor','first_floor_total','land_filling_1st','land_filling_1st_total','land_filling_2nd','land_filling_2nd_total'));
    }


    public function yearlyReport(Request $request){

        $startOfTheDay = Carbon::now()->startOfYear();
        $endOfTheDay= Carbon::now()->endOfYear();

        if($request->year){
            $startOfTheDay = Carbon::parse($request->year)->startOfYear();
            $endOfTheDay= Carbon::parse($request->year)->endOfYear();

            // dd($request->year);
        }
        $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $booking_status_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_paid');
        $booking_status_due_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_due');

        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $after_handover_money_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_paid');
        $after_handover_money_due_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_due');

        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $building_pilling_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_paid');
        $building_pilling_due_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_due');

        $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $car_parking_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_paid');
        $car_parking_due_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_due');

        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $down_payment_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_paid');
        $down_payment_due_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_due');

        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $finishing_money_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_paid');
        $finishing_money_due_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_due');

        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $first_floor_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_paid_1st');
        $first_floor_due_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_due_1st');

        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');

        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
        $land_filling_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
        $land_filling_due_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_due');


        $totalPaidAmount=$booking_status_total + $after_handover_money_total + $building_pilling_total +$car_parking_total +$down_payment_total + $finishing_money_total +$first_floor_total + $land_filling_1st_total +$land_filling_2nd_total;
        $totalDueAmount=$booking_status_due_total + $after_handover_money_due_total + $building_pilling_due_total +$car_parking_due_total +$down_payment_due_total + $finishing_money_due_total +$first_floor_total + $first_floor_due_total +$land_filling_due_2nd_total;

        return view('report.yearly_report',compact('totalPaidAmount','totalDueAmount','booking_status','booking_status_total','after_handover_money','after_handover_money_total','building_pilling','building_pilling_total','car_parking','car_parking_total','down_payment','down_payment_total','finishing_money','finishing_money_total','first_floor','first_floor_total','land_filling_1st','land_filling_1st_total','land_filling_2nd','land_filling_2nd_total'));
        // if(isset($_GET['search'])){
        //     $startYear=$_GET['start'];
        //     $endYear=$_GET['end'];

        //     $startOfTheYear = Carbon::parse($startYear)->startOfYear();
        //     $endOfTheYear = Carbon::parse($endYear)->endOfYear();
        //     // dd($startOfTheYear,$endOfTheYear);

        //     $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();
        //     $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheYear,$endOfTheYear])->with('user')->get();

        //     return view('report.yearly_report',compact('booking_status','after_handover_money','building_pilling','car_parking','down_payment','finishing_money','first_floor','land_filling_1st','land_filling_2nd',));
        // }
        // $booking_status='';
        // return view('report.yearly_report',compact('booking_status'));
    }

    public function searchReport(Request $request){


        if(isset($request->basic_information)){
            // dd($request->all());

            $first_date = $_GET['start'];
            $end_date = $_GET['end'];
            $startOfTheDay = Carbon::parse($first_date)->startOfDay();
            $endOfTheDay = Carbon::parse($end_date)->endOfDay();

            // dd($request->all());


            if($request->basic_information == 'booking_money'){
                $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $booking_status_total = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('booking_money_paid');
                return view('report.search_report',compact('booking_status','booking_status_total'));

            }

            if($request->basic_information == 'down_payment'){
                $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $down_payment_total = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('downpayment_money_paid');
                return view('report.search_report',compact('down_payment','down_payment_total'));
            }

            if($request->basic_information == 'car_parking'){
                $car_parking = $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $car_parking_total = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('car_parking_money_paid');
                return view('report.search_report',compact('car_parking','car_parking_total'));
            }

            if($request->basic_information == 'land_filling_1'){
                $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $land_filling_1st_total = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
                return view('report.search_report',compact('land_filling_1st','land_filling_1st_total'));
            }

            if($request->basic_information == 'land_filling_2'){
                $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $land_filling_2nd_total = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('land_filling_money_paid');
                return view('report.search_report',compact('land_filling_2nd','land_filling_2nd_total'));
            }

            if($request->basic_information == 'building_pilling'){
                $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $building_pilling_total = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('building_pilling_money_paid');
                return view('report.search_report',compact('building_pilling','building_pilling_total'));
            }


            if($request->basic_information == 'floor_roof_casting'){
                $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $first_floor_total = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->sum('floor_roof_casting_money_paid_1st');
                return view('report.search_report',compact('first_floor','first_floor_total'));
            }

            if($request->basic_information == 'finishing_work'){
                $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $finishing_money_total = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('finishing_work_money_paid');
                return view('report.search_report',compact('finishing_money','finishing_money_total'));
            }

            if($request->basic_information == 'after_handover'){
                $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
                $after_handover_money_total =AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->sum('after_handover_money_money_paid');
                return view('report.search_report',compact('after_handover_money','after_handover_money_total'));
            }

            // if($request->basic_information == 'all'){
            //     $booking_status = BookingStatus::whereBetween('booking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $car_parking = CarParkingStatus::whereBetween('car_parking_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $down_payment = DownpaymentStatus::whereBetween('downpayment_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_paid_date_1st',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();
            // $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_paid_date',[$startOfTheDay,$endOfTheDay])->with('user')->get();

            // // dd($booking_statusNew);
            // return view('report.search_report',compact('booking_status','after_handover_money','building_pilling','car_parking','down_payment','finishing_money','first_floor','land_filling_1st','land_filling_2nd'));
            // }



            }
            return view('report.search_report');


    }


    public function pdfDailyReport(){

        $pdf = PDF::loadView('report.daily_report');
        return $pdf->download('daily-report.pdf');

   }







}
