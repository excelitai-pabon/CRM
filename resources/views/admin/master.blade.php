<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: Excel IT AI :: Projects Management </title>
    {{-- {{asset('')}} --}}
    <link rel="shortcut icon" href="{{asset('assets/logo/mobilelogo.png')}}">  <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('assets/css/my-task.style.min.css')}}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


{{-- addproduct cse start --}}
 <!-- Favicon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('assets/plugin/nestable/jquery-nestable.css')}}">





</head>
<body>
    <div id="mytask-layout" class="theme-indigo">
        @include('body.sidebar')
        <div class="main px-lg-4 px-md-4">
            @include('body.header')
            @yield('admin')



    </div>
    </div>
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="{{asset('js/template.js')}}"></script>

</body>
</html>
