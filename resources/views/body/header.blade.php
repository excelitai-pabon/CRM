
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Shaplacity limited</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets')}}/logo/mobilelogo.png">

        <link href="{{asset('assets')}}/libs/chartist/chartist.min.css" rel="stylesheet">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/css.css">


        <!-- Essential css-->
        @yield('css')
        <!-- App Css-->

        <link  rel="stylesheet" href="{{asset('assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}">
        <link href="{{asset('assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <script src="{{asset('assets')}}/libs/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>


    </head>

    <body data-sidebar="dark">
        @if (Session::has('success'))
        <script>
            Swal.fire({ title: 'Success', text: '{{Session::get("success")}}', icon: 'success'})
            // setTimeout(function(){
            //     window.location.reload(1);
            // }, 2000);
        </script>

        @endif
        @if(Session::has('error'))
        <script>
           Swal.fire({ title: 'Opps!', text: '{{Session::get("error")}}', icon: 'error' })
        //    setTimeout(function(){
        //         window.location.reload(1);
        //     }, 2000);
        </script>
        @endif
