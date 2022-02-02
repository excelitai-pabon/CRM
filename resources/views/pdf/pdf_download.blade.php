<html>
  <head>
  </head>
  <style>
      body {
  max-width:960px;
    margin:0 auto
}
.border-right {
	border-right: thin solid #F5F5F5
}
.m-b-20 {
	margin: 0 0 20px 0;
}
.m-b-30 {
	margin: 0 0 30px 0;
}
.m-b-60 {
	margin: 0 0 30px 0;
}
.category-row ul {
	list-style: none;
}
.category-row li a {
	font-style: normal;
}
.category-row ul li {
	margin-left: 0;
}
.category-row a > img {
	margin: 0 0 30px 0;
}
.category-row a > img:hover {
	opacity: 0.54;
	filter: alpha(opacity=54); /* For IE8 and earlier */
}
.category-link-sm {
	color: #2196F3;
	font-size: 12px;
}
.category-link {
	color: #2196F3;
}
.ga-arrow-right {
	position: relative;
	top: .3em;
}
.hero {
	background-size: cover;

	text-shadow: 1px 2px 3px #000000;
	position: relative;
	padding: 30px 30px 0 30px;
}
.hero p > img {
	display: inline;
	padding: 10px
}
.inverse {
	color: white
}
.inverse a {
	color: white
}
#fantasyTable {
	width: 100%;
	border-collapse: collapse;
}
#fantasyTable th {
	background: #D6D6D6;
	font-size: .75rem;
	font-weight: 400;
    color: #1F1752;
	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #D6D6D6;
}
#fantasyTable td {
	padding: 4px 8px;
	font-size: .75rem;
	font-weight: 400;

	border-bottom: solid thin #C1C1C1;
	border-right: solid thin #C1C1C1;
	border-top: solid thin #D6D6D6;
	border-left: solid thin #D6D6D6;
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
	border-left: solid thin #D6D6D6;
}
/*controls column 1*/
#fantasyTable td:nth-child(1) {
    text-align: center;
	border-left: solid 1px #FFFFFF;
/*controls column 1 header*/
#fantasyTable th:nth-child(1) {
	text-align: center;
	border-left: solid 1px #FFFFFF;
}
/*controls column 2*/
#fantasyTable td:nth-child(2) {
	text-transform: uppercase;
}
/*controls column 5*/
#fantasyTable td:nth-child(5) {

	text-align: left;
	font-weight: 700;
}
/*controls column head 5*/
#fantasyTable th:nth-child(5) {

	text-align: left;
}
/*controls column 6*/
#fantasyTable td:nth-child(6) {

	text-align: left;
	font-weight: 700;
}
/*controls column head 6*/
#fantasyTable th:nth-child(6) {

	text-align: left;
}
.pointsTable {
}
.pointLeader img {
	float: left;
	padding-right: 20px;
	font-weight: 900;
}
.pointLeader p {
	font-size: .75rem;
	text-align: left
}
.pointLeader h4 {
	font-weight: 900;
	text-align: left
}
.align-center {
	text-align: center
}
.learnMore {
	padding: 0 0 0 10px
}
.md-label {

}
.md-label-orange {
	background: #f78d2c;
	padding: 0.3rem 0.5rem;
	border-radius: 0;
	color: white
}
.md-caps {
	text-transform: uppercase
}
.card {
	border: solid thin #F5F5F5;
	padding: 2rem 1rem;
}
.callout {
	border: solid thin #F5F5F5;

	border-radius: 5px;
	padding: .5rem;
	width: auto;
}
.md-black {
	font-weight: 900;
}
.linethrough {
	text-align: center;
	position: relative;
	z-index: 1;
}
.linethrough:before {

	content: "";
	margin: 0 auto; /* this centers the line to the full width specified */
	position: absolute; /* positioning must be absolute here, and relative positioning must be applied to the parent */
	top: 15px;
	left: 0;
	right: 0;
	bottom: 0;
	width: 95%;
	z-index: -1;
}
.linethrough span {
	/* to hide the lines from behind the text, you have to set the background color the same as the container */

	padding: 0 15px;
}
.max-width-50 {
	max-width: 50%
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
	display: none !important
}
}

