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
                <p style="text-align:center;font-size:22px;font-weight:600;"> Money Recived </p>
                <p> <b> Invoice No.  </b></p>
                <p>  Invoice Date :  {{\Carbon\Carbon::parse($installment->installment_paid_date)->format("D jS F, Y") }}

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

                <th >Intallment No</th>
                <th >Payment Type</th>
                <th >Payment Amount</th>
                <th > Due Amount</th>
            </tr>
        </thead>

        <tr>

            <td>{{$installment->installment_no}}</td>
            <td>{{$installment->installment_type}}</td>
            <td>{{$installment->installment_paid}}</td>
            <td>{{$installment->installment_due}}</td>

        </tr>

    </table>
    <table width="100% " style="margin-top:30px !important;">
        <tr>
            <td>
                <p style="margin-top:50px;">--------------------------</p>
                <p style="margin-top: -15px;font-size:15px;margin-left:30px;">Signature</p>
                <p style="margin-top:30px; font-size:12px;">Thanks a lot because you keep giving your payment our company promises to provide high quality support for you as well as outstrading customer service for every transaction</p>
            </td>
        </tr>
    </table>




  </body>
</html>

