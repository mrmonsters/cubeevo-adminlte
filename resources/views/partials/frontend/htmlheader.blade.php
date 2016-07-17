<?php
use App\Models\Files;

  $meta_desc = (isset($meta_desc) && !empty($meta_desc))?$meta_desc:$site_settings->where('code', 'meta_desc')->first()->value;
  $meta_keyword = (isset($meta_keyword) && !empty($meta_keyword))?$meta_keyword:$site_settings->where('code', 'meta_keyword')->first()->value;
  $meta_title = (isset($meta_title) && !empty($meta_title))?$meta_title.' - '.$site_settings->where('code', 'site_title')->first()->value:$site_settings->where('code', 'site_title')->first()->value;

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_desc }}" />
  <meta name="keywords" content="{{ $meta_keyword }}" />
  <!-- Facebook title & description-->
  <meta property="og:title" content="{{ $meta_title }}" />

  <meta property="og:site_name" content="{{ $meta_title }}"/>
  <meta property="og:image" content="{{ ($id = $site_settings->where('code', 'meta_img_id')->first()->value) ? Files::find($id)->dir : '' }}" />
  <meta property="og:description" content="{{ $meta_desc }}" />
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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v=4"> <!-- Custom style -->

    <script async src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
    <title>{{ $meta_title }}</title>
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