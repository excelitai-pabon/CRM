<?php
namespace App\Http\Controllers;
use App\Models\AfterHandoverMoney;
use App\Models\BookingStatus;
use App\Models\BuildingPillingStatus;
use App\Models\CarParkingStatus;
use App\Models\DownpaymentStatus;
use App\Models\FinishingWorkStatus;
use App\Models\FloorRoofCasting1st;
use App\Models\Installment;
use App\Models\LandFillingStatus1st;
use App\Models\LandFillingStatus2nd;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
class DashboardController extends Controller
{
    public function superAdminDashboard()
    {
        $users = User::count();
        $totalDueAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::sum('after_handover_money_money_due');
        $bookingStatus = BookingStatus::sum('booking_money_due');
        $buildingPillingStatus = BuildingPillingStatus::sum('building_pilling_money_due');
        $carParkingMoneyDue = CarParkingStatus::sum('car_parking_money_due');
        $downPaymentStatus = DownpaymentStatus::sum('downpayment_money_due');
        $finishingWorkStatus = FinishingWorkStatus::sum('finishing_work_money_due');
        $firstRoofCasting = FloorRoofCasting1st::sum('floor_roof_casting_money_due_1st');
        $landFillingStatus1st = LandFillingStatus1st::sum('land_filling_money_due');
        $landFillingStatus2nd = LandFillingStatus2nd::sum('land_filling_money_due');
        $installment = Installment::sum('installment_due');
        $totalDueAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $totalPaidAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::sum('after_handover_money_money_paid');
        $bookingStatus = BookingStatus::sum('booking_money_paid');
        $buildingPillingStatus = BuildingPillingStatus::sum('building_pilling_money_paid');
        $carParkingMoneyDue = CarParkingStatus::sum('car_parking_money_paid');
        $downPaymentStatus = DownpaymentStatus::sum('downpayment_money_paid');
        $finishingWorkStatus = FinishingWorkStatus::sum('finishing_work_money_paid');
        $firstRoofCasting = FloorRoofCasting1st::sum('floor_roof_casting_money_paid_1st');
        $landFillingStatus1st = LandFillingStatus1st::sum('land_filling_money_paid');
        $landFillingStatus2nd = LandFillingStatus2nd::sum('land_filling_money_paid');
        $installment = Installment::sum('installment_paid');
        $totalPaidAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $todayTotalDue = 0;
        $todayDate = Carbon::now();
        $start = $todayDate->startOfDay();
        $start = $start->toDateTime();
        $end = $todayDate->endOfDay();
        $end = $end->toDateTime();


        $start_year = $todayDate->startOfYear();

        $start_year = $start_year->toDateTime();

        $end_year = $todayDate->endOfYear();
        $end_year = $end_year->toDateTime();


        $start_month = $todayDate->startOfMonth();

        $start_month = $start_month->toDateTime();

        $end_month = $todayDate->endOfMonth();
        $end_month = $end_month->toDateTime();


        $booking_status = BookingStatus::whereBetween('booking_money_due_date',[$start,$end])->sum('booking_money_due');
        $after_handover_money = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start,$end])->sum('after_handover_money_money_due');
        $building_pilling = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start,$end])->sum('building_pilling_money_due');
        // $car_parking = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start,$end])->sum('car_parking_money_due');
        $down_payment = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start,$end])->sum('downpayment_money_due');
        $finishing_money = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start,$end])->sum('finishing_work_money_due');
        $first_floor = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start,$end])->sum('floor_roof_casting_money_due_1st');
        $land_filling_1st = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');
        $land_filling_2nd = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');

        $installment = Installment::whereBetween('installment_due_date',[$start,$end])->sum('installment_paid');
        //YEAR STARTS
        $booking_status_yearly = BookingStatus::whereBetween('booking_money_due_date',[$start_year,$end_year])->sum('booking_money_due');

        $after_handover_money_yearly = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start_year,$end_year])->sum('after_handover_money_money_due');
        $building_pilling_yearly = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start_year,$end_year])->sum('building_pilling_money_due');
        // $car_parking_yearly = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start_year,$end_year])->sum('car_parking_money_due');
        $down_payment_yearly = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start_year,$end_year])->sum('downpayment_money_due');
        $finishing_money_yearly = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start_year,$end_year])->sum('finishing_work_money_due');
        $first_floor_yearly = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start_year,$end_year])->sum('floor_roof_casting_money_due_1st');
        $land_filling_1st_yearly = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start_year,$end_year])->sum('land_filling_money_due');
        $land_filling_2nd_yearly = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start_year,$end_year])->sum('land_filling_money_due');
        $installment_yearly = Installment::whereBetween('installment_due_date',[$start_year,$end_year])->sum('installment_paid');
        //YEAR END


        //month start
        $booking_status_monthly = BookingStatus::whereBetween('booking_money_due_date',[$start_month,$end_month])->sum('booking_money_due');

        $after_handover_money_monthly = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start_month,$end_month])->sum('after_handover_money_money_due');
        $building_pilling_monthly = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start_month,$end_month])->sum('building_pilling_money_due');
        // $car_parking_yearly = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start_year,$end_year])->sum('car_parking_money_due');
        $down_payment_monthly = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start_month,$end_month])->sum('downpayment_money_due');
        $finishing_money_monthly = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start_month,$end_month])->sum('finishing_work_money_due');
        $first_floor_monthly = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start_month,$end_month])->sum('floor_roof_casting_money_due_1st');
        $land_filling_1st_monthly = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start_month,$end_month])->sum('land_filling_money_due');
        $land_filling_2nd_monthly = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start_month,$end_month])->sum('land_filling_money_due');
        $installment_monthly = Installment::whereBetween('installment_due_date',[$start_month,$end_month])->sum('installment_paid');
        //month ends

          //month start paid
          $booking_status_paid_monthly = BookingStatus::whereBetween('booking_money_due_date',[$start_month,$end_month])->sum('booking_money_paid');
          $after_handover_money_paid_monthly = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start_month,$end_month])->sum('after_handover_money_money_paid');
          $building_pilling_paid_monthly = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start_month,$end_month])->sum('building_pilling_money_paid');
          // $car_parking_yearly = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start_year,$end_year])->sum('car_parking_money_due');
          $down_payment_paid_monthly = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start_month,$end_month])->sum('downpayment_money_paid');
          $finishing_money_paid_monthly = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start_month,$end_month])->sum('finishing_work_money_paid');
          $first_floor_paid_monthly = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start_month,$end_month])->sum('floor_roof_casting_money_paid_1st');
          $land_filling_1st_paid_monthly = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start_month,$end_month])->sum('land_filling_money_paid');
          $land_filling_2nd_paid_monthly = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start_month,$end_month])->sum('land_filling_money_paid');
          $installment_paid_monthly = Installment::whereBetween('installment_due_date',[$start_month,$end_month])->sum('installment_paid');
          //month  paid ends

           //year start paid
        $booking_status_paid_yearly = BookingStatus::whereBetween('booking_money_due_date',[$start_year,$end_year])->sum('booking_money_paid');

        $after_handover_money_paid_yearly = AfterHandoverMoney::whereBetween('after_handover_money_due_date',[$start_year,$end_year])->sum('after_handover_money_money_paid');
        $building_pilling_paid_yearly = BuildingPillingStatus::whereBetween('building_pilling_money_due_date',[$start_year,$end_year])->sum('building_pilling_money_paid');
        // $car_parking_yearly = CarParkingStatus::whereBetween('car_parking_money_due_date',[$start_year,$end_year])->sum('car_parking_money_due');
        $down_payment_paid_yearly = DownpaymentStatus::whereBetween('downpayment_money_due_date',[$start_year,$end_year])->sum('downpayment_money_paid');
        $finishing_money_paid_yearly = FinishingWorkStatus::whereBetween('finishing_work_money_due_date',[$start_year,$end_year])->sum('finishing_work_money_paid');
        $first_floor_paid_yearly = FloorRoofCasting1st::whereBetween('floor_roof_casting_money_due_date_1st',[$start_year,$end_year])->sum('floor_roof_casting_money_paid_1st');
        $land_filling_1st_paid_yearly = LandFillingStatus1st::whereBetween('land_filling_money_due_date',[$start_year,$end_year])->sum('land_filling_money_paid');
        $land_filling_2nd_paid_yearly = LandFillingStatus2nd::whereBetween('land_filling_money_due_date',[$start_year,$end_year])->sum('land_filling_money_paid');
        $installment_paid_yearly = Installment::whereBetween('installment_due_date',[$start_year,$end_year])->sum('installment_paid');
           //year  paid ends


        $todayTotalDue = $after_handover_money + $booking_status + $building_pilling + $down_payment + $finishing_money + $first_floor + $land_filling_1st + $land_filling_2nd + $installment;
        $monthlyTotalDue=  $booking_status_monthly+   $after_handover_money_monthly + $building_pilling_monthly +   $finishing_money_monthly +   $first_floor_monthly + $land_filling_1st_monthly +  $land_filling_2nd_monthly + $installment_monthly;
        $monthlyTotalPaid=  $booking_status_paid_monthly+   $after_handover_money_paid_monthly + $building_pilling_paid_monthly +   $finishing_money_paid_monthly +   $first_floor_paid_monthly + $land_filling_1st_paid_monthly +  $land_filling_2nd_paid_monthly + $installment_paid_monthly;
        $yearlyTotalDue=  $booking_status_yearly+   $after_handover_money_yearly + $building_pilling_yearly +   $finishing_money_yearly +   $first_floor_yearly + $land_filling_1st_yearly +  $land_filling_2nd_yearly + $installment_yearly;
        $yearlyTotalPaid=  $booking_status_paid_yearly+   $after_handover_money_paid_yearly + $building_pilling_paid_yearly +   $finishing_money_paid_yearly +   $first_floor_paid_yearly + $land_filling_1st_paid_yearly +  $land_filling_2nd_paid_yearly + $installment_paid_yearly;
        $data = [];
        $data['label'] = "total paid";
        $data['paid_data'] = (int) $totalPaidAmount;
        $data['due_data'] = (int) $totalDueAmount;
        $data['booking_status_daily'] = (int) $booking_status;
        $data['after_handover_money_daily'] = (int) $after_handover_money;
        $data['building_pilling_daily'] = (int) $building_pilling;
        // $data['car_parking_daily'] = (int) $car_parking;
        $data['down_payment_daily'] = (int) $down_payment;
        $data['finishing_money_daily'] = (int) $finishing_money;
        $data['first_floor_daily'] = (int) $first_floor;
        $data['land_filling_1st_daily'] = (int) $land_filling_1st;

        $data['land_filling_2nd_daily'] = (int) $land_filling_2nd;

        $data['booking_status_yearly'] = (int) $booking_status_yearly;
        $data['after_handover_money_yearly'] = (int) $after_handover_money_yearly;
        $data['building_pilling_yearly'] = (int) $building_pilling_yearly;
        // $data['car_parking_yearly'] = (int) $car_parking_yearly;
        $data['down_payment_yearly'] = (int) $down_payment_yearly;
        $data['finishing_money_yearly'] = (int) $finishing_money_yearly;
        $data['first_floor_yearly'] = (int) $first_floor_yearly;
        $data['land_filling_1st_yearly'] = (int) $land_filling_1st_yearly;
        $data['land_filling_2nd_yearly'] = (int) $land_filling_2nd_yearly;
        $data['yearlyTotalDue'] = (int) $yearlyTotalDue;


        $data['booking_status_monthly'] = (int) $booking_status_monthly;
        $data['after_handover_money_monthly'] = (int) $after_handover_money_monthly;
        $data['building_pilling_monthly'] = (int) $building_pilling_monthly;
        // $data['car_parking_yearly'] = (int) $car_parking_yearly;
        $data['down_payment_monthly'] = (int) $down_payment_monthly;
        $data['finishing_money_monthly'] = (int) $finishing_money_monthly;
        $data['first_floor_monthly'] = (int) $first_floor_monthly;
        $data['land_filling_1st_monthly'] = (int) $land_filling_1st_monthly;
        $data['land_filling_2nd_monthly'] = (int) $land_filling_2nd_monthly;
        $data['monthlyTotalDue'] = (int) $monthlyTotalDue;
        $data['monthlyTotalPaid'] = (int) $monthlyTotalPaid;
        $data['yearlyTotalPaid'] = (int) $yearlyTotalPaid;
        // dd($data);

        $data['chart_data'] = json_encode($data);


        return view('dashboard.super-admin-dashboard',compact('users','totalDueAmount','totalPaidAmount','todayTotalDue','data'));
    }
    public function adminDashboard()
    {
        $users = User::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->count();
        $totalDueAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('after_handover_money_money_due');
        $bookingStatus = BookingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('booking_money_due');
        $buildingPillingStatus = BuildingPillingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('building_pilling_money_due');
        $carParkingMoneyDue = CarParkingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('car_parking_money_due');
        $downPaymentStatus = DownpaymentStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('downpayment_money_due');
        $finishingWorkStatus = FinishingWorkStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('finishing_work_money_due');
        $firstRoofCasting = FloorRoofCasting1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('floor_roof_casting_money_due_1st');
        $landFillingStatus1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('land_filling_money_due');
        $landFillingStatus2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('land_filling_money_due');
        $installment = Installment::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('installment_due');
        $totalDueAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $totalPaidAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('after_handover_money_money_paid');
        $bookingStatus = BookingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('booking_money_paid');
        $buildingPillingStatus = BuildingPillingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('building_pilling_money_paid');
        $carParkingMoneyDue = CarParkingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('car_parking_money_paid');
        $downPaymentStatus = DownpaymentStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('downpayment_money_paid');
        $finishingWorkStatus = FinishingWorkStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('finishing_work_money_paid');
        $firstRoofCasting = FloorRoofCasting1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('floor_roof_casting_money_paid_1st');
        $landFillingStatus1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('land_filling_money_paid');
        $landFillingStatus2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('land_filling_money_paid');
        $installment = Installment::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->sum('installment_paid');
        $totalPaidAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $todayTotalDue = 0;
        $todayDate = Carbon::now();
        $start = $todayDate->startOfDay();
        $start = $start->toDateTime();
        $end = $todayDate->endOfDay();
        $end = $end->toDateTime();
        $booking_status = BookingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('booking_money_due_date',[$start,$end])->sum('booking_money_due');
        $after_handover_money = AfterHandoverMoney::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('after_handover_money_due_date',[$start,$end])->sum('after_handover_money_money_due');
        $building_pilling = BuildingPillingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('building_pilling_money_due_date',[$start,$end])->sum('building_pilling_money_due');
        $car_parking = CarParkingStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('car_parking_money_due_date',[$start,$end])->sum('car_parking_money_due');
        $down_payment = DownpaymentStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('downpayment_money_due_date',[$start,$end])->sum('downpayment_money_due');
        $finishing_money = FinishingWorkStatus::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('finishing_work_money_due_date',[$start,$end])->sum('finishing_work_money_due');
        $first_floor = FloorRoofCasting1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('floor_roof_casting_money_due_date_1st',[$start,$end])->sum('floor_roof_casting_money_due_1st');
        $land_filling_1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');
        $land_filling_2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');
        $installment = Installment::where('crm_id','=',Auth::guard('admin')->user()->crm_id)->whereBetween('installment_due_date',[$start,$end])->sum('installment_paid');
        $todayTotalDue = $after_handover_money + $booking_status + $building_pilling + $car_parking + $down_payment + $finishing_money + $first_floor + $land_filling_1st + $land_filling_2nd + $installment;
        return view('dashboard.dashboard',compact('users','totalDueAmount','totalPaidAmount','todayTotalDue'));
    }


    public function employeeDashboard()
    {
        $users = User::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->count();
        $totalDueAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('after_handover_money_money_due');
        $bookingStatus = BookingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('booking_money_due');
        $buildingPillingStatus = BuildingPillingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('building_pilling_money_due');
        $carParkingMoneyDue = CarParkingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('car_parking_money_due');
        $downPaymentStatus = DownpaymentStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('downpayment_money_due');
        $finishingWorkStatus = FinishingWorkStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('finishing_work_money_due');
        $firstRoofCasting = FloorRoofCasting1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('floor_roof_casting_money_due_1st');
        $landFillingStatus1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('land_filling_money_due');
        $landFillingStatus2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('land_filling_money_due');
        $installment = Installment::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('installment_due');
        $totalDueAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $totalPaidAmount=0;
        $afterHandOverMoney = AfterHandoverMoney::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('after_handover_money_money_paid');
        $bookingStatus = BookingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('booking_money_paid');
        $buildingPillingStatus = BuildingPillingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('building_pilling_money_paid');
        $carParkingMoneyDue = CarParkingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('car_parking_money_paid');
        $downPaymentStatus = DownpaymentStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('downpayment_money_paid');
        $finishingWorkStatus = FinishingWorkStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('finishing_work_money_paid');
        $firstRoofCasting = FloorRoofCasting1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('floor_roof_casting_money_paid_1st');
        $landFillingStatus1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('land_filling_money_paid');
        $landFillingStatus2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('land_filling_money_paid');
        $installment = Installment::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->sum('installment_paid');
        $totalPaidAmount = $afterHandOverMoney + $bookingStatus + $buildingPillingStatus + $carParkingMoneyDue + $downPaymentStatus + $finishingWorkStatus + $firstRoofCasting + $landFillingStatus1st + $landFillingStatus2nd + $installment;
        $todayTotalDue = 0;
        $todayDate = Carbon::now();
        $start = $todayDate->startOfDay();
        $start = $start->toDateTime();
        $end = $todayDate->endOfDay();
        $end = $end->toDateTime();
        $booking_status = BookingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('booking_money_due_date',[$start,$end])->sum('booking_money_due');
        $after_handover_money = AfterHandoverMoney::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('after_handover_money_due_date',[$start,$end])->sum('after_handover_money_money_due');
        $building_pilling = BuildingPillingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('building_pilling_money_due_date',[$start,$end])->sum('building_pilling_money_due');
        $car_parking = CarParkingStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('car_parking_money_due_date',[$start,$end])->sum('car_parking_money_due');
        $down_payment = DownpaymentStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('downpayment_money_due_date',[$start,$end])->sum('downpayment_money_due');
        $finishing_money = FinishingWorkStatus::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('finishing_work_money_due_date',[$start,$end])->sum('finishing_work_money_due');
        $first_floor = FloorRoofCasting1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('floor_roof_casting_money_due_date_1st',[$start,$end])->sum('floor_roof_casting_money_due_1st');
        $land_filling_1st = LandFillingStatus1st::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');
        $land_filling_2nd = LandFillingStatus2nd::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('land_filling_money_due_date',[$start,$end])->sum('land_filling_money_due');
        $installment = Installment::where('crm_id','=',Auth::guard('employee')->user()->crm_id)->whereBetween('installment_due_date',[$start,$end])->sum('installment_paid');
        $todayTotalDue = $after_handover_money + $booking_status + $building_pilling + $car_parking + $down_payment + $finishing_money + $first_floor + $land_filling_1st + $land_filling_2nd + $installment;
        $allTotal=$totalPaidAmount+  $totalDueAmount;
        return view('dashboard.employee-dashboard',compact('users','totalDueAmount','totalPaidAmount','todayTotalDue','allTotal'));
    }
}