</style>
  <body>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px !important; margin-top:50px !important;">
        <tr>

            <td width="50%" style="border: 0px !important;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; padding-right: 20px">

                    <tr>

                        <td height="150" width="100" style="border: 0px;border-radius: 50px;overflow: hidden; border-radius:50%!important;">
                            <p style="height: 100px; width: 100px !important;  float:left!important; ">
                                <img src="<?php echo $pic;?>" alt="" style="height:100%;width:100%;">
                            </p>
                        </td>

                    </tr>

                    <tr>
                        {{-- up --}}
                        <td  style="text-align:left; padding-top:-80px!important;">Applicant Img
                        </td>
                    </tr>

                </table>


            </td>

            {{-- adding --}}
            <td width="70%" style="border: 0px !important;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; padding-right: 20px">

                    <tr>

                        <td height="150" width="100" style="border: 0px;border-radius: 50px;overflow: hidden; border-radius:50%!important;">
                            <p style="height: 100px; width: 100px !important;  float:left!important; ">
                                <img src="<?php echo $pic3;?>" alt="" style="height:100%;width:100%;">
                            </p>
                        </td>

                    </tr>

                    <tr>
                        {{-- up --}}
                        <td  style="text-align:left; padding-top:-80px!important;">Applicant Img
                        </td>
                    </tr>

                </table>


            </td>



            <td width="50%" style="border: 0px !important">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; margin-left: 20px">
                    <tr>

                        <td height="150" width="100" style="border: 0;border-radius: 50px;overflow: hidden; border-radius:50%!important;">
                            <p style="height: 100px; width: 100px !important;  float: right!important; ">
                                <img src="<?php echo $pic2;?>" alt="" style="height:100%;width:100%;">
                            </p>
                        </td>

                    </tr>
                    <tr  >

                    <td style="text-align: right;  padding-top:-80px!important;">Nominee Img
                    </td>
                </tr>
                </table>
            </td>

        </tr>
    </table>



<table id="fantasyTable" class="display responsive no-wrap order-column" width="100% " style="margin-top:30px !important;">
<thead>

    <tr >


        <th colspan="2" style="text-align: center">Basic Information</th>


    </tr>
 </thead>
 <tr>
    <td>File No:</td>
    <td >{{$user->file_no}}</td>
</tr>
<tr>
    <td>Applicant Name:</td>
    <td >{{$user->member_name}}</td>
</tr>
<tr>
    <td>Father/Husband Name:</td>
    <td >{{$user->father_name}}</td>
</tr>
<tr>
    <td>Mother Name:</td>
    <td >{{$user->mother_name}}</td>
</tr>
<tr>
    <td>Malling Address:</td>
    <td >{{$user->email}}</td>
</tr>
<tr>
    <td>Parment Address:</td>
    <td >{{$user->permanent_address}}</td>
</tr>
<tr>
    <td>Mobile No 1:</td>
    <td >{{$user->phone_no_1}}</td>
</tr>
<tr>
    <td>Mobile No 2:</td>
    <td >{{$user->phone_no_2}}</td>
</tr>
<tr>
    <td>Date of Birth:</td>
    <td >{{$user->date_of_birth}}</td>
</tr>
<tr>
    <td>Email:</td>
    <td >{{$user->email}}</td>
</tr>
<tr>
    <td>National ID No:</td>
    <td >{{$user->national_id}}</td>
</tr>
<tr>
    <td>Profession/Occupassion:</td>
    <td >{{$user->profession}}</td>
</tr>
<tr>
    <td>Office Address:</td>
    <td >{{$user->office_address}}</td>
</tr>
<tr>
    <td>Designation:</td>
    <td >{{$user->designation}}</td>
</tr>
<tr>
    <td>Nominee:</td>
    <td >{{$user->nominee_name}}</td>
</tr>
<tr>
    <td>Relation With Applicant:</td>
    <td >{{$user->relation_with_mominee}}</td>
</tr>
<tr>
    <td>Building No:</td>
    <td >{{$user->building_no}}</td>
</tr>



