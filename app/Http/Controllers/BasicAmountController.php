<?php

namespace App\Http\Controllers;

use App\Models\AfterHandoverMoney;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BasicAmountController extends Controller
{
    //view all basic amount page
    // change the view file to do
    public function basic(){

        return view('basic_amount.basic');
    }

    // update basic amount page
    // change the view page with compact to do
    public function basicShowDataUpdate(Request $request){

        //$user= User::find($request->file_no);

        $user = User::where('file_no', $request->file_no)->first();
        $booking_status = BookingStatus::where('user_id', $user->id)->first();
        $down_payment= DownpaymentStatus::where('user_id', $user->id)->first();
        $car_parking= CarParkingStatus::where('user_id', $user->id)->first();
        $land_filing_1st= LandFillingStatus1st::where('user_id', $user->id)->first();
        $land_filing_2nd= LandFillingStatus2nd::where('user_id', $user->id)->first();
        $building_pilling_status=BuildingPillingStatus::where('user_id', $user->id)->first();
        $roof_casting_1st=FloorRoofCasting1st::where('user_id', $user->id)->first();
        $finishing_work=FinishingWorkStatus::where('user_id', $user->id)->first();
        $after_hand_over_money=AfterHandoverMoney::where('user_id', $user->id)->first();




        return view('basic_amount.basicUpdate',compact('booking_status','user','down_payment','car_parking','land_filing_1st','land_filing_2nd','building_pilling_status','roof_casting_1st','finishing_work','after_hand_over_money'));
    }

    public function basicUpdate(Request $request,$id){
        //booking status part
        $booking_status = BookingStatus::where('user_id', $id)->first();
        $booking_status->booking_money= $request->booking_money;
        $booking_status->booking_money_paid=$request->booking_money_paid;
        $booking_status-> booking_money_paid_date =$request->booking_money_paid_date;
        $booking_status-> booking_money_due_date =$request->booking_money_due_date;
        $booking_status->booking_money_due=$request->booking_money_due;
        $booking_status->booking_money_note=$request->booking_money_note;
        // dd($booking_status);
        $booking_status->save();


        //downpayment part
        $down_payment = DownpaymentStatus::where('user_id', $id)->first();
        $down_payment->downpayment_money= $request->downpayment_money;
        $down_payment->downpayment_money_paid=$request->downpayment_money_paid;
        $down_payment-> downpayment_money_paid_date =$request->downpayment_money_paid_date;
        $down_payment-> downpayment_money_due_date =$request->downpayment_money_due_date;
        $down_payment->downpayment_money_due=$request->downpayment_money_due;
        $down_payment->downpayment_money_note=$request->downpayment_money_note;
        $down_payment->save();




        //car_parking part
        $car_parking = CarParkingStatus::where('user_id', $id)->first();
        $car_parking->car_parking_money= $request->car_parking_money;
        $car_parking->car_parking_money_paid=$request->car_parking_money_paid;
        $car_parking-> car_parking_money_paid_date =$request->car_parking_money_paid_date;
        $car_parking-> car_parking_money_due_date =$request->car_parking_money_due_date;
        $car_parking->car_parking_money_due=$request->car_parking_money_due;
        $car_parking->car_parking_money_note=$request->car_parking_money_note;

        $car_parking->save();


        //land_filling1st part
        $land_filing_1st = LandFillingStatus1st::where('user_id', $id)->first();
        $land_filing_1st->land_filling_money= $request->land_filling_money;
        $land_filing_1st->land_filling_money_paid=$request->land_filling_money_paid;
        $land_filing_1st-> land_filling_money_paid_date =$request->land_filling_money_paid_date;
        $land_filing_1st-> land_filling_money_due_date =$request->land_filling_money_due_date;
        $land_filing_1st->land_filling_money_due=$request->land_filling_money_due;
        $land_filing_1st->land_filling_money_note=$request->land_filling_money_note;
        $land_filing_1st->save();



          //land_filling2nd part

          $land_filing_2nd = LandFillingStatus2nd::where('user_id', $id)->first();
          $land_filing_2nd->land_filling_money= $request->land_filling_money2;
          $land_filing_2nd->land_filling_money_paid=$request->land_filling_money_paid2;
          $land_filing_2nd-> land_filling_money_paid_date =$request->land_filling_money_paid_date2;
          $land_filing_2nd-> land_filling_money_due_date =$request->land_filling_money_due_date2;
          $land_filing_2nd->land_filling_money_due=$request->land_filling_money_due2;
          $land_filing_2nd->land_filling_money_note=$request->land_filling_money_note2;
          $land_filing_2nd->save();


          //land_filling2nd part

        $building_pilling_status = BuildingPillingStatus::where('user_id', $id)->first();
        $building_pilling_status->building_pilling_money= $request->building_pilling_money;
        $building_pilling_status->building_pilling_money_paid=$request->building_pilling_money_paid;
        $building_pilling_status-> building_pilling_money_paid_date =$request->building_pilling_money_paid_date;
        $building_pilling_status-> building_pilling_money_due_date =$request->land_filling_money_due_date2;
        $building_pilling_status->building_pilling_money_due=$request->building_pilling_money_due;
        $building_pilling_status->building_pilling_money_note=$request->building_pilling_money_note;
        $building_pilling_status->save();





          //roof casting  part

          $roof_casting_1st= FloorRoofCasting1st::where('user_id', $id)->first();
          $roof_casting_1st->floor_roof_casting_money_1st= $request->floor_roof_casting_money_1st;
          $roof_casting_1st->floor_roof_casting_money_paid_1st=$request->floor_roof_casting_money_paid_1st;
          $roof_casting_1st-> floor_roof_casting_money_paid_date_1st =$request->floor_roof_casting_money_paid_date_1st;
          $roof_casting_1st-> floor_roof_casting_money_due_date_1st =$request->floor_roof_casting_money_due_date_1st;
          $roof_casting_1st->floor_roof_casting_money_due_1st=$request->floor_roof_casting_money_due_1st;
          $roof_casting_1st->floor_roof_casting_money_note_1st=$request->floor_roof_casting_money_note_1st;
          $roof_casting_1st->save();





          //finishing work

          $finishing_work = FinishingWorkStatus::where('user_id', $id)->first();
          $finishing_work->finishing_work_money= $request->finishing_work_money;
          $finishing_work->finishing_work_money_paid=$request->finishing_work_money_paid;
          $finishing_work->finishing_work_money_paid_date =$request->finishing_work_money_paid_date;
          $finishing_work->finishing_work_money_due =$request->finishing_work_money_due;
          $finishing_work->finishing_work_money_due_date=$request->finishing_work_money_due_date;
          $finishing_work->finishing_work_money_note=$request->finishing_work_money_note;
          $finishing_work->save();






             //after hand over part

             $after_hand_over_money= AfterHandoverMoney::where('user_id', $id)->first();
             $after_hand_over_money->after_handover_money= $request->after_handover_money;
             $after_hand_over_money->after_handover_money_money_paid=$request->after_handover_money_money_paid;
             $after_hand_over_money-> after_handover_money_paid_date =$request->after_handover_money_paid_date;
             $after_hand_over_money-> after_handover_money_due_date =$request->after_handover_money_due_date;
             $after_hand_over_money->after_handover_money_money_due=$request->after_handover_money_money_due;
             $after_hand_over_money->after_handover_money_note=$request->after_handover_money_note;
             $after_hand_over_money->save();



             return redirect()->back();


    }


}
