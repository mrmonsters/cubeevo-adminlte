<?php  
use App\Models\Files;
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ ($value = $site_settings->where('code', 'meta_desc')->first()->value) ? $value : '' }}" />
  <meta name="keywords" content="{{ ($value = $site_settings->where('code', 'meta_keyword')->first()->value) ? $value : '' }}" />
  <!-- Facebook title & description-->
  <meta property="og:title" content="{{ ($value = $site_settings->where('code', 'site_title')->first()->value) ? $value : '' }}" />

  <meta property="og:site_name" content="{{ ($value = $site_settings->where('code', 'site_title')->first()->value) ? $value : '' }}"/>
  <meta property="og:image" content="{{ ($id = $site_settings->where('code', 'meta_img_id')->first()->value) ? Files::find($id)->dir : '' }}" />
  <meta property="og:description" content="{{ ($value = $site_settings->where('code', 'meta_desc')->first()->value) ? $value : '' }}" />
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	  <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <!--<link rel="stylesheet" href="css/reset.css"> --> 
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">  
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

	  <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
    <title>{{ ($value = $site_settings->where('code', 'site_title')->first()->value) ? $value : '' }}</title>
    <?php use App\Models\Setting; ?>
    @if(isset(Setting::where('code', '=', 'ga_key')->first()->value))
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', "{{ ($value = $site_settings->where('code', 'ga_key')->first()->value) ? $value : '' }}", 'auto');
      ga('send', 'pageview');

    </script>
    @endif
</head>