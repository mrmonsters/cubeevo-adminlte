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
			<h2 class="txtorange"><span></span>{{ (Session::get('locale') == 'en') ? 'CONTACT US' : '联络我们' }}</h2>
			<h5>{{ (Session::get('locale') == 'en') ? 'If there\'s anything that you need from our service, feel free to leave us your contact and information. We can\'t wait to get in touch with you.' : '任何服务方案需求，欢迎留下您的联系方式，我们迫不及待想与您愉快聊天！' }}</h5>
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
		<form id="form-contact-us" method="POST" action="{{ url('contact-us/submit') }}" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="col-sm-8 col-sm-offset-2">
				<div class="col-sm-6">  
					<span class="icon cont-name"></span>
					<input type="text" id="inputName" class="form-control" name="name" placeholder="{{ (Session::get('locale') == 'en') ? 'NAME' : '姓名' }}" required="" autofocus="">
				</div>
				<div class="col-sm-6"> 
					<span class="icon cont-mail"></span>
					<input type="email" id="inputEmail" class="form-control" name="email" placeholder="{{ (Session::get('locale') == 'en') ? 'EMAIL' : '电邮' }}" required="" autofocus="">
				</div>
			</div>
				
			<div class="col-sm-8 col-sm-offset-2">
				<div class="col-sm-6"> 
					<span class="icon cont-contact"></span>
					<input type="text" id="inputNumber" class="form-control" name="phone" placeholder="{{ (Session::get('locale') == 'en') ? 'CONTACT NO' : '联络号码' }}" required="" autofocus="">
				</div>
				<div class="col-sm-6"> 
					<span class="icon cont-title"></span>
					<input type="text" id="inputTitle" class="form-control" name="subject" placeholder="{{ (Session::get('locale') == 'en') ? 'SUBJECT' : '标题' }}" required="" autofocus="">
				</div>
			</div>
			
			<div class="col-sm-8 col-sm-offset-2">
				<div class="col-sm-12">	
					<label class="unhide">{{ (Session::get('locale') == 'en') ? 'MESSAGE' : '讯息' }}</label>
					<span class="icon cont-msg" style="top:-3px;"></span>
					<textarea name="content"> </textarea>
				</div>
			</div>
			
			<div class="col-sm-10 col-sm-offset-1 text-center">
				<br/> 
				<br/> 
				<button class="btn btn-sm btn-default" onclick="submitForm()">{{ (Session::get('locale') == 'en') ? 'SEND' : '呈交' }}</button>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
			</div>	
		</form>
	</div>
		
	<div class="row contactdetails" style="position:relative;"> 
		<div class="col-sm-11 col-sm-offset-1">
			<div class="col-sm-5 nopadding">
				<h4>CUBEevo Advertising Sdn. Bhd. <span class="p">(949017-T)</span></h4>
				<h4>形立方广告有限公司</h4>
				<br/>
				<h5><?php echo $settings->where('code', 'address')->first()->value ;?></h5>
				<br/>
				<ul class="list-inline">
					<li><i class="icon phone"></i><h5 class="nopadding"><a class="text-orange" href="tel:{{ $settings->where('code', 'phone')->first()->value }}"><small>{{ $settings->where('code', 'phone')->first()->value }}</small></a></h5></li>
					<li><i class="icon fax"></i><h5 class="nopadding"><small>{{ $settings->where('code', 'fax')->first()->value }}</small></h5></li>
					<li><i class="icon mail" style="margin-top: -3px;"></i><h5 class="nopadding"><a class="text-orange" href="mailto:{{ $settings->where('code', 'email')->first()->value }}"><small>{{ $settings->where('code', 'email')->first()->value }}</small></a></h5></li>
				</ul>
			</div>
			<div class="col-sm-7 contact-person">
				<div class="col-sm-4">
					<h5>Alvin Lee</h5>
					<p><i>Account Director</i><br>
					策划总监</p>
					<ul>
						<li><i class="icon handphone"></i><a class="text-orange" href="tel:+60173318916">+6017 331 8916</a></li>
						<li><i class="icon mail"></i><a class="text-orange" href="mailto:alvin@cubeevo.com">alvin@cubeevo.com</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<h5>Timothy Tai</h5>
					<p><i>Account Manager</i><br>
					客户经理</p>
					<ul>
						<li><i class="icon handphone"></i><a class="text-orange" href="tel:+60173216004">+6017 321 6004</a></li>
						<li><i class="icon mail"></i><a class="text-orange" href="mailto:timothy@cubeevo.com">timothy@cubeevo.com</a></li>
					</ul>
				</div>
				
				<div class="col-sm-4">
					<h5>Keith Phang</h5>
					<p><i>Branding Manager</i><br>
					品牌经理</p>
					<ul>
						<li><i class="icon handphone"></i><a class="text-orange" href="tel:+6018 352 4300">+6018 352 4300</a></li>
						<li><i class="icon mail"></i><a class="text-orange" href="mailto:keith@cubeevo.com">keith@cubeevo.com</a></li>
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
	  @if(Session::get('locale') == 'en')
	  var image = 'img/Map_Pointer.svg'; 
	  @elseif(Session::get('locale') == 'cn')
	  var image = 'img/Map_Pointer.svg'; 
	  @endif
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

<script type="text/javascript">
function submitForm()
{
	$('#form-contact-us').submit();
}
</script>
@endsection	