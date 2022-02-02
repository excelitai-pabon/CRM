<html>
  <head>
  </head>
  <style>
      body {
  max-width:960px;
    margin:0 auto;
    font-family: sans-serif;
}
.border-right {
	border-right: thin solid #F5F5F5
}

#fantasyTable {
	width: 100%;
	border-collapse: collapse;
    font-family: sans-serif;
}

#fantasyTable th {
	background: #D6D6D6;
	font-size: 1.1rem;
	font-weight: 500;
	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #C1C1C1;
    background: #97CFB1;
    padding: 5px 0;
}
td{
    font-size: .8rem;
}
#fantasyTable td {
	padding: 4px 8px;
	font-weight: 400;
    padding: 5px;
	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #C1C1C1;
}
#fantasyTable tr {
}
/*controls odd rows*/
#fantasyTable tr:nth-child(odd) {

	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #D6D6D6;

}
/*controls even rows*/
#fantasyTable tr:nth-child(even) {

	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #D6D6D6d;
    background: #E3F2EB;
}

/*controls responsive button for opening hidden columns*/
table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
	background-color: #0d82fb;
	border: none;
  font-size:12px
}
/* give space between search bar and table */
.dataTables_filter {
	margin-bottom: 20px
}

@media screen and (max-width: 39.9375em) {
/* give space between search bar and table */
.dataTables_filter {
	display: none !important;

}
}

