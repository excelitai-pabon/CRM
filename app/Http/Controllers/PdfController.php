<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InstallmentYear;
use App\Models\BookingStatus;
use App\Models\DownpaymentStatus;
use App\Models\CarParkingStatus;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use App\Models\BuildingPillingStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\FinishingWorkStatus;
use App\Models\AfterHandoverMoney;
use App\Models\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\PDF;



class PdfController extends Controller
{

    //pdf controller for basic information

    public function viewPDF($id){
        $user = User::findOrFail($id);
        //basic amounts
        $booking_status = BookingStatus::where('user_id', $user->id)->first();
        $down_payment= DownpaymentStatus::where('user_id', $user->id)->first();
        // $car_parking= CarParkingStatus::where('user_id', $user->id)->first();
        $land_filing_1st= LandFillingStatus1st::where('user_id', $user->id)->first();
        $land_filing_2nd= LandFillingStatus2nd::where('user_id', $user->id)->first();
        $building_pilling_status=BuildingPillingStatus::where('user_id', $user->id)->first();
        $roof_casting_1st=FloorRoofCasting1st::where('user_id', $user->id)->first();
        $finishing_work=FinishingWorkStatus::where('user_id', $user->id)->first();
        $after_hand_over_money=AfterHandoverMoney::where('user_id', $user->id)->first();
        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($id);

        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins =  Installment::where('user_id', $user->id)->get();

        // $paid_amount = $user->booking_money_paid +$user->down_payment_paid+$user->car_parking_paid+$user->land_filling_1_paid+$user->land_filling_2_paid+$user->building_pilling_paid+$user->first_roof_casting_paid+$user->finishing_work+$user->after_handover_money;

        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);
        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);
        return view('pdf.user_view',compact('user','ins','installmentYear','timeformate','paid_date', 'booking_status', 'down_payment' ,'land_filing_1st', 'land_filing_2nd', 'building_pilling_status', 'roof_casting_1st' ,'finishing_work', 'after_hand_over_money'));


    }



     //PDF download function
        public function pdfDownload($id){
        $user = User::findOrFail($id);
        //basic amounts
        $booking_status = BookingStatus::where('user_id', $user->id)->first();
        $down_payment= DownpaymentStatus::where('user_id', $user->id)->first();
        // $car_parking= CarParkingStatus::where('user_id', $user->id)->first();
        $land_filing_1st= LandFillingStatus1st::where('user_id', $user->id)->first();
        $land_filing_2nd= LandFillingStatus2nd::where('user_id', $user->id)->first();
        $building_pilling_status=BuildingPillingStatus::where('user_id', $user->id)->first();
        $roof_casting_1st=FloorRoofCasting1st::where('user_id', $user->id)->first();
        $finishing_work=FinishingWorkStatus::where('user_id', $user->id)->first();
        $after_hand_over_money=AfterHandoverMoney::where('user_id', $user->id)->first();
        $user = User::with(['totalNoOfInstallment','installment','installment_year'])->findOrFail($id);
        $installmentYear=InstallmentYear::where('user_id',$user->id)->first();
        $ins =  Installment::where('user_id', $user->id)->get();
        //$path=base_path('Upload_image/'.$user->profile_photo_path);
        $path=$user->member_image;
        $type=pathinfo($path, PATHINFO_EXTENSION);
        $data=file_get_contents($path);
        $pic='data:image/'.$type.';base64,'.base64_encode($data);
        $path2=$user->nominee_image;
        $type2=pathinfo($path2, PATHINFO_EXTENSION);
        $data2=file_get_contents($path2);
        $pic2='data:image/'.$type2.';base64,'.base64_encode($data2);
        $time=strtotime($user->installment_start_from);
        $timeformate=date('d-M-Y',$time);
        $paid_date = Carbon::parse(optional($user->totalNoOfInstallment)->installment_starting_date);
        $pdf = PDF::loadView('pdf.pdf_download', compact('user','pic','pic2','ins','installmentYear','timeformate','paid_date','booking_status', 'down_payment' , 'land_filing_1st', 'land_filing_2nd', 'building_pilling_status', 'roof_casting_1st' ,'finishing_work', 'after_hand_over_money'));
        return $pdf->download('user_pdf.pdf');

    } // end mathod

    //booking money pdf download
    public function basicAmountPDF($request, User $user) {
        $path='assets/logo/logo.jpg';
        $data=file_get_contents($path);
        $logo='data:image/'.pathinfo($path, PATHINFO_EXTENSION).';base64,'.base64_encode($data);

        if($request == 'booking-money'){
            // dd($request);
            $booking_money=$user->bookingStatus;
            $pdf = PDF::loadView('pdf.basic_amount', compact('booking_money','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'down-payment'){
            $down_payment= $user->downPayment;
            $pdf = PDF::loadView('pdf.basic_amount', compact('down_payment','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'car-parking'){
            $car_parking= $user->carParking;
            $pdf = PDF::loadView('pdf.basic_amount', compact('car_parking','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'land-filling1'){
            $land_filling1= $user->landFilling1;
            $pdf = PDF::loadView('pdf.basic_amount', compact('land_filling1','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'land-filling2'){
            $land_filling2= $user->landFilling2;
            $pdf = PDF::loadView('pdf.basic_amount', compact('land_filling2','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'building-pilling'){
            $building_pilling= $user->buildingPilling;
            $pdf = PDF::loadView('pdf.basic_amount', compact('building_pilling','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'first-floor-roof-casting'){
            $first_floor_roof= $user->floorRoof;
            $pdf = PDF::loadView('pdf.basic_amount', compact('first_floor_roof','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'fisnishing-work'){
            $finishing_Work= $user->finishingWork;
            $pdf = PDF::loadView('pdf.basic_amount', compact('finishing_Work','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }elseif($request == 'after-handover'){
            $after_hand_over_money= $user->afterHandOverMoney;
            $pdf = PDF::loadView('pdf.basic_amount', compact('after_hand_over_money','user','logo'));
            return $pdf->download('basic-amount.pdf');
        }
    }





}
