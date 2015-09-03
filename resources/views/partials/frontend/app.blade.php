<!DOCTYPE html>
<html>
	@include('partials.frontend.htmlheader')

	<body>
		<div class="blanket" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 9999; background-color: rgb(0, 0, 0);">
	    <div class="loader" style="position: absolute;
		    top: 50%;
		    left: 50%;
		    width: 60px;
		    height: 4px;
		    background-color: #FFF;
		    margin-left: -30px;
		    margin-top: -2px;
		    animation: spin 1.5s infinite linear;
		    animation-timing-function: ease;
		    -webkit-animation: spin 1.5s infinite linear;
		    -webkit-animation-timing-function: ease;"></div>
		</div>
		<!-- Navigation -->
		@include('partials.frontend.menu')
		<!-- Main content -->
		@yield('frontend-content')
		<!-- Scripts -->
		@include('partials.frontend.scripts')
	</body>

</html>