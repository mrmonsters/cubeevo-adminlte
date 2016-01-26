@extends('partials.frontend.app')

@section('frontend-content')
<?php
use App\Models\Status;
use App\Models\Setting;

$settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
$response = Session::get('response'); 
?> 
<style type="text/css">
html,body{background-color: #20BCC1;}
.thumb-content{position:absolute;top: 0;padding: 15px;}
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4efee86c3355840d" async="async"></script>
<div class="container-fluid contactus">
	<div class="row" style="position:relative;"> 
		<div class="col-sm-2 col-sm-offset-2">
			<p>{{ (Session::get('locale') == 'en') ? 'YEAR' : '年份' }}</p>
			<p class="txtorange"><?php echo date('Y',strtotime($post->created_at));?></p>
		</div> 
		<div class="col-sm-7">
			<p>{{ (Session::get('locale') == 'en') ? 'TITLE' : '标题' }}</p>
			<h2 class="txtorange" style="margin-top:0px;">{{$post->translate(Session::get('locale'))->title}}</h2>
		</div>
	</div>  
	<div class="row" style="position:relative;">   
		<div class="col-sm-8 col-sm-offset-4">  
			<div><?php echo html_entity_decode($post->translate(Session::get('locale'))->description);?></div>
		</div>	 
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>  
	</div> 
	<div class="row" style="position:relative;">   
		<div class="col-sm-8 col-sm-offset-4 text-center">  
		<hr style="border-color:#ddd;" />
		<p style="margin-top: -28.5px;padding-bottom: 5px;">{{ (Session::get('locale') == 'en') ? 'SHARE' : '分享' }}</p>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<center><div class="addthis_sharing_toolbox"></div></center>
		<hr style="border-color:#ddd;" />
		</div>
	</div>
	@if(count($posts) > 0)
	<div class="row" style="position:relative;">   
		<div class="col-sm-8 col-sm-offset-4"> 
		<p>{{ (Session::get('locale') == 'en') ? 'You may also be interested in:' : '其他文章:' }}:</p> 
		<div class="row">
			@foreach($posts as $post) 
			<?php 
		    $content = html_entity_decode($post->translate(Session::get('locale'))->description);
		    $content = preg_replace("/<img[^>]+\>/i", " ", $content); 
		    ?>
			<a href="{{url('insights/detail/'.$post->slug)}}" > 
				<div class="col-sm-3" style="position:relative;"> 
					<div class="thumb-content text-white">
						<small>-<?php echo date('F d,Y',strtotime($post->created_at));?></small>
						<br/>
						<?php echo substr(html_entity_decode($post->translate(Session::get('locale'))->title),0,100);?>
						<br/>
						<?php echo substr($content,0,50).'...';?>
						<br/>
						<br/>
						<small><i class="fa fa-file-text"></i> <u>{{ (Session::get('locale') == 'en') ? 'Read more here' : '阅读详情' }}</u></small>
					</div> 
					<img src="{{$post->coverImage->dir}}" width="100%" />
				</div> 
			</a>
			@endforeach
		</div>
		<br/>
		</div>
	</div>
	@endif
			 
</div>
		 
@endsection	