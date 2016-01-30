<!DOCTYPE html>
<html>
	@include('partials.frontend.htmlheader')

	<body>
		<div class="blanket" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 9999; background-color: #676464;">
	    <div class="loader" style="position: absolute;
		    top: 50%;
		    left: 50%;
		    width: 60px;
		    height: 4px; 
		    margin-left: -30px;
		    margin-top: -2px;
		    animation: spin 1.5s infinite linear;
		    animation-timing-function: ease;
		    -webkit-animation: spin 1.5s infinite linear;
		    -webkit-animation-timing-function: ease;">
		    <div class="loader">
			  <div class="square" ></div>
			  <div class="square"></div>
			  <div class="square last"></div>
			  <div class="square clear"></div>
			  <div class="square"></div>
			  <div class="square last"></div>
			  <div class="square clear"></div>
			  <div class="square "></div>
			  <div class="square last"></div>
			</div> 
		</div>
		</div>
		<!-- Navigation -->
		@include('partials.frontend.menu')
		<!-- Main content -->
		@yield('frontend-content')
		<!-- Scripts -->
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
    <link rel="stylesheet" href="{{ asset('css/jquery.fullPage.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/perspectiveRules.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v=4"> <!-- Custom style --> 

    <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
		@include('partials.frontend.scripts')
	</body>

</html>