
<script async src="https://use.typekit.net/npl2kox.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
@if(Session::get('locale') == 'en')
    <style type="text/css">
        body{
            font-family: "Conv_DINNextLTPro-Light","source-han-sans-simplified-c", sans-serif;
        }
        b{
            font-family: "Conv_DINNextLTPro-Bold","source-han-sans-simplified-c", sans-serif;
        }
    </style>
@endif
<link rel="stylesheet" href="{{ asset('css/utils.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fullPage.css') }}">
<link rel="stylesheet" href="{{ asset('css/perspectiveRules.css') }}">
<link rel="stylesheet" href="{{ asset('css/pace.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.min.css') }}?v=5"> <!-- Custom style -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.4.7/angular-resource.min.js"></script>
<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('js/jquery.touchSwipe.min.js')}}"></script>
<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.fullPage.min.js') }}"></script>
<script src="{{ asset('js/nav.js') }}"></script>
<script src="{{ asset('js/jquery.parallax.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/timeline.min.js') }}"></script>
<script src="{{ asset('js/jquery.logosDistort.min.js') }}"></script>
<script src="{{asset('js/angular/libs/angular-fullpage/angular-fullpage.js')}}"></script>
<script src="{{asset('js/angular/app.js')}}"></script>
<script src="{{asset('js/angular/controllers/homepage.js')}}"></script>
<script src="{{ asset('js/custom.min.js') }}?v=5"></script> <!-- Resource jQuery -->
<!-- Addon Scripts -->
@yield('frontend-addon-script')