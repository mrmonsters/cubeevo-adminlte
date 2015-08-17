<!DOCTYPE html>
<html>
	@include('partials.frontend.htmlheader')

	<body>
		<!-- Navigation -->
		@include('partials.frontend.menu')
		<!-- Main content -->
		@yield('frontend-content')
		<!-- Scripts -->
		@include('partials.frontend.scripts')
	</body>

</html>