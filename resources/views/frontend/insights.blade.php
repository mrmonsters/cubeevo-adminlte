@extends('partials.frontend.app')

@section('frontend-content')
<?php
use App\Models\Status;
use App\Models\Setting;

$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
$response = Session::get('response'); 
?>
<style type="text/css">
	.post{border-left:1px solid black;border-top:1px solid black;border-right:1px solid black;padding:20px;margin-bottom: 15px;} 
</style>
<div class="container-fluid contactus">
	<div class="row" style="position:relative;"> 
		<div class="col-sm-10 col-sm-offset-2">
			<h2 class="txtorange"><span></span>{{ (Session::get('locale') == 'en') ? 'INSIGHTS' : '品牌洞察' }}</h2>
		</div>
	</div> 
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/> 
	<div class="row" style="position:relative;padding:15px;">   
		@foreach($posts as $post)
		<?php 
		    $content = html_entity_decode($post->translate(Session::get('locale'))->description);
		    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content))); ?>
		<div class="col-sm-8 col-sm-offset-2 post"> 
			<div class="row"> 
				<div class="post-content col-xs-9"> 
					<a href="{{url('insights/detail/'.$post->slug)}}">
					<span class="txtorange">{{$post->translate(Session::get('locale'))->title}}</span>
					<div class="text-black"><?php echo substr($content,0,100);?></div> 
					</a>
				</div>
				<div class="post-date col-xs-3 text-center"  style="border-left:1px solid black">
					<p style="padding-top:12px;"><?php echo date('F d,Y',strtotime($post->created_at));?></p>
				</div>
			</div> 
		</div>	
		@endforeach
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>  
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>  
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