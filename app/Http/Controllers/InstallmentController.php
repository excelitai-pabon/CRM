<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Installment;
use App\Models\InstallmentYear;
use App\Models\TotalInstallmentAmount;
use App\Models\User;
use App\Notifications\InstallmentPaid;
use App\Notifications\NotifyToAdmin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Mail;
use Illuminate\Support\Facades\Session;

class InstallmentController extends Controller
{
    public function getFileNo()
    {

        return view('installment.find-installments');

    }
    public function findFile(Request $request)
    {
        $validated = $request->validate([
            'file_no' => 'required|max:30',

        ]);

        if($validated){
            if(Auth::guard('admin')->check()){
                $user = User::where('file_no',$request->file_no)->where('crm_id',Auth::guard('admin')->user()->crm_id)->first();

            }
            if(Auth::guard('employee')->check()){
                $user = User::where('file_no',$request->file_no)->where('crm_id',Auth::guard('employee')->user()->crm_id)->first();
            }elseif(Auth::guard('super_admin')->check() || Auth::guard('admin')->user()->hasRole('manager')){
                $user = User::where('file_no',$request->file_no)->first();
            }

            if($user){
                if(Auth::guard('admin')->check()){

                    return redirect()->route('admin.installments.all',$user);
                }
                if(Auth::guard('employee')->check()){

                    return redirect()->route('employee.installments.all',$user);
                }else{
                    return redirect()->route('super_admin.installments.all',$user);
                }
            }
            else{
                return redirect()->back()->with('error','User dose not Exits');
            }
        }
        else{
            return redirect()->back();
        }

    }

    public function allInstallment(User $user)
    {
        $userdata=null;
        if(Auth::guard('admin')->check()){
            // $user = User::where('file_no',$request->file_no)->first();
            $userdata = User::with(['totalNoOfInstallment','installment','installment_year'])->where('crm_id',Auth::guard('admin')->user()->crm_id)->where('id',$user->id);


        }
        if(Auth::guard('employee')->check()){
            $userdata = User::with(['totalNoOfInstallment','installment','installment_year'])->where('crm_id',Auth::guard('employee')->user()->crm_id)->where('id',$user->id);
        }
        elseif(Auth::guard('super_admin')->check() || Auth::guard('admin')->user()->hasRole('manager')){

            $userdata = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($user->id);
        }
        else
        {
            return redirect()->back();
        }



        $paid_date = Carbon::parse(optional($userdata->totalNoOfInstallment)->installment_starting_date);

        if(isset($paid_date))
        {
            return view('installment.all-installment',compact('user','paid_date'));
        }
        else
        {

            return redirect()->back();
        }

    }

    public function editInstallment($id)
    {
        $installment = Installment::findOrfail($id);

        return view('installment.edit-installment',compact('installment'));
    }

