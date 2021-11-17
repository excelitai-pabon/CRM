<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shapla City</title>

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        table {
            border: 1px solid #C9CACC;
        }

        table tr td {
            width: 50%;
            padding: 5px 10px;
            border: 1px solid #C9CACC;
            border-right: 0px;
            border-left: 0px;
        }

        @media print {
            @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap');

            body {
                font-family: 'Source Sans Pro', sans-serif !important;
                font-size: 16px !important;
                line-height: 1.6 !important;
            }

            table {
                border: 0px !important;
            }

            table tr {
                border: 1px solid #C9CACC !important;
            }

            table tr th,
            table tr td {

                padding: 10px !important;
                border-bottom: 0px !important;
                font-family: 'Source Sans Pro', sans-serif !important;
            }

            table tr td a,
            table tr th,
            table tr td b {
                color: #1F1752 !important;
                font-size: 18px !important;
            }

            table tr td b {
                padding-right: 5px !important;
            }

            .border_none tr td {
                border: 0 !important;
            }
        }

        @media print {}

    </style>
</head>

<body>

<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%" style="border: 0px;">
    <tr>
        <td style="border: 0px !important; padding: 0px;">

            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px !important;">
                <tr>

                    <td width="50%" style="border: 0px !important;">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; padding-right: 20px">

                            <tr>

                                <td height="150" width="100" style="border: 0px;border-radius: 50px;overflow: hidden;">
                                    <p style="height: 100px; width: 100px !important;float: right;">
                                        <img src="<?php echo $pic;?>" alt="" style="height:100%;width:100%;">
                                    </p>
                                </td>

                            </tr>

                            <tr>

                                <td >Nominee Img
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td width="50%" style="border: 0px !important">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; margin-left: 20px">
                            <tr>

                                <td height="150" width="100" style="border: 0;border-radius: 50px;overflow: hidden;">
                                    <p style="height: 100px; width: 100px !important;float: right;">
                                        <img src="<?php echo $pic2;?>" alt="" style="height:100%;width:100%;">
                                    </p>
                                </td>

                            </tr>
                            <tr  >

                            <td >Nominee Img
                            </td>
                        </tr>
                        </table>
                    </td>

                </tr>
            </table>

        </td>
    </tr>




    <tr>
        <td style="border: 0px !important; padding: 0 !important;">
            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">


                <tr>
                    <td>File No:</td>
                    <td>{{$user->file_no}}</td>
                </tr>
                <tr>
                    <td>Applicant Name:</td>
                    <td>{{$user->member_name}}</td>
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
                    <td>{{$user->husband_name}}</td>
                </tr>
                <tr>
                    <td>Parment Address:</td>
                    <td >{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Mobile No 1:</td>
                    <td >{{$user->permanent_address}}</td>
                </tr>
                <tr>
                    <td>Mobile No 2:</td>
                    <td >{{$user->mailing_address}}</td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td>{{$user->phone_no_1}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td >{{$user->phone_no_2}}</td>
                </tr>
                <tr>
                    <td>National ID No:</td>
                    <td >{{$user->date_of_birth}}</td>
                </tr>
                <tr>
                    <td>Profession/Occupassion:</td>
                    <td >{{$user->national_id}}</td>
                </tr>
                <tr>
                    <td>Office Address:</td>
                    <td>{{$user->profession}}</td>
                </tr>
                <tr>
                    <td>Designation:</td>
                    <td >{{$user->office_address}}</td>
                </tr>
                <tr>
                    <td>Nominee:</td>
                    <td >{{$user->designation}}</td>
                </tr>
                <tr>
                    <td>Relation With Applicant:</td>
                    <td >{{$user->nominee_name}}</td>
                </tr>
                <tr>
                    <td>Building No:</td>
                    <td>{{$user->relation_with_mominee}}</td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td >{{$user->building_no}}</td>
                </tr>
            </table>
        </td>
    </tr>






</table>

</body>

</html>
