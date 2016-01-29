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
.thumb-content{position:absolute;top: 0;padding: 15px;display: none;background: rgba(0,0,0,0.5);width: 96%;height: 100%;} 
.other-post:hover .thumb-content{display: block;}
</style>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4efee86c3355840d" async="async"></script>

<div class="container-fluid contactus">
	<div class="row" style="position:relative;"> 
		<div class="col-sm-2 col-sm-offset-2">
			<p>{{ (Session::get('locale') == 'en') ? 'DATE' : '日期' }}</p>
			<p class="txtorange"><?php echo date('F d, Y',strtotime($post->created_at));?></p>
		</div> 
		<div class="col-sm-7">
			<p>{{ (Session::get('locale') == 'en') ? 'TITLE' : '标题' }}</p>
			<h2 class="txtorange" style="margin-top:0px;">{{$post->translate(Session::get('locale'))->title}}</h2>
		</div>
	</div>  
	<div class="row" style="position:relative;">   
		<div class="col-sm-7 col-sm-offset-4">  
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
		<div class="col-sm-7 col-sm-offset-4 text-center">  
		<hr style="border-color:#ddd;" />
		<p style="    padding-bottom: 5px;
    width: 70px;
    background: #eee;
    margin: -28.5px auto 0 auto;">{{ (Session::get('locale') == 'en') ? 'SHARE' : '分享' }}</p>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<center><div class="addthis_sharing_toolbox"></div></center>
		<hr style="border-color:#ddd;" />
		</div>
	</div>
	@if(count($posts) > 0)
	<div class="row" style="position:relative;">   
		<div class="col-sm-7 col-sm-offset-4"> 
		<p>{{ (Session::get('locale') == 'en') ? 'You may also be interested in' : '其他文章:' }}:</p> 
		<div class="row">
			@foreach($posts as $post) 
			<?php 
		   // $content = html_entity_decode($post->translate(Session::get('locale'))->description);
		    //$content = strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)); 
		    ?>
			<a href="{{url('insights/detail/'.$post->slug)}}" class="other-post"> 
				<div class="col-xs-6 col-md-3 col-sm-6" style="position:relative;margin-bottom:10px;overflow: hidden;padding-right:0px;margin-left:-6px;"> 
					<div class="thumb-content text-white"> 
						<small>-<?php echo date('F d, Y',strtotime($post->created_at));?></small>
						<br/>
						<br/>
						<p style="margin-bottom:0px;"><?php echo substr(html_entity_decode($post->translate(Session::get('locale'))->title),0,100);?></p> 
						<?php /*?><small><?php echo substr($content,0,50);?></small><?php */?>
						<br/>
						<br/>
						<small><i class="fa fa-file-text"></i> <u>{{ (Session::get('locale') == 'en') ? 'Read more here' : '阅读详情' }}</u></small>
					</div> 
					<img src="{{$post->coverImage->dir}}" width="100%" />
				</div> 
			</a> 
			@endforeach
		</div> 
		</div>
	</div>
	@endif
	<br/>
	<br/>  
			 
</div>
		 
@endsection	