    public function storeEditInstallment(Request $request,$id)
    {

        $validated = $request->validate([
            'payment' => 'required|integer',
            'paid' => 'required|integer',
            'due' => 'required|integer',
            'due_date' => 'required|date',
            'paid_date' => 'required|date',
            'payment_type' => 'required',

        ]);

        $installment = Installment::findOrFail($id);

        $installment->installment_amount = $request->payment;
        $installment->installment_paid = $request->paid;
        $installment->installment_due = $request->due;
        $installment->installment_date = $request->paid_date;
        $installment->installment_due_date = $request->due_date;
        $installment->payment_installment_type = $request->payment_type;
        $installment->installment_note = $request->payment_note;
        $installment->save();

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.installments')->with('success','Installment update successfully');
        }
        if(Auth::guard('employee')->check()){
            return redirect()->route('employee.installments')->with('success','Installment update successfully');
        }else{

            return redirect()->route('super_admin.installments')->with('success','Installment update successfully');
        }
    }

    public function createNewInstallment(User $user, $installment_no, $payment)
    {

        return view('installment.create-installment',compact('user','installment_no','payment'));
    }

    public function storeNewInstallment(Request $request,User $user, $installment_no, $payment)
    {
        $validated = $request->validate([
            'payment' => 'required|integer',
            'paid' => 'required|integer',
            'due' => 'required|integer',
            'paid_date' => 'required|date',
            'payment_type' => 'required',

        ]);

        $installment = new Installment();

        $installment->user_id = $user->id;
        $installment->crm_id = $user->crm_id;
        $installment->installment_no = $installment_no;
        $installment->installment_amount = $request->payment;
        $installment->installment_paid = $request->paid;
        $installment->installment_due = $request->due;
        $installment->installment_date = $request->paid_date;
        $installment->installment_due_date = $request->due_date;
        $installment->payment_installment_type =$request->payment_type;
        $installment->installment_note =$request->payment_note;
        $installment->save();


        $PaidDate = Carbon::parse($request->paid_date)->format('d-M-Y');
        $DueDate = Carbon::parse($request->due_date)->format('d-M-Y');
        // $data = [
        //     'subject' => "Installment Paid",
        //     'name' => $user->member_name,
        //     'email' => $user->email,
        //     'content' => "Successfully paid your installment amount <p> Paid Amount: {$PaidDate} </p>
        //     <p> Paid Date: {$PaidDate}</p>
        //     <p> Due Amount: {$request->due}</p>
        //     <p> Due Date: {$DueDate}</p>
        //     <p> Note: {$request->payment_note}</p>",
        //   ];


        //   Mail::send('user.email-template', compact('data'), function($message) use ($data) {
        //     $message->to($data['email'])
        //     ->subject($data['subject']);
        //   });

        $user->notify(new InstallmentPaid($user));
        $admin=Admin::find(2);
        $admin->notify(new NotifyToAdmin($user));

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.installments')->with('success','Installment update successfully');
        }
        if(Auth::guard('employee')->check()){
            return redirect()->route('employee.installments')->with('success','Installment update successfully');
        }else{

            return redirect()->route('super_admin.installments')->with('success','Installment update successfully');
        }

    }

    public function storeNewMultiInstallment(Request $request,User $user)
    {
        $paidInstallment = Installment::where('user_id',$user->id)->sum('installment_paid');
        $total_paid = $paidInstallment + Installment::where('user_id',$user->id)->sum('installment_due');

        $dueInstallment = $user->totalNoOfInstallment->total_installment_amount-$total_paid;

        $validated = $request->validate([
            'multiPayment' => "required|max:{$dueInstallment}",
        ],[

            'multiPayment.max' => "Not more than {$dueInstallment} taka",
        ]);



        if($dueInstallment<$request->multiPayment)
        {
            return back()->with('error','taka komai den');
        }




        $totalMoney = $request->multiPayment;
        $paymentByYear = InstallmentYear::where('user_id',$user->id)->first();

        $paidInstallment = Installment::where('user_id',$user->id)->count();



        while(true)
        {
            $i = ceil(($paidInstallment+1)/12)-1;

            if($i==-1)
            {
                $i = 0;
            }



             $installment = new Installment();
             $installment->installment_no = $paidInstallment+1;

             $installment->user_id = $user->id;
             $installment->crm_id = $user->crm_id;
             $installment->payment_installment_type = 'cash';

            $installment->installment_amount = $paymentByYear->installment_years_amount[$i];

            if($paymentByYear->installment_years_amount[$i]>$totalMoney)
            {

                $installment->installment_paid = $totalMoney;
                $installment->installment_due = $paymentByYear->installment_years_amount[$i]-$totalMoney;
                $totalMoney=0;
            }
            elseif($totalMoney>=$paymentByYear->installment_years_amount[$i])
            {
                $installment->installment_paid = $paymentByYear->installment_years_amount[$i];
                $totalMoney -= $paymentByYear->installment_years_amount[$i];
                $installment->installment_due = 0;
            }

            $installment->installment_date = Carbon::now();
            $installment->save();

            $paidInstallment++;


            if($totalMoney==0)
            {
                 break;
            }

        }
        return back();
    }
}
