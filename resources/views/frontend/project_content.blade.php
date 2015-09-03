@extends('partials.frontend.app')
<?php use App\Models\Block; ?>

@section('frontend-content')
<div class="container-fluid credential">
    <div class="row" style="position:relative;"> 
        <div class="col-sm-12 nopadding">
            <img src="{{ $project->brandImage->dir }}" width="100%">
        </div>
        <div class="col-sm-12 blankbox" style="background-color:{{ $project->pri_color_code }}">
        <?php /*
        	<div class="cre-of1"><img src="{{ asset('img/Images-42.png') }}" class="mascott"></div>
        */ ?>
        </div>
        <div class="col-sm-12 cre-info">
            <div class="box">
                <div class="box-bg" style="background-color:{{ $project->sec_color_code }}"></div>
                <div class="box-content"> 
                    <div class="col-sm-9 col-sm-9 col-sm-offset-2">
                        <div class="row">
                            <div class="col-sm-2">
                            	<p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'CLIENT' : '客户名称' }}</p>
                            	<p>{{ (Session::get('locale') == 'en') ? strtoupper($project->translate(Session::get('locale'))->client_name) : $project->translate(Session::get('locale'))->client_name }}</p>
                                <br>
                                <p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'YEARS' : '合作年份' }}</p>
                            	<p>{{ $project->year }}</p>
                            </div>
                            <div class="col-sm-10">
                                <p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'PROJECT' : '项目名称' }}</p>
                            	<h3>{{ (Session::get('locale') == 'en') ? strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(Session::get('locale'))->name }}</h3>
                                
                            	<div class="col-sm-6 crecol-1">
                                <p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'BACKGROUND' : '客户细节' }}</p>
                                {{ $project->translate(Session::get('locale'))->background }}
                                <br>
                                <br>
                                <p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE CHALLENGE' : '项目概述' }}</p>
                                {{ $project->translate(Session::get('locale'))->challenge }}</div>
                                <div class="col-sm-6 crecol-2">
                                <p class="desctitle" style="color:{{ $project->txt_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE RESULT' : '最终成果' }}</p>
                                {{ $project->translate(Session::get('locale'))->result }}
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-2 col-ppl">
                            	<div class="photo"><img src="{{ asset('img/Images-08.png') }}" width="100%"></div>
                            	<p>Founder / CEO</p>
                                <p>-{{ $project->founder }}-</p>
                            </div>
                            <div class="col-sm-10">
                                <p class="desctitle" style="color:#8c0039">客户反馈</p>
                            	<p>品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通</p>
                                <p class="desctitle" style="color:#8c0039">客户反馈</p>
                            	<p>品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通</p>
                                <p class="desctitle" style="color:#8c0039">客户反馈</p>
                            	<p>品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通</p>
                                <p class="desctitle" style="color:#8c0039">客户反馈</p>
                            	<p>品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通</p>
                                <p class="desctitle" style="color:#8c0039">客户反馈</p>
                            	<p>品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通</p>
								</div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    @foreach ($project->blocks()->orderBy('sort_order')->get() as $block)
    @if ($block->type == Block::IMAGE)
        @include('partials.frontend.image')
    @elseif ($block->type == Block::GALLERY)
        @include('partials.frontend.carousel')
    @elseif ($block->type == Block::VIDEO)
        @include('partials.frontend.video')
    @endif
    @endforeach
</div> 
@endsection

@section('addon-script')
<script type="text/javascript">
$(function(){
  $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });

  // If you want to keep full screen on window resize
  $(window).resize(function(){
    $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  });
});
</script>
@endsection