<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicAmountRequest;
use App\Models\AfterHandoverMoney;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\Installment;
use App\Models\InstallmentYear;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use App\Models\TotalAmount;
use App\Models\TotalInstallmentAmount;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ApproveUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BasicAmountController extends Controller
{
    //view all basic amount page
    // change the view file to do
    public function basic(){

        return view('basic_amount.basic');
    }

    public function addBasicAmountSearch(){

        return view('basic_amount.basic_add_search');
    }

    public function createBasicAmount(Request $request){
        // dd($request->all());
        //dd(Auth::guard('employee')->check());

        $file_no=$request->file_no;

        if(Auth::guard('admin')->check()){
            $user= User::where('file_no',$file_no)->where('crm_id',Auth::guard('admin')->user()->crm_id)->first();
        }
        if(Auth::guard('employee')->check()){
            $user= User::where('file_no',$file_no)->where('crm_id',Auth::guard('employee')->user()->crm_id)->first();
        }else{
            $user= User::where('file_no',$file_no)->first();
        }

        if($user){
            $total=TotalAmount::where('user_id',$user->id)->first();

            if($total){
                return redirect()->back()->with(['error'=>'This user basic information al-ready exits']);
            }
        }else{
            return redirect()->back()->with(['error'=>'This user not  exits']);
        }

        return view('basic_amount.basic_add',compact('user'));
    }

    public function basicAmountStore(BasicAmountRequest $request, User $user){

        // dd($request->all());


        //Total amount
        $totalAmount=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'total_amount'=>$request->total_amount,
            'description'=>$request->total_amount_note,
        ];
        TotalAmount::create($totalAmount);

        // Total Installment Amount
        TotalInstallmentAmount::create([
            'user_id'=>$user->id,
            'number_of_installment'=>$request->installment_number,
            'total_installment_amount'=>$request->installment_amount,
            'installment_starting_date'=>$request->installment_start_date,
            'description'=>$request->installment_amount_note,
        ]);

        //Installment Years
        $istallment_Year=ceil($request->installment_number/12);
        $installmentYears=[
            'user_id'=>$user->id,
            'installment_years'=>$istallment_Year,
            'installment_years_amount'=>$request->installment_years_amount,
        ];
        InstallmentYear::create($installmentYears);

        // Bokking Money
        if($request->booking_money_paid>$request->booking_money){


            Session::flash('error',"Check the amount fields");
            return redirect()->back();
        }

        else{

        $booking_money_due=$request->booking_money-$request->booking_money_paid;


        $bookingMoney=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_booking_money'=>$request->initial_booking_money,
            'booking_money'=>$request->booking_money,
            'booking_money_payment_type'=>$request->booking_money_payment_type,
            'booking_money_paid'=>$request->booking_money_paid,
            'booking_money_due'=>$booking_money_due,
            'booking_money_paid_date'=>$request->booking_money_paid_date,
            'booking_money_due_date'=>$request->booking_money_due_date,
            'booking_money_note'=>$request->booking_money_note,
        ];
        BookingStatus::create($bookingMoney);
        }


        //Down Payment
        if($request->downpayment_money_paid>$request->downpayment_money){


            Session::flash('error',"Check the amount fields");
            return redirect()->back();
        }
        else{


        $down_payment_due=$request->downpayment_money - $request->downpayment_money_paid;
        $downPayment=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_downpayment_money'=>$request->initial_downpayment_money,
            'downpayment_money'=>$request->downpayment_money,
            'downpayment_money_payment_type'=>$request->downpayment_money_payment_type,
            'downpayment_money_paid'=>$request->downpayment_money_paid,
            'downpayment_money_due'=>$down_payment_due,
            'downpayment_money_paid_date'=>$request->downpayment_money_paid_date,
            'downpayment_money_due_date'=>$request->downpayment_money_due_date,
            'downpayment_money_note'=>$request->downpayment_money_note,
        ];
        DownpaymentStatus::create($downPayment);
    }
        //Car Parking

        if($request->car_parking_money_paid>$request->car_parking_money){
            Session::flash('error',"Check the amount fields");
            return redirect()->back();
        }

        else{
            $car_parking_due=$request->car_parking_money - $request->car_parking_money_paid;
        $carParking=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_car_parking_money'=>$request->initial_car_parking_money,
            'car_parking_money'=>$request->car_parking_money,
            'car_parking_money_payment_type'=>$request->car_parking_money_payment_type,
            'car_parking_money_paid'=>$request->car_parking_money_paid,
            'car_parking_money_due'=>$car_parking_due,
            'car_parking_money_paid_date'=>$request->car_parking_money_paid_date,
            'car_parking_money_due_date'=>$request->car_parking_due_date,
            'car_parking_money_note'=>$request->car_parking_money_note,
        ];
        CarParkingStatus::create($carParking);

        }


        //1st Land Filling

        if($request->land_filling_money_paid>$request->land_filling_money){
            Session::flash('error',"Check the amount fields");
            return redirect()->back();
        }
        else{
            $land_filling_due= $request->land_filling_money - $request->land_filling_money_paid;
            $lanfFilling=[
                'user_id'=>$user->id,
                'crm_id'=>$user->crm_id,
                'initial_land_filling_money'=>$request->initial_land_filling_money,
                'land_filling_money'=>$request->land_filling_money,
                'land_filling_money_payment_type'=>$request->land_filling_money_payment_type,
                'land_filling_money_paid'=>$request->land_filling_money_paid,
                'land_filling_money_due'=>$land_filling_due,
                'land_filling_money_paid_date'=>$request->land_filling_money_paid_date,
                'land_filling_money_due_date'=>$request->land_filling_money_due_date,
                'land_filling_money_note'=>$request->land_filling_money_note,
            ];
            LandFillingStatus1st::create($lanfFilling);
        }

        // 2nd Land Filling

        if($request->land_filling_money_paid2>$request->land_filling_money2){
            Session::flash('error',"Check the amount fields");
            return redirect()->back();
        }

        else{

            $land_filing_due_2=$request->land_filling_money2 - $request->land_filling_money_paid2;
            $landFilling2nd=[
                'user_id'=>$user->id,
                'crm_id'=>$user->crm_id,
                'initial_land_filling_money'=>$request->initial_land_filling_money2,
                'land_filling_money'=>$request->land_filling_money2,
                'land_filling_money_payment_type'=>$request->land_filling_money_payment_type2,
                'land_filling_money_paid'=>$request->land_filling_money_paid2,
                'land_filling_money_due'=>$land_filing_due_2,
                'land_filling_money_paid_date'=>$request->land_filling_money_paid_date2,
                'land_filling_money_due_date'=>$request->land_filling_money_due_date2,
                'land_filling_money_note'=>$request->land_filling_money_note2,
            ];
            LandFillingStatus2nd::create($landFilling2nd);

        }





        //Bulding Pilling
        $building_pilling_due= $request->building_pilling_money - $request->building_pilling_money_paid;
        $buildingPilling=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_building_pilling_money'=>$request->initial_building_pilling_money,
            'building_pilling_money'=>$request->building_pilling_money,
            'building_pilling_money_payment_type'=>$request->building_pilling_money_payment_type,
            'building_pilling_money_paid'=>$request->building_pilling_money_paid,
            'building_pilling_money_due'=>$building_pilling_due,
            'building_pilling_money_paid_date'=>$request->building_pilling_money_paid_date,
            'building_pilling_money_due_date'=>$request->building_pilling_money_due_date,
            'building_pilling_money_note'=>$request->building_pilling_money_note,
        ];
        BuildingPillingStatus::create($buildingPilling);

        //Floor Roof Casting
        $floor_roof_casting_amount_due_1st= $request->floor_roof_casting_money_1st - $request->floor_roof_casting_money_paid_1st;
        $floorRoofCasting=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_floor_roof_casting_money_1st'=>$request->initial_floor_roof_casting_money_1st,
            'floor_roof_casting_money_1st'=>$request->floor_roof_casting_money_1st,
            'floor_roof_casting_money_payment_type_1st'=>$request->floor_roof_casting_money_payment_type_1st,
            'floor_roof_casting_money_paid_1st'=>$request->floor_roof_casting_money_paid_1st,
            'floor_roof_casting_money_due_1st'=>$floor_roof_casting_amount_due_1st,
            'floor_roof_casting_money_paid_date_1st'=>$request->floor_roof_casting_money_paid_date_1st,
            'floor_roof_casting_money_due_date_1st'=>$request->floor_roof_casting_money_due_1st,
            'floor_roof_casting_money_note_1st'=>$request->floor_roof_casting_money_note_1st,
        ];
        FloorRoofCasting1st::create($floorRoofCasting);

        // Finishing Work Money
        $finishing_work_due=$request->finishing_work_money - $request->finishing_work_money_paid;
        $finishigWork=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_finishing_work_money'=>$request->initial_finishing_work_money,
            'finishing_work_money'=>$request->finishing_work_money,
            'finishing_work_money_payment_type'=>$request->finishing_work_money_payment_type,
            'finishing_work_money_paid'=>$request->finishing_work_money_paid,
            'finishing_work_money_due'=>$finishing_work_due,
            'finishing_work_money_paid_date'=>$request->finishing_work_money_paid_date,
            'finishing_work_money_due_date'=>$request->finishing_work_money_due_date,
            'finishing_work_money_note'=>$request->finishing_work_money_note,
        ];
        FinishingWorkStatus::create($finishigWork);

        //After handover
        $after_handover_money_due= $request->after_handover_money - $request->after_handover_money_money_paid;
        $afterhandOver=[
            'user_id'=>$user->id,
            'crm_id'=>$user->crm_id,
            'initial_after_handover_money'=>$request->initial_after_handover_money,
            'after_handover_money'=>$request->after_handover_money,
            'after_handover_money_payment_type'=>$request->after_handover_money_payment_type,
            'after_handover_money_money_paid'=>$request->after_handover_money_money_paid,
            'after_handover_money_money_due'=>$after_handover_money_due,
            'after_handover_money_paid_date'=>$request->after_handover_money_paid_date,
            'after_handover_money_due_date'=>$request->after_handover_money_due_date,
            'after_handover_money_note'=>$request->after_handover_money_note,
        ];
        AfterHandoverMoney::create($afterhandOver);

        Session::flash('success',"Successfully Insert  Basic Amounts");

        if(auth()->guard('super_admin')->check()){
            return redirect()->route('super_admin.all_user')->with(['success'=>'Successfully insert basic amount']);
        }
        if(auth()->guard('employee')->check()){
            return redirect()->route('employee.all_user')->with(['success'=>'Successfully insert basic amount']);
        }
        else if(auth()->guard('admin')->check()){
            return redirect()->route('admin.all_user')->with(['success'=>'Successfully insert basic amount']);
        }




    }


    // update basic amount page
    // change the view page with compact to do

    public function basicShowDataUpdate(Request $request){

        //$user= User::find($request->file_no);

        //$user = User::where('file_no', $request->file_no)->first();


        if(Auth::guard('admin')->check()){
            $user= User::where('file_no',$request->file_no)->where('crm_id',Auth::guard('admin')->user()->crm_id)->first();
        }
        if(Auth::guard('employee')->check()){
            $user= User::where('file_no',$request->file_no)->where('crm_id',Auth::guard('employee')->user()->crm_id)->first();
        }else{
            $user= User::where('file_no',$request->file_no)->first();
        }


        if($user){
            $total=TotalAmount::where('user_id',$user->id)->first();

            $booking_status = BookingStatus::where('user_id', $user->id)->first();
            $down_payment= DownpaymentStatus::where('user_id', $user->id)->first();
            $car_parking= CarParkingStatus::where('user_id', $user->id)->first();
            $land_filing_1st= LandFillingStatus1st::where('user_id', $user->id)->first();
            $land_filing_2nd= LandFillingStatus2nd::where('user_id', $user->id)->first();
            $building_pilling_status=BuildingPillingStatus::where('user_id', $user->id)->first();
            $roof_casting_1st=FloorRoofCasting1st::where('user_id', $user->id)->first();
            $finishing_work=FinishingWorkStatus::where('user_id', $user->id)->first();
            $after_hand_over_money=AfterHandoverMoney::where('user_id', $user->id)->first();


            if($total){
                return view('basic_amount.basicUpdate',compact('booking_status','user','down_payment','car_parking','land_filing_1st','land_filing_2nd','building_pilling_status','roof_casting_1st','finishing_work','after_hand_over_money'));
            }else{
                return redirect()->back()->with(['error'=>'This user basic information dose not exits']);
            }

        }else{
            return redirect()->back()->with(['error'=>'This user information dose not exits']);
        }


        // if($user){
        // }else{
        //     return redirect()->back()->with('error','User dose not exits.');
        // }
    }



    public function basicUpdate($id){

        //booking status part
        // dd($request);
        $booking_status = BookingStatus::where('user_id', $id)->first();
        $approve_updates=ApproveUpdate::where('user_id',$id)->first();
        $booking_status->booking_money= $approve_updates->booking_money;
        $booking_status->initial_booking_money= $approve_updates->initial_booking_money;
        $booking_status->booking_money_paid=$approve_updates->booking_money_paid;
        $booking_status-> booking_money_paid_date =$approve_updates->booking_money_paid_date;
        $booking_status-> booking_money_due_date =$approve_updates->booking_money_due_date;
        $booking_status->booking_money_due=$approve_updates->booking_money_due;
        $booking_status->booking_money_due=$approve_updates->booking_money_due;
        $booking_status->booking_money_note=$approve_updates->booking_money_note;
        $booking_status->booking_money_payment_type=$approve_updates->booking_money_payment_type;
        // dd($booking_status);
        $booking_status->save();
        //downpayment part
        $down_payment = DownpaymentStatus::where('user_id', $id)->first();
        $down_payment->downpayment_money= $approve_updates->downpayment_money;
        $down_payment->initial_downpayment_money= $approve_updates->initial_downpayment_money;
        $down_payment->downpayment_money_paid=$approve_updates->downpayment_money_paid;
        $down_payment-> downpayment_money_paid_date =$approve_updates->downpayment_money_paid_date;
        $down_payment-> downpayment_money_due_date =$approve_updates->downpayment_money_due_date;
        $down_payment->downpayment_money_due =$approve_updates->downpayment_money_due;
        $down_payment->downpayment_money_note=$approve_updates->downpayment_money_note;
        $down_payment->downpayment_money_payment_type=$approve_updates->downpayment_money_payment_type;
        $down_payment->save();
        //car_parking part
        $car_parking = CarParkingStatus::where('user_id', $id)->first();
        $car_parking->car_parking_money= $approve_updates->car_parking_money;
        $car_parking->initial_car_parking_money= $approve_updates->initial_car_parking_money;
        $car_parking->car_parking_money_paid=$approve_updates->car_parking_money_paid;
        $car_parking-> car_parking_money_paid_date =$approve_updates->car_parking_money_paid_date;
        $car_parking-> car_parking_money_due_date =$approve_updates->car_parking_money_due_date;
        $car_parking->car_parking_money_due=$approve_updates->car_parking_money_due;
        $car_parking->car_parking_money_note=$approve_updates->car_parking_money_note;
        $car_parking->car_parking_money_payment_type=$approve_updates->car_parking_money_payment_type;
        $car_parking->save();
        //land_filling1st part
        $land_filing_1st = LandFillingStatus1st::where('user_id', $id)->first();
        $land_filing_1st->land_filling_money= $approve_updates->land_filling_money_1;
        $land_filing_1st->initial_land_filling_money= $approve_updates->initial_land_filling_money;
        $land_filing_1st->land_filling_money_paid=$approve_updates->land_filling_money_paid_1;
        $land_filing_1st-> land_filling_money_paid_date =$approve_updates->land_filling_money_paid_date_1;
        $land_filing_1st-> land_filling_money_due_date =$approve_updates->land_filling_money_due_date_1;
        $land_filing_1st->land_filling_money_due=$approve_updates->land_filling_money_due_1;
        $land_filing_1st->land_filling_money_note=$approve_updates->land_filling_money_note_1;
        $land_filing_1st->land_filling_money_payment_type=$approve_updates->land_filling_money_payment_type_1;
        $land_filing_1st->save();
        //land_filling2nd part
        $land_filing_2nd = LandFillingStatus2nd::where('user_id', $id)->first();
        $land_filing_2nd->land_filling_money= $approve_updates->land_filling_money_2;
        $land_filing_2nd->initial_land_filling_money= $approve_updates->initial_land_filling_money2;
        $land_filing_2nd->land_filling_money_paid=$approve_updates->land_filling_money_paid_2;
        $land_filing_2nd-> land_filling_money_paid_date =$approve_updates->land_filling_money_paid_date_2;
        $land_filing_2nd-> land_filling_money_due_date =$approve_updates->land_filling_money_due_date_2;
        $land_filing_2nd->land_filling_money_due=$approve_updates->land_filling_money_due_2;
        $land_filing_2nd->land_filling_money_note=$approve_updates->land_filling_money_note_2;
        $land_filing_2nd->land_filling_money_payment_type=$approve_updates->land_filling_money_payment_type_2;
        $land_filing_2nd->save();
        //land_filling2nd part
        $building_pilling_status = BuildingPillingStatus::where('user_id', $id)->first();
        $building_pilling_status->building_pilling_money= $approve_updates->building_pilling_money;
        $building_pilling_status->initial_building_pilling_money= $approve_updates->initial_building_pilling_money;
        $building_pilling_status->building_pilling_money_paid=$approve_updates->building_pilling_money_paid;
        $building_pilling_status-> building_pilling_money_paid_date =$approve_updates->building_pilling_money_paid_date;
        $building_pilling_status-> building_pilling_money_due_date =$approve_updates->land_filling_money_due_date2;
        $building_pilling_status->building_pilling_money_due=$approve_updates->building_pilling_money_due;
        $building_pilling_status->building_pilling_money_note=$approve_updates->building_pilling_money_note;
        $building_pilling_status->building_pilling_money_payment_type=$approve_updates->building_pilling_money_payment_type;
        $building_pilling_status->save();
        //roof casting  part
        $roof_casting_1st= FloorRoofCasting1st::where('user_id', $id)->first();
        $roof_casting_1st->floor_roof_casting_money_1st= $approve_updates->floor_roof_casting_money_1st;
        $roof_casting_1st->initial_floor_roof_casting_money_1st= $approve_updates->initial_floor_roof_casting_money_1st;
        $roof_casting_1st->floor_roof_casting_money_paid_1st=$approve_updates->floor_roof_casting_money_paid_1st;
        $roof_casting_1st-> floor_roof_casting_money_paid_date_1st =$approve_updates->floor_roof_casting_money_paid_date_1st;
        $roof_casting_1st-> floor_roof_casting_money_due_date_1st =$approve_updates->floor_roof_casting_money_due_date_1st;
        $roof_casting_1st->floor_roof_casting_money_due_1st=$approve_updates->floor_roof_casting_money_due_1st;
        $roof_casting_1st->floor_roof_casting_money_note_1st=$approve_updates->floor_roof_casting_money_note_1st;
        $roof_casting_1st->floor_roof_casting_money_payment_type_1st=$approve_updates->floor_roof_casting_money_payment_type_1st;
        $roof_casting_1st->save();
        //finishing work
        $finishing_work= FinishingWorkStatus::where('user_id', $id)->first();
        $finishing_work->finishing_work_money= $approve_updates->finishing_work_money;
        $finishing_work->initial_finishing_work_money= $approve_updates->initial_finishing_work_money;
        $finishing_work->finishing_work_money_paid=$approve_updates->finishing_work_money_paid;
        $finishing_work-> finishing_work_money_paid_date =$approve_updates->finishing_work_money_paid_date;
        $finishing_work-> finishing_work_money_due =$approve_updates->finishing_work_money_due;
        $finishing_work->finishing_work_money_due_date=$approve_updates->finishing_work_money_due_date;
        $finishing_work->finishing_work_money_note=$approve_updates->finishing_work_money_note;
        $finishing_work->finishing_work_money_payment_type=$approve_updates->finishing_work_money_payment_type;
        $finishing_work->save();
        //after hand over part
        $after_hand_over_money= AfterHandoverMoney::where('user_id', $id)->first();
        $after_hand_over_money->after_handover_money= $approve_updates->after_handover_money;
        $after_hand_over_money->initial_after_handover_money= $approve_updates->initial_after_handover_money;
        $after_hand_over_money->after_handover_money_money_paid=$approve_updates->after_handover_money_paid;
        $after_hand_over_money-> after_handover_money_paid_date =$approve_updates->after_handover_money_paid_date;
        $after_hand_over_money-> after_handover_money_due_date =$approve_updates->after_handover_money_due_date;
        $after_hand_over_money->after_handover_money_money_due=$approve_updates->after_handover_money_due;
        $after_hand_over_money->after_handover_money_note=$approve_updates->after_handover_money_note;
        $after_hand_over_money->after_handover_money_payment_type=$approve_updates->after_handover_money_payment_type;
        $after_hand_over_money->save();
        $approve_updates->delete();
        return redirect()->route('super_admin.dashboard');

    }


}
