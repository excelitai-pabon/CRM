<?php

namespace App\Http\Controllers;
use App\Exports\ExcelExport;
use App\Exports\MultipleExport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;
use PhpParser\Parser\Multiple;

class ExcelController extends Controller
{
    // basic info sheet
    public function exportExcel($id){



        // $user = User::where('file_no', $request->file_no)->first();


        // $booking_status = BookingStatus::where('user_id', $user->id)->first();
        // $down_payment= DownpaymentStatus::where('user_id', $user->id)->first();
        // $car_parking= CarParkingStatus::where('user_id', $user->id)->first();
        // $land_filing_1st= LandFillingStatus1st::where('user_id', $user->id)->first();
        // $land_filing_2nd= LandFillingStatus2nd::where('user_id', $user->id)->first();
        // $building_pilling_status=BuildingPillingStatus::where('user_id', $user->id)->first();
        // $roof_casting_1st=FloorRoofCasting1st::where('user_id', $user->id)->first();
        // $finishing_work=FinishingWorkStatus::where('user_id', $user->id)->first();
        // $after_hand_over_money=AfterHandoverMoney::where('user_id', $user->id)->first();






        return Excel::download(new MultipleExport($id),'MttRegistrations.xlsx');
    }

}
