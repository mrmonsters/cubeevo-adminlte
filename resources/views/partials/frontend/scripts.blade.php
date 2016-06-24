<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.js"></script>
<script src="{{asset('js/angular/libs/angular-resource/angular-resource.js')}}"></script>

<script src="{{ asset('js/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.fullPage.min.js') }}"></script>
<script src="{{ asset('js/nav.js') }}"></script> 
<script src="{{ asset('js/jquery.parallax.js') }}"></script> 
<script src="{{ asset('js/slick.min.js') }}"></script> 
<script src="{{ asset('js/jquery.logosDistort.min.js') }}"></script>
@yield('angular-script')
<script src="{{ asset('js/custom.js') }}?v=4"></script> <!-- Resource jQuery -->
<!-- Addon Scripts -->
@yield('frontend-addon-script')