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
                <p style="text-align:center;font-size:22px;font-weight:600;">Money Recived</p>
                <p> <b> Invoice No.  </b></p>
                <p>  Invoice Date : @if(isset($booking_money))
                    {{\Carbon\Carbon::parse($booking_money->booking_money_paid_date)->format("D jS F, Y") }}
                    @elseif(isset($down_payment))
                    {{$down_payment->downpayment_money_paid_date}}
                    @elseif(isset($car_parking))
                    {{$car_parking->car_parking_money_paid_date}}
                    @elseif(isset($land_filling1))
                    {{$land_filling1->land_filling_money_paid_date}}
                    @elseif(isset($land_filling2))
                    {{$land_filling2->land_filling_money_paid_date}}
                    @elseif(isset($building_pilling))
                    {{$building_pilling->building_pilling_money_paid_date}}
                    @elseif(isset($first_floor_roof))
                    {{$first_floor_roof->floor_roof_casting_money_paid_date_1st}}
                    @elseif(isset($finishing_Work))
                    {{$finishing_Work->finishing_work_money_paid_date}}
                    @elseif(isset($after_hand_over_money))
                    {{$after_hand_over_money->after_handover_money_paid_date}}
                    @endif
                </p>
            </td>
        </tr>
    </table>

    <table width="100% " style="margin-top:10px !important;">
        <tr>
            <td  style=" padding:10px;">
                <p> <b> Invoice To:</b></p>
                <p>{{$user->member_name}}</p>
                <p>{{$user->mailing_address}}</p>

            </td>
        </tr>
    </table>
    <table id="fantasyTable" class="display responsive no-wrap order-column" width="100% " style="margin-top:20px !important;">

        <thead >
            <tr style="font-family: sans-serif !important;">

                <th >Basic Amount</th>
                <th >Payment Type</th>
                <th >Paid Amount Date</th>
            </tr>
        </thead>

        @if (isset($booking_money))
        <tr>
            <td>Booking Money</td>
            <td>{{$booking_money->booking_money_payment_type}}</td>
            <td>{{$booking_money->booking_money_paid}}</td>
        </tr>
        @elseif (isset($down_payment))
        <tr>
            <td>Down Payment</td>
            <td>{{$down_payment->downpayment_money_payment_type}}</td>
            <td>{{$down_payment->downpayment_money_paid}}</td>
        </tr>
        @elseif(isset($car_parking))
        <tr>
            <td>Car Parking</td>
            <td>{{$car_parking->car_parking_money_paid}}</td>
            <td>{{$car_parking->car_parking_money_paid}}</td>
        </tr>
        @elseif(isset($land_filling1))
        <tr>
            <td>1st Land Filling</td>
            <td>{{$land_filling1->land_filling_money_payment_type}}</td>
            <td>{{$land_filling1->land_filling_money_paid}}</td>
        </tr>
        @elseif(isset($land_filling2))
        <tr>
            <td>2nd Land Filling </td>
            <td>{{$land_filling2->land_filling_money_payment_type}}</td>
            <td>{{$land_filling2->land_filling_money_paid}}</td>
        </tr>
        @elseif(isset($building_pilling))
        <tr>
            <td>Building Pilling</td>
            <td>{{$building_pilling->building_pilling_money_payment_type}}</td>
            <td>{{$building_pilling->building_pilling_money_paid}}</td>
        </tr>
        @elseif(isset($first_floor_roof))
        <tr>
            <td>First Floor Roof Casting</td>
            <td>{{$first_floor_roof->floor_roof_casting_money_payment_type_1st}}</td>
            <td>{{$first_floor_roof->floor_roof_casting_money_paid_1st}}</td>
        </tr>
        @elseif(isset($finishing_Work))
        <tr>
            <td>Finishing Work</td>
            <td>{{$finishing_Work->finishing_work_money_payment_type}}</td>
            <td>{{$finishing_Work->finishing_work_money_paid}}</td>
        </tr>
        @elseif(isset($after_hand_over_money))
        <tr>
            <td>After hand over money</td>
            <td>{{$after_hand_over_money->after_handover_money_payment_type}}</td>
            <td>{{$after_hand_over_money->after_handover_money_money_paid}}</td>
        </tr>
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


