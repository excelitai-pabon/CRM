
@extends('master.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h2 class="d-flex justify-content-center py-4">Today All Due</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Booking Money Due Status</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($booking_status as $data)
                                    <tr>
                                            <td>{{$data->user->file_no}}</td>
                                            <td>{{$data->user->member_name}}</td>
                                            <td>{{$data->user->phone_no_1}}</td>
                                            <td>{{$data->booking_money_due}}</td>
                                            <td>{{Carbon\Carbon::parse($data->booking_money_due_date)->format('jS F Y')}}</td>
                                            <td>{{$data->booking_money_note}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">After Handover Money</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($after_handover_money as $data)
                                <tr>
                                    <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->after_handover_money_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->after_handover_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->after_handover_money_note}}</td>
                                </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Building Pilling Money Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead  class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($building_pilling as $data)
                                    <tr>
                                        <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->building_pilling_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->building_pilling_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->building_pilling_money_note}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

{{--
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Car Parking Money Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($car_parking as $data)
                                <tr>
                                    <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->car_parking_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->car_parking_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->car_parking_money_note}}</td>
                                </tr>

                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Down Payment Money Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($down_payment as $data)
                                    <tr>
                                        <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->downpayment_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->downpayment_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->downpayment_money_note}}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Finishing Work Money Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($finishing_money as $data)
                                    <tr>

                                        <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->finishing_work_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->finishing_work_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->finishing_work_money_note}}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">First Floor Roof Casting Money Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($first_floor as $data)
                                <tr>
                                    <td>{{$data->user->file_no}}</td>
                                    <td>{{$data->user->member_name}}</td>
                                    <td>{{$data->user->phone_no_1}}</td>
                                    <td>{{$data->floor_roof_casting_money_due_1st}}</td>
                                    <td>{{Carbon\Carbon::parse($data->floor_roof_casting_money_due_date_1st)->format('jS F Y')}}</td>
                                    <td>{{$data->floor_roof_casting_money_note_1st}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Land Filling Money First Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($land_filling_1st as $data)
                                <tr>
                                    <td>{{$data->user->file_no}}</td>
                                    <td>{{$data->user->member_name}}</td>
                                    <td>{{$data->user->phone_no_1}}</td>
                                    <td>{{$data->land_filling_money_due}}</td>
                                    <td>{{Carbon\Carbon::parse($data->land_filling_money_due_date)->format('jS F Y')}}</td>
                                    <td>{{$data->land_filling_money_note}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Land Filling Money Sceond Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($land_filling_2nd as $data)
                                    <tr>
                                        <td>{{$data->user->file_no}}</td>
                                        <td>{{$data->user->member_name}}</td>
                                        <td>{{$data->user->phone_no_1}}</td>
                                        <td>{{$data->land_filling_money_due}}</td>
                                        <td>{{Carbon\Carbon::parse($data->land_filling_money_due_date)->format('jS F Y')}}</td>
                                        <td>{{$data->land_filling_money_note}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Today Installment Due</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>File No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Due Money</th>
                                    <th>Due Date</th>
                                    <th>Note</th>

                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($installment as $data)
                                <tr>

                                    <td>{{$data->user->file_no}}</td>
                                    <td>{{$data->user->member_name}}</td>
                                    <td>{{$data->user->phone_no_1}}</td>
                                    <td>{{$data->installment_due}}</td>
                                    <td>{{Carbon\Carbon::parse($data->installment_due_date)->format('jS F Y')}}</td>
                                    <td>{{$data->installment_note}}</td>
                                    </tr>
                               @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection















