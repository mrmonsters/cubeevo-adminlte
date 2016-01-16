@extends('partials.frontend.app')

@section('frontend-content')
<?php
use App\Models\Status;
use App\Models\Setting;

$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
$response = Session::get('response');
?>
<div class="container-fluid contactus">
	<div class="row" style="position:relative;"> 
		<div class="col-sm-10 col-sm-offset-2">
			<h2 class="txtorange"><span></span>{{ (Session::get('locale') == 'en') ? 'INSIGHTS' : '联络我们' }}</h2>
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
			<a href="#" class="txtorange">What are types of agencies in the market?</a>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>	
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>  
	</div> 
			 
</div>
		 
@endsection	