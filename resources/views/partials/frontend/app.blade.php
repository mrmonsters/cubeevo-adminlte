<!DOCTYPE html>
<html>
	@include('partials.frontend.htmlheader')
 
	<body data-baseurl="{{url('/')}}" id="body"> 
		<div class="content active animateIn">  
			<!-- Navigation -->
			@include('partials.frontend.menu') 
			<!-- Main content -->
			@yield('frontend-content') 
			<!-- Scripts -->
			@include('partials.frontend.scripts')
		</div>
		<div class="content nextcontent standby"> 
		</div>
	</body>

</html>