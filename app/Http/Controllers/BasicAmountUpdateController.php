<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApproveUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BasicAmountUpdateController extends Controller
{
    //
public function basicUpdateRequest(Request $request,$id){
    $check_request=ApproveUpdate::where('user_id',$id)->get();



    if($check_request->isEmpty()){
        $user= User::where('id',$id)->first();


        // dd($request->after_handover_money_money_paid);

        $approve_status =new ApproveUpdate;

        $approve_status->user_id= $id;
        $approve_status->admin_id= 1;
        $approve_status->booking_money= $request->booking_money;
        $approve_status->booking_money_paid=$request->booking_money_paid;
        $approve_status-> booking_money_paid_date =$request->booking_money_paid_date;
        $approve_status-> booking_money_due_date =$request->booking_money_due_date;
        $approve_status->booking_money_due=$request->booking_money_due;
        $approve_status->booking_money_note=$request->booking_money_note;
        $approve_status->booking_money_payment_type=$request->booking_money_payment_type;

        //down payment
        $approve_status->downpayment_money= $request->downpayment_money;
        $approve_status->downpayment_money_paid=$request->downpayment_money_paid;
        $approve_status-> downpayment_money_paid_date =$request->downpayment_money_paid_date;
        $approve_status-> downpayment_money_due_date =$request->downpayment_money_due_date;
        $approve_status->downpayment_money_due=$request->downpayment_money_due;
        $approve_status->downpayment_money_note=$request->downpayment_money_note;
        $approve_status->downpayment_money_payment_type=$request->downpayment_money_payment_type;

        //
        $approve_status->car_parking_money= $request->car_parking_money;
        $approve_status->car_parking_money_paid=$request->car_parking_money_paid;
        $approve_status-> car_parking_money_paid_date =$request->car_parking_money_paid_date;
        $approve_status-> car_parking_money_due_date =$request->car_parking_money_due_date;
        $approve_status->car_parking_money_due=$request->car_parking_money_due;
        $approve_status->car_parking_money_note=$request->car_parking_money_note;
        $approve_status->car_parking_money_payment_type=$request->car_parking_money_payment_type;

        //

        $approve_status->land_filling_money_1= $request->land_filling_money;
        $approve_status->land_filling_money_paid_1=$request->land_filling_money_paid;
        $approve_status-> land_filling_money_paid_date_1 =$request->land_filling_money_paid_date;
        $approve_status-> land_filling_money_due_1 =$request->land_filling_money_due_date;
        $approve_status->land_filling_money_due_1=$request->land_filling_money_due;
        $approve_status->land_filling_money_note_1=$request->land_filling_money_note;
        $approve_status->land_filling_money_payment_type_1=$request->land_filling_money_payment_type;

        //land filling 2nd
        $approve_status->land_filling_money_2= $request->land_filling_money2;
        $approve_status->land_filling_money_paid_2=$request->land_filling_money_paid2;
        $approve_status-> land_filling_money_paid_date_2 =$request->land_filling_money_paid_date2;
        $approve_status-> land_filling_money_due_date_2 =$request->land_filling_money_due_date2;
        $approve_status->land_filling_money_due_2=$request->land_filling_money_due2;
        $approve_status->land_filling_money_note_2=$request->land_filling_money_note2;
        $approve_status->land_filling_money_payment_type_2=$request->land_filling_money_payment_type2;


        //
        $approve_status->building_pilling_money= $request->building_pilling_money;
        $approve_status->building_pilling_money_paid=$request->building_pilling_money_paid;
        $approve_status-> building_pilling_money_paid_date =$request->building_pilling_money_paid_date;
        $approve_status-> building_pilling_money_due_date =$request->land_filling_money_due_date2;
        $approve_status->building_pilling_money_due=$request->building_pilling_money_due;
        $approve_status->building_pilling_money_note=$request->building_pilling_money_note;

        //
        $approve_status->floor_roof_casting_money_1st= $request->floor_roof_casting_money_1st;
        $approve_status->floor_roof_casting_money_paid_1st=$request->floor_roof_casting_money_paid_1st;
        $approve_status-> floor_roof_casting_money_paid_date_1st =$request->floor_roof_casting_money_paid_date_1st;
        $approve_status-> floor_roof_casting_money_due_date_1st =$request->floor_roof_casting_money_due_date_1st;
        $approve_status->floor_roof_casting_money_due_1st=$request->floor_roof_casting_money_due_1st;
        $approve_status->floor_roof_casting_money_note_1st=$request->floor_roof_casting_money_note_1st;
        $approve_status->floor_roof_casting_money_payment_type_1st=$request->floor_roof_casting_money_payment_type_1st;


        $approve_status->finishing_work_money= $request->finishing_work_money;
        $approve_status->finishing_work_money_paid=$request->finishing_work_money_paid;
        $approve_status-> finishing_work_money_paid_date =$request->finishing_work_money_paid_date;
        $approve_status-> finishing_work_money_due =$request->finishing_work_money_due;
        $approve_status->finishing_work_money_due_date=$request->finishing_work_money_due_date;
        $approve_status->finishing_work_money_note=$request->finishing_work_money_note;
        $approve_status->finishing_work_money_payment_type=$request->finishing_work_money_payment_type;


        $approve_status->after_handover_money= $request->after_handover_money;
        $approve_status->after_handover_money_paid=$request->after_handover_money_money_paid;
        $approve_status-> after_handover_money_paid_date =$request->after_handover_money_money_paid_datw;
        $approve_status-> after_handover_money_due_date =$request->after_handover_money_due_date;
        $approve_status->after_handover_money_due=$request->after_handover_money_due;
        $approve_status->after_handover_money_note=$request->after_handover_money_note;
        $approve_status->after_handover_money_payment_type=$request->after_handover_money_payment_type;



        $approve_status->save();


        return redirect()->route('super_admin.show.request');


    }
    else{
        Session::flash('error',"Your previous request is pending");
         return redirect()->back();
     }






    }


    public function show_request(){
        $update_request=ApproveUpdate::all();

        // foreach ($update_request as $update){

        //     $user_id=$update->user_id;
        //     $user_name=User::where('id',$user_id)->select('member_name')->first();


        // }

        return view('basic_amount_request.show_request',compact('update_request'));

    }


    public function destroy_request($id){


        $request_destroy=ApproveUpdate::where('user_id',$id);
        $request_destroy->delete();

        return redirect()->route('super_admin.show.request');
    }
    public function getBasic_data($id){

        $check_request=ApproveUpdate::where('user_id',$id)->get();




    }
    public function fetch_data($id){
        $update_request=ApproveUpdate::where('user_id',$id)->first();
         return response()->json([
             'update_request'=>$update_request,
         ]);

    }


}
