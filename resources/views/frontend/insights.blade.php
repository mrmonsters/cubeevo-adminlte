@extends('partials.frontend.app')

@section('frontend-content')
<?php
use App\Models\Status;
use App\Models\Setting;

$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
$response = Session::get('response'); 
?>
<style type="text/css">
	.post{position: relative;}
	.post-content{position: absolute;top: 12px;left: 40px;padding: 10px;line-height: 200%;}
	.post-date{position: absolute;left:83%;margin-top: -5%;}
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
	<div class="row" style="position:relative;">   
		@foreach($posts as $post)
		<?php 
		    $content = html_entity_decode($post->translate(Session::get('locale'))->description);
		    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content))); ?>
		<div class="col-sm-8 col-sm-offset-2 post"> 
			<img src="{{url('img/Programmer Needs-20.svg')}}" class="hidden-xs" style="max-width:895px;">
			<div class="post-content"> 
				<a href="{{url('insights/detail/'.$post->slug)}}" class="txtorange">{{$post->translate(Session::get('locale'))->title}}</a>
				<div><?php echo substr($content,0,100);?></div> 
			</div>
			<div class="post-date">
				<?php echo date('F d,Y',strtotime($post->created_at));?>
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