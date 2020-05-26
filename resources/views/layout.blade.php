<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thumb-slide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

<!--[if IE 9]>
    <script src="{{ asset('js/media.match.min.js') }}"></script>
    <![endif]-->

</head>

<body>

@yield('content')

</body>

{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
<!-- Local jQuery -->
<script>
    window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.0.min.js') }}"><\/script>')
</script>
<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="{{ asset('js/jquery.ui.map.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>


<script>

</script>



<!-- Mirrored from new.uouapps.com/takeaway/menu(view-1).html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 May 2020 16:04:26 GMT -->
</html>
