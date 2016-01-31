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
     
    <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
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