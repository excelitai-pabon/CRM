<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InstallmentYear;
use App\Models\Installment;
use Illuminate\Support\Carbon;

class TableController extends Controller
{




    public function basicTable(){

        return view('tables.basic');
    }


    public function basicSearch(Request $request){
        // dd($request->all());
        $file_no=$request->file_no;
        $user= User::where('file_no',$file_no)->first();
        $user_id= $user->id;
        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins =  Installment::where('user_id', $user->id)->get();

        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);
        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);
        return view('tables.index' ,compact('user','ins','installmentYear','time','timeformate','paid_date'));

    }



}
