<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InstallmentYear;
use App\Models\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use PDF;



class PdfController extends Controller
{
    //
    //pdf controller for basic information

    public function viewPDF($id){

        // $user= user::find($id);
        // $ins =  DB::table('installments')->where('user_id', $user->id)->get();
        // return view('admin.user_view',compact('user','ins'));


        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($id);

        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins =  Installment::where('user_id', $user->id)->get();
        // //PAID AMOUNT
        // $paid_amount = $user->booking_money_paid +$user->down_payment_paid+$user->car_parking_paid+$user->land_filling_1_paid+$user->land_filling_2_paid+$user->building_pilling_paid+$user->first_roof_casting_paid+$user->finishing_work+$user->after_handover_money;
        //NOT DONE
        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);

        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);
        // foreach ($ins as $installment)
        // {
        //     $paid_amount+=$installment->installment_paid;
        // }

        return view('pdf.user_view',compact('user','ins','installmentYear','timeformate','paid_date'));


    }



     //PDF download function
        public function pdfDownload($id){

        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($id);
        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins =  Installment::where('user_id', $user->id)->get();
        //$path=base_path('Upload_image/'.$user->profile_photo_path);
        $path=$user->member_image;

        $type=pathinfo($path, PATHINFO_EXTENSION);

       // $data=file_get_contents($path);
        $data=file_get_contents($path);

        $pic='data:image/'.$type.';base64,'.base64_encode($data);

       // $path2=base_path('Upload_image/'.$user->nominee_image);
        $path2=$user->nominee_image;

        $type2=pathinfo($path2, PATHINFO_EXTENSION);
        $data2=file_get_contents($path2);
        $pic2='data:image/'.$type2.';base64,'.base64_encode($data2);

        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);

        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);





        $pdf = PDF::loadView('pdf.pdf_download', compact('user','pic','pic2','ins','installmentYear','timeformate','paid_date'));

        return $pdf->download('user_pdf.pdf');

    } // end mathod

}