</style>
  <body>

	<table width="100% " style="margin-top:0px !important;">
        <tr>
            <td width="50% ">
                <p> <img src="{{$logo}}" alt="" style="width: 250px"></p>

            </td>
			<td style="text-align: right;padding-top:15px; width:50%;">
				<p>Sara Tower(17 Floor),11/A <br>
				Toyenbee Circular Road,<br> shapla Cattar, <br>
				Motijheel C/A, Dhaka -1000 </p>
			</td>
        </tr>
    </table>

    <table width="100% " style="margin-top:50px !important;">
        <tr>
            <td  style="background:#2c9e613b; padding:10px;">
                <p style="text-align:center;font-size:22px;font-weight:600;">Statement</p>
                <p>  Invoice No :  </p>
                <p>  Invoice Date : </p>
            </td>
        </tr>
    </table>

    <table width="100% " style="margin-top:50px !important;">
        <tr>
            <td  style="color:#057539fd;">
                File Number :
            </td>
            <td >
               {{$user->file_no}}
            </td>

            <td  style="color:#057539fd;">
                Booking date :
            </td>
            <td >
                {{$user->booking_date}}
            </td>
        </tr>
        <tr>
            <td  style="color:#057539fd;">
               Member Name :
            </td>
            <td >
                {{$user->member_name}}

            </td>

            <td  style="color:#057539fd;">
                Date of Birth :
            </td>
            <td >
                {{$user->date_of_birth}}
            </td>
        </tr>

        <tr>
            <td  style="color:#057539fd;">
                Nominee Name :
            </td>
            <td >
               {{$user->nominee_name}}
            </td>

            <td  style="color:#057539fd;">
                Proffesion :
            </td>
            <td >
              {{$user->profession}}
            </td>
        </tr>
    </table>

    <table width="100% " style="margin-top:10px !important;">
        <tr>
            <td  style=" padding:10px;">

                <p> <b> Invoice To:</b></p>
                <p></p>
                <p></p>

            </td>
        </tr>
    </table>
    <table id="fantasyTable" class="display responsive no-wrap order-column" width="100% " style="margin-top:20px !important;">

        <thead >
            <tr style="font-family: sans-serif !important;">

                <th >SL.NO</th>
                <th >Service</th>
                <th >Payment </th>
                <th >Details</th>
                <th >Total</th>
            </tr>
        </thead>

        @if(isset($status['booking_status']))



        <tr>

            <td></td>

            <td>Booking status</td>
            <td>{{$status['booking_status']->booking_money_payment_type}}</td>
            <td>{{$status['booking_status']->booking_money_note}}</td>
            <td>{{($status['booking_status']->booking_money_initial)-($status['booking_status']->booking_money_due)}}</td>

        </tr>

        @else

        @endif

        @if(isset($status['down_payment_status']))

        <tr>

            <td></td>

            <td>Down Payment</td>
            <td>{{$status['down_payment_status']->downpayment_money_payment_type}}</td>
            <td>{{$status['down_payment_status']->downpayment_money_note}}</td>
            <td>{{$status['down_payment_status']->downpayment_money_paid}}</td>

        </tr>



        @elseif(isset($status['finishing_work_status']))



        <tr>

            <td></td>

            <td>Finishing Work</td>
            <td>{{$status['finishing_work_status']->finishing_work_money_payment_type}}</td>
            <td>{{$status['finishing_work_status']->finishing_work_money_note}}</td>
            <td>{{$status['finishing_work_status']->finishing_work_money_paid}}</td>



        </tr>

        @else


        @endif


        @if(isset($status['after_handover_money']))



        <tr>

            <td></td>

            <td>After Handover Money</td>
            <td>{{$status['after_handover_money']->after_handover_money_payment_type}}</td>
            <td>{{$status['after_handover_money']->after_handover_money_note}}</td>
            <td>{{$status['after_handover_money']->after_handover_money_money_paid}}</td>



        </tr>

        @else


        @endif




        @if(isset($status['land_filling_status_1']))



        <tr>

            <td></td>

            <td>Land filling 1</td>
            <td>{{$status['land_filling_status_1']->land_filling_money_payment_type}}</td>
            <td>{{$status['land_filling_status_1']->land_filling_money_note}}</td>
            <td>{{$status['land_filling_status_1']->land_filling_money_paid}}</td>



        </tr>

        @else


        @endif




        @if(isset($status['land_filling_status_2']))



        <tr>

            <td></td>

            <td>Land Filling 2</td>
            <td>{{$status['land_filling_status_2']->land_filling_money_payment_type}}</td>
            <td>{{$status['land_filling_status_2']->land_filling_money_note}}</td>
            <td>{{$status['land_filling_status_2']->land_filling_money_paid}}</td>



        </tr>
        @else
        @endif

        @if(isset($status['building_pilling_status']))
        <tr>

            <td></td>

            <td>Building Pilling</td>
            <td>{{$status['building_pilling_status']->building_pilling_money_payment_type}}</td>
            <td>{{$status['building_pilling_status']->building_pilling_money_note}}</td>
            <td>{{$status['building_pilling_status']->building_pilling_money_paid}}</td>



        </tr>
        @else
        @endif

        @if(isset($status['floor_roof_casting1st']))
        <tr>

            <td></td>

            <td>1st Floor Roof Casting</td>
            <td>{{$status['floor_roof_casting1st']->floor_roof_casting_money_payment_type_1st}}</td>
            <td>{{$status['floor_roof_casting1st']->floor_roof_casting_money_note_1st}}</td>
            <td>{{$status['floor_roof_casting1st']->floor_roof_casting_money_paid_1st}}</td>



        </tr>
        @else
        @endif
        @if(isset($status['registrationpayment_money']))
        <tr>

            <td></td>

            <td>Registrationpayment Money</td>
            <td>{{$status['registrationpayment_money']->registrationpayment_money_payment_type}}</td>
            <td>{{$status['registrationpayment_money']->registrationpayment_money_note}}</td>
            <td>{{$status['registrationpayment_money']->registrationpayment_money_paid}}</td>



        </tr>
        @else
        @endif

        @if(isset($status['car_parking']))
        <tr>

            <td></td>

            <td>Car Parking</td>
            <td>{{$status['car_parking']->car_parking_money_payment_type}}</td>
            <td>{{$status['car_parking']->car_parking_money_note}}</td>
            <td>{{$status['car_parking']->car_parking_money_paid}}</td>



        </tr>
        @else
        @endif


        @if(isset($status['khajna']))
        <tr>

            <td></td>

            <td>Khajna Money</td>
            <td>{{$status['khajna']->khajna_money_payment_type}}</td>
            <td>{{$status['khajna']->khajna_money_note}}</td>
            <td>{{$status['khajna']->khajna_money_paid}}</td>



        </tr>
        @else


        @endif
        @isset($all_installment)
            @foreach ($all_installment as $installment)

            <tr>

                <td></td>

                <td>Installment{{$installment->installment_no}}</td>
                <td>{{$installment->payment_installment_type}}</td>
                <td>{{$installment->installment_note}}</td>
                <td>{{$installment->installment_paid}}</td>



            </tr>

            @endforeach
        @endisset




        @if(isset($status['total']))
            <tr>
                <td colspan="4"> Grand Total</td>
                <td>{{$status['total']}}</td>
            </tr>
        @else
            <tr>....</tr>
        @endif






    </table>

    <table width="100% " style="margin-top:30px !important;">
        <tr>
            <td>
                <p style="margin-top:50px;" >--------------------------</p>
                <p style="margin-top: -15px;font-size:15px;margin-left:30px;">Signature</p>
                <p style="margin-top:30px; font-size:12px;">Thanks a lot because you keep giving your payment our company promises to provide high quality support for you as well as outstrading customer service for every transaction</p>
            </td>
        </tr>
    </table>




  </body>
</html>

