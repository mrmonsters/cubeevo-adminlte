<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <!--<link rel="stylesheet" href="css/reset.css"> --> 
    <link rel="stylesheet" href="{{ asset('css/atebits.css') }}"> 
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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Custom style -->
	<script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
  	
	<title>CUBEevo | 形立方</title>
    <?php use App\Models\Setting; ?>
    @if(!empty(Setting::where('code', '=', 'ga_key')->first()->value))
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', "{{$site_settings->where('code', 'ga_key')->first()->value}}", 'auto');
      ga('send', 'pageview');

    </script>
    @endif
</head>