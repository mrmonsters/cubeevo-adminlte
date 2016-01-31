<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <!--<link rel="stylesheet" href="css/reset.css"> --> 
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    @if(Session::get('locale') == 'en') 
    <style type="text/css">
      body{
        font-family: "Conv_DINNextLTPro-Light", sans-serif;
      } 
      b{
        font-family: "Conv_DINNextLTPro-Bold", sans-serif;
      }
    </style>
    @endif 
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/jquery.fullPage.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/perspectiveRules.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v=4"> <!-- Custom style --> 

<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.fullPage.min.js') }}"></script> 
<script src="{{ asset('js/nav.js') }}"></script> 
<script src="{{ asset('js/jquery.parallax.js') }}"></script> 
<script src="{{ asset('js/slick.min.js') }}"></script> 
<script src="{{ asset('js/jquery.logosDistort.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}?v=3"></script> <!-- Resource jQuery -->
<!-- Addon Scripts -->
@yield('frontend-addon-script')