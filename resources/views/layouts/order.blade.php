<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <link href="{{asset('assets/front/css/intlTelInput.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="stylesheet" href="https://phpcoder.tech/phone-number-with-country-code/build/css/intlTelInput.css">

</head>
<body>

@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://phpcoder.tech/phone-number-with-country-code/build/js/intlTelInput.js"></script>

<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>

<script src="{{asset('assets/front/js/popper.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>

{{--<script src="{{asset('assets/front/js/intlTelInput.js')}}"></script>--}}

@yield('script')
</body>
</html>
