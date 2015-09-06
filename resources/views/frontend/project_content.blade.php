@extends('partials.frontend.app')
<?php use App\Models\Block; ?>

@section('frontend-content')
<style>
.btn-back{background-color: {{ $project->pri_color_code }};}
.box-content{color:{{ $project->txt_color_code }};}
.box-content a{color:{{ $project->txt_color_code }};}
.arrow-bar-1,.arrow-bar-2{background-color:#fff;} 
.container-fluid.credential{background-color:{{ $project->pri_color_code }}  }
.slick-prev-wrapper.slick-arrow{background-color: {{ $project->pri_color_code }};}
.slick-next-wrapper.slick-arrow{background-color: {{ $project->pri_color_code }};}
</style>
<div class="container-fluid credential">
    <div class="row"> 
        <div class="col-sm-12 nopadding brandImage" style="background-image:url('{{ $project->brandImage->dir }}');">
            <img src="{{ $project->brandImage->dir }}" width="100%">
        </div>
        <div class="col-sm-12 blankbox" style="background-color:{{ $project->sec_color_code }}">
        @if (isset($project->mascottImage->dir))
    	<div class="cre-of1"><img src="{{ $project->mascottImage->dir }}" class="project-mascott"></div>
        @endif
        </div>
        <div class="col-sm-12 cre-info">
            <div class="box">
                <div class="box-bg" style="background-color:{{ $project->pri_color_code }}"></div>
                <div class="box-content"> 
                    <div class="row">
                        <div class="col-sm-9 col-sm-9 col-sm-offset-2">
                            <div class="row">
                                <div class="col-sm-2">
                                	<p class="desctitle project-client-name" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'CLIENT' : '客户名称' }}</p>
                                	<p>{{ (Session::get('locale') == 'en') ? strtoupper($project->translate(Session::get('locale'))->client_name) : $project->translate(Session::get('locale'))->client_name }}</p>
                                    <br>
                                    <p class="desctitle project-year" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'YEARS' : '合作年份' }}</p>
                                	<p>{{ $project->year }}</p>
                                </div>
                                <div class="col-sm-10">
                                    <p class="desctitle project-name" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'PROJECT' : '项目名称' }}</p>
                                	<h3>{{ (Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(Session::get('locale'))->name }}</h3>
                                    <h4>{{ $project->translate(Session::get('locale'))->sub_heading }}</h4>
                                    
                                    <div style="padding-top:14%;">
                                    	<div class="col-sm-6 crecol-1">
                                        <p class="desctitle" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'BACKGROUND' : '客户细节' }}</p>
                                        {{ $project->translate(Session::get('locale'))->background }}
                                        <br>
                                        <br>
                                        <br>
                                        <p class="desctitle" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE CHALLENGE' : '项目概述' }}</p>
                                        {{ $project->translate(Session::get('locale'))->challenge }}
                                        @if (isset($project->web_link) && $project->web_link != '')
                                        <br>
                                        <br>
                                        <br>
                                        <p class="desctitle" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'WEBSITE' : '网址' }}</p>
                                        <a href="{{ $project->web_link }}" target="_blank">{{ $project->web_link }}</a>
                                        @endif
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1 crecol-2">
                                        <p class="desctitle" style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE RESULT' : '最终成果' }}</p>
                                        {{ $project->translate(Session::get('locale'))->result }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="project-block-content">
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