<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Installment;
use App\Models\InstallmentYear;

class UserController extends Controller
{
    //all user
    public function index(){
        $user=User::all();
        return view('user.all',compact('user'));
    }


      //for pdf creation
      public function viewPDF($id){



        $user= User::find($id);
        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins = Installment::where('user_id', $user->id)->get();
        //start paid amount calculation
        $paid_amount = $user->booking_money_paid +$user->down_payment_paid+$user->car_parking_paid+$user->land_filling_1_paid+$user->land_filling_2_paid+$user->building_pilling_paid+$user->first_roof_casting_paid+$user->finishing_work+$user->after_handover_money;
        $time=strtotime($user->installment_start_from);
        //end of paid amount calculation
        $timeformate=date('d-M-Y',$time);
        foreach ($ins as $installment)
        {
            $paid_amount+=$installment->installment_paid;
        }

        return view('admin.user_view',compact('user','ins','paid_amount','installmentYear','timeformate'));

    }




}
