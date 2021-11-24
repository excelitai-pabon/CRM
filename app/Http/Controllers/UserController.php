<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Installment;
use App\Models\User;
use App\Models\BookingStatus;
use App\Models\AfterHandoverMoney;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //all user
    public function index(){
        $users=User::all();
        return view('user.all',compact('users'));
    }

    // user add page show
    public function create(){
        return view('user.create');

    }

    //user store
    public function store(UserRequest $request){
        //  dd($request->all());

        $userData=[
            'file_no'=>$request->file_no,
            'member_name'=>$request->member_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'husband_name'=>$request->husband_wife_name,
            'email'=>$request->email,
            'permanent_address'=>$request->permanent_address,
            'mailing_address'=>$request->mailing_address,
            'phone_no_1'=>$request->phone_1,
            'phone_no_2'=>$request->phone_2,
            'date_of_birth'=>$request->date_of_birth,
            'national_id'=>$request->national_id,
            'profession'=>$request->profession,
            'office_address'=>$request->office_address,
            'designation'=>$request->designation,
            'nominee_name'=>$request->nominee_name,
            'relation_with_mominee'=>$request->relation_with_nominee,
            'building_no'=>$request->building_no,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now()->toDateTimeString()
        ];

        //member image
        if($request->hasFile('member_image')){
            $userData['member_image'] = $this->uploadImageSize('user',$request->member_image,'user',150,160);
        }
        //nominee image
        if($request->hasFile('nominee_image')){
            $userData['nominee_image'] = $this->uploadImageSize('nominee',$request->nominee_image,'nominee',150,160);
        }

        $user=User::create($userData);

        if($user){
            Session::flash('success',"Successfully Add  User");
            return redirect()->back();
        }else{
           Session::flash('error',"Failed To Add User");
            return redirect()->back();
        }

    }

    public function edit(User $user){
        // dd($user);
       return view('user.edit',compact('user'));

    }

    public function update(UserRequest $request, User $user){
//dd($request->all());
        $userData=[
            'file_no'=>$request->file_no,
            'member_name'=>$request->member_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'husband_name'=>$request->husband_wife_name,
            'email'=>$request->email,
            'permanent_address'=>$request->permanent_address,
            'mailing_address'=>$request->mailing_address,
            'phone_no_1'=>$request->phone_1,
            'phone_no_2'=>$request->phone_2,
            'date_of_birth'=>$request->date_of_birth,
            'national_id'=>$request->national_id,
            'profession'=>$request->profession,
            'office_address'=>$request->office_address,
            'designation'=>$request->designation,
            'nominee_name'=>$request->nominee_name,
            'relation_with_mominee'=>$request->relation_with_nominee,
            'building_no'=>$request->building_no,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ];

        //member image
        if($request->hasFile('member_image')){
            if(file_exists(public_path($user->member_image))){
                unlink(public_path($user->member_image));
            }
            $userData['member_image'] = $this->uploadImageSize('user',$request->member_image,'user',150,160);
        }
        //nominee image
        if($request->hasFile('nominee_image')){
            if(file_exists(public_path($user->nominee_image))){
                unlink(public_path($user->nominee_image));
            }
            $userData['nominee_image'] = $this->uploadImageSize('nominee',$request->nominee_image,'nominee',150,160);
        }

        $user_update=$user->update($userData);

        if($user_update){
            Session::flash('success',"Successfully Update  User");
            return redirect()->back();
        }else{
           Session::flash('error',"Failed To Update User");
            return redirect()->back();
        }


    }

    public function destroy(User $user){

        if(!empty($user->member_image) && file_exists(public_path($user->member_image))){
            unlink(public_path($user->member_image));
            if(!empty($user->nominee_image) && file_exists(public_path($user->nominee_image))){
                unlink(public_path($user->nominee_image));
            }
            $delete=$user->delete();
        }else{
            $delete=$user->delete();
        }

        if($delete){
            return response()->json(['success'=>"Successfully Delete Warehouse Staff"],200);
        }else{
            return response()->json(['error'=>"Failed Delete Warehouse Staff"],500);
        }


    }


    public function profile($id)
    {
        $user = User::with(['installment','totalNoOfInstallment','installment_year','afterHandOverMoney','bookingStatus','buildingPilling','carParking','downPayment','finishingWork','floorRoof','landFilling1','landFilling2','totalAmount'])->find($id);

        $paidInstallment = 0;
        $paidInstallment = Installment::where('user_id',$id)->sum('installment_paid');
        

        $total_paid = 0;
        $total_paid = optional($user->afterHandOverMoney)->after_handover_money_money_paid + optional($user->bookingStatus)->booking_money_paid + optional($user->buildingPilling)->building_pilling_money_paid + optional($user->carParking)->car_parking_money_paid + optional($user->downPayment)->downpayment_money_paid + optional($user->finishingWork)->finishing_work_money_paid + optional($user->floorRoof)->floor_roof_casting_money_paid_1st + optional($user->landFilling1)-> land_filling_money_paid + optional($user->landFilling2)-> land_filling_money_paid;

        $total_paid += $paidInstallment;
        

        $total_due = 0;
        $total_due = optional($user->afterHandOverMoney)->after_handover_money_money_due + optional($user->bookingStatus)->booking_money_due + optional($user->buildingPilling)->building_pilling_money_due + optional($user->carParking)->car_parking_money_due + optional($user->downPayment)->downpayment_money_due + optional($user->finishingWork)->finishing_work_money_due + optional($user->floorRoof)->floor_roof_casting_money_due_1st + optional($user->landFilling1)-> land_filling_money_due + optional($user->landFilling2)->land_filling_money_due;
        
        
        $total_due += (optional($user->totalNoOfInstallment)->total_installment_amount - $paidInstallment);

        $installment_paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);


        $todayDate = Carbon::now();
        $start = $todayDate->startOfDay();
        $start = $start->toDateTime();
        $end = $todayDate->endOfDay();
        $end = $end->toDateTime();
      
        

        $booking_status = BookingStatus::whereBetween('booking_money_due_date',[$start,$end])->first();
        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start,$end])->first();
        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start,$end])->first();
        $car_parking = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start,$end])->first();
        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start,$end])->first();
        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start,$end])->first();
        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start,$end])->first();
        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start,$end])->first();
        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start,$end])->first();
        $installments = Installment::whereBetween('installment_due_date',[$start,$end])->get();

        
        $dueTillToday = 0;
        $dueTillToday = optional($booking_status)->booking_money_due + optional($after_handover_money)->after_handover_money_money_due + optional($building_pilling)->building_pilling_money_due + optional($car_parking)->car_parking_money_due + optional($down_payment)->downpayment_money_due + optional($finishing_money)->finishing_work_money_due + optional($first_floor)->floor_roof_casting_money_due_1st + optional($land_filling_1st)->land_filling_money_due + optional($land_filling_2nd)->land_filling_money_due;

        
        
        foreach($installments as $installment)
        {
            $dueTillToday += optional($installment)->installment_due;
        }

        

       

        return view('user.profile',compact('user','total_paid','total_due','installment_paid_date','dueTillToday'));
    }




}