</table>



    <table id="fantasyTable" class="display responsive no-wrap order-column" width="100% " style=" margin-top:30px !important;">

	<thead>

        <tr >


            <th colspan="8" style="text-align: center">Installment History</th>


        </tr>
     </thead>
     <thead>
        <tr>
            <th>Installment Information</th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Paid Date</th>
            <th>Due Date</th>

            <th>Note</th>
        </tr>
     </thead>


     @php
     $monthCounter = 0;
     $yearCounter = 0;
     $addMonth = 1;
     $paymentCheck=1;
     @endphp

     <tbody>

        @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)

            @php
                $monthCounter++;
            @endphp

            <tr>
                <td>Installment {{$i+1}}</td>

                @if (isset($user->Installment[$i]))
                    <td>{{$user->Installment[$i]->installment_amount}}</td>
                @else
                    <td>{{$user->installment_year->installment_years_amount[$yearCounter]}}</td>
                @endif

                @if (isset($user->Installment[$i]))
                    <td>{{$user->Installment[$i]->payment_installment_type}}</td>
                @else
                    <td></td>
                @endif

                @if (isset($user->Installment[$i]))
                    <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>
                @else
                    <td>Paid: 0</td>
                @endif

                @if (isset($user->Installment[$i]))
                    <td>Due: {{$user->Installment[$i]->installment_due}}</td>
                @else
                    <td>Due: 0</td>
                @endif

                @if (isset($user->Installment[$i]))
                    <td>{{$user->Installment[$i]->installment_date}}</td>
                @else
                    <td>{{$paid_date->startOfMonth()}}</td>
                @endif

                @if (isset($user->Installment[$i]))
                    <td>{{$user->Installment[$i]->installment_due_date}}</td>
                @else
                    <td></td>
                @endif







                @if (isset($user->Installment[$i]))
                    <td>{{$user->Installment[$i]->installment_note}}</td>
                @else
                    <td></td>
                @endif


                @php
                    if($monthCounter==12)
                    {
                        $monthCounter = 0;
                        $yearCounter++;
                    }
                    $paid_date->addMonthsNoOverflow(1)->startOfMonth();
                @endphp


            </tr>
        @endfor


    </tbody>

	</table>





<table id="fantasyTable" class="display responsive no-wrap order-column" width="100% " style="margin-top:70px !important;">
    <thead>

        <tr >


            <th colspan="3" style="text-align: center">Basic Amount</th>


        </tr>
     </thead>




    <thead>
      <tr>

        <th>Basic Amount</th>
        <th>Paid Amount</th>
        <th>Paid Amount Date</th>
      </tr>
     </thead>

     <tr>
        <td>Booking Money:</td>
        <td>{{($booking_status->initial_booking_money)-($booking_status->booking_money_due)}}</td>
        <td>{{$booking_status->booking_money_paid_date}}</td>
    </tr>
    <tr>
        <td>Down Payment:</td>
        <td>{{($down_payment->initial_downpayment_money)-($down_payment->downpayment_money_due)}}</td>
        <td>{{$down_payment->downpayment_money_paid_date}}</td>
    </tr>

    <tr>
        <td>Land Fillig 1</td>
        <td>{{($land_filing_1st->initial_land_filling_money)-($land_filing_1st->land_filling_money_due)}}</td>
        <td>{{$land_filing_1st->land_filling_money_paid_date}}</td>
    </tr>
    <tr>
        <td>Land Filling 2</td>
        <td>{{($land_filing_2nd->initial_land_filling_money)-($land_filing_2nd->land_filling_money_due)}}</td>
        <td>{{$land_filing_2nd->land_filling_money_paid_date}}</td>
    </tr>
    <tr>
        <td>Building Pilling</td>
        <td>{{($building_pilling_status->initial_building_pilling_money)-($building_pilling_status->building_pilling_money_due)}}</td>
        <td>{{$building_pilling_status->building_pilling_money_paid_date}}</td>
    </tr>
    <tr>
        <td>1st Floor Roof Casting:</td>
        <td>{{($roof_casting_1st->initial_floor_roof_casting_money_1st)-($roof_casting_1st->floor_roof_casting_money_due_1st)}}</td>
        <td>{{$roof_casting_1st->floor_roof_casting_money_due_date_1st}}</td>
    </tr>
    <tr>
        <td>Finising Work Amount</td>
        <td>{{$finishing_work->finishing_work_money_paid}}</td>
        <td>{{$finishing_work->finishing_work_money_paid_date}}</td>
    </tr>
    <tr>
        <td>After HandOver Amount</td>
        <td>{{($after_hand_over_money->initial_after_handover_money)-($after_hand_over_money->after_handover_money_money_due)}}</td>
        <td>{{$after_hand_over_money->after_handover_money_paid_date}}</td>
    </tr>

    </table>




  </body>
</html>

