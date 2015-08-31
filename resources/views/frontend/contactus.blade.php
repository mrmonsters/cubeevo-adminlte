@extends('partials.frontend.app')

@section('frontend-content')
<?php
use App\Models\Status;
use App\Models\Setting;

$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
?>
<div class="container-fluid contactus">
	<div class="row" style="position:relative;"> 
		<div class="col-sm-10 col-sm-offset-2">
			<h2 class="txtorange"><span></span>联络我们</h2>
			<h5>任何服务方案需求，欢迎留下您的联系方式，我们迫不及待想与您愉快聊天！</h5>
		</div>
	</div> 
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<div class="row" style="position:relative;"> 
		<div class="col-sm-8 col-sm-offset-2">
			<div class="col-sm-6"> 
				<span class="icon cont-name"></span>
				<input type="text" id="inputName" class="form-control" placeholder="姓名" required="" autofocus="">
			</div>
			<div class="col-sm-6"> 
				<span class="icon cont-mail"></span>
				<input type="email" id="inputEmail" class="form-control" placeholder="电邮" required="" autofocus="">
			</div>
		</div>
			
		<div class="col-sm-8 col-sm-offset-2">
			<div class="col-sm-6"> 
				<span class="icon cont-contact"></span>
				<input type="text" id="inputNumber" class="form-control" placeholder="联络号码" required="" autofocus="">
			</div>
			<div class="col-sm-6"> 
				<span class="icon cont-title"></span>
				<input type="text" id="inputTitle" class="form-control" placeholder="标题" required="" autofocus="">
			</div>
		</div>
		
		<div class="col-sm-8 col-sm-offset-2">
			<div class="col-sm-12">	
				<label class="unhide">讯息</label>
				<span class="icon cont-msg" style="top:-3px;"></span>
				<textarea> </textarea>
			</div>
		</div>
		
		<div class="col-sm-10 col-sm-offset-1 text-center">
			<br/> 
			<br/> 
			<button type="button" class="btn btn-sm btn-default">呈交</button>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		</div>	
	</div>
		
	<div class="row contactdetails" style="position:relative;"> 
		<div class="col-sm-11 col-sm-offset-1">
			<div class="col-sm-5 nopadding">
				<h4>CUBEevo Advertising Sdn. Bhd.<span class="p">(949017-T)</span></h4>
				<h4>形立方广告有限公司</h4>
				<br/>
				<h5>{{ $settings->where('code', 'address')->first()->value }}</h5>
				<br/>
				<ul class="list-inline">
					<li class="phone"><h5 class="nopadding">{{ $settings->where('code', 'phone')->first()->value }}</h5></li>
					<li class="fax"><h5 class="nopadding">{{ $settings->where('code', 'fax')->first()->value }}</h5></li>
					<li class="mail"><h5 class="nopadding">{{ $settings->where('code', 'email')->first()->value }}</h5></li>
				</ul>
			</div>
			<div class="col-sm-7 contact-person">
				<div class="col-sm-4">
					<h5>Alvin Lee</h5>
					<p><i>Account Director</i><br>
					策划总监</p>
					<ul>
						<li class="handphone">+6017 331 8916</li>
						<li class="mail">alvin@cubeevo.com</li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<h5>Timothy Tai</h5>
					<p><i>Account Manager</i><br>
					客户经理</p>
					<ul>
						<li class="handphone">+6017 321 6004</li>
						<li class="mail">timothy@cubeevo.com</li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<h5>Keith Phang</h5>
					<p><i>Branding Manager</i><br>
					品牌经理</p>
					<ul>
						<li class="handphone">+6018 352 4300</li>
						<li class="mail">keith@cubeevo.com</li>
					</ul>
				</div>
			</div>
		</div>
	</div>	 
			
	<div class="row contactdetails" style="position:relative;padding:0px;">  
		<div style="overflow:hidden;height:500px;width:100%;">
			<div id="map-canvas" style="height:500px;width:100%;"></div>
			<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
			<a class="google-map-code" href="http://premium-wordpress-themes.org" id="get-map-data">premium wordpress themes</a>
		</div>
	</div>
</div>
		
@section('frontend-addon-script') 
    <script>
    function initMap() { 
	  
	  var image = 'img/Images-20.png'; 
	  var styles = [
	   {
	     featureType: "all",
	     elementType: "all",
	      "stylers": [
		      { "saturation": -100 },
		      { "lightness": 14 },
		      { "gamma": 0.31 } 
		    ] 
	   }
	  ];
	    
	  // Create a new StyledMapType object, passing it the array of styles,
	  // as well as the name to be displayed on the map type control.
	  var styledMap = new google.maps.StyledMapType(styles,
	    {name: "Styled Map"});

	  // Create a map object, and include the MapTypeId to add
	  // to the map type control.
	  var mapOptions = {
	    zoom: 18,
	   	center: {lat: {{ $settings->where('code', 'gmaps_lat')->first()->value }}, lng: {{ $settings->where('code', 'gmaps_lng')->first()->value }} },
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
	    }
	  };
	  var map = new google.maps.Map(document.getElementById('map-canvas'),
	    mapOptions);

	  var beachMarker = new google.maps.Marker({
	   position: {lat: {{ $settings->where('code', 'gmaps_lat')->first()->value }}, lng: {{ $settings->where('code', 'gmaps_lng')->first()->value }} },
	   map: map,
	   icon: image
	    });
	    

	  //Associate the styled map with the MapTypeId and set it to display.
	  map.mapTypes.set('map_style', styledMap);
	  map.setMapTypeId('map_style');

  	} 
    </script>
  <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
   async defer></script>
@endsection	