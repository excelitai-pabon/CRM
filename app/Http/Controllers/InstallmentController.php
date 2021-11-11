<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\InstallmentYear;
use App\Models\TotalInstallmentAmount;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

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

        if($validated)
        {
            $user = User::where('file_no',$request->file_no)->first();
            if($user)
            {
                return redirect()->route('super_admin.installments.all',$user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }

    }

    public function allInstallment(User $user)
    {
        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($user->id);
       
        
        $paid_date = Carbon::parse($user->totalNoOfInstallment->installment_starting_date);
        
        return view('installment.all-installment',compact('user','paid_date'));
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

        return redirect()->route('super_admin.installments');
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
        $installment->installment_no = $installment_no;
        $installment->installment_amount = $request->payment;
        $installment->installment_paid = $request->paid;
        $installment->installment_due = $request->due;
        $installment->installment_date = $request->paid_date;
        $installment->installment_due_date = $request->due_date;
        $installment->payment_installment_type =$request->payment_type;
        $installment->installment_note =$request->payment_note;
        $installment->save();
        return redirect()->route('super_admin.installments');


    }
}
