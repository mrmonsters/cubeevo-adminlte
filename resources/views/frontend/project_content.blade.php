@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid credential">
    <div class="row" style="position:relative;"> 
        <div class="col-sm-12 nopadding">
            <img src="{{ asset('img/Hairdepot_Branding/Hairdepot_Branding_1920.jpg') }}" width="100%">
        </div>
        <div class="col-sm-12 blankbox" style="background-color:#d7006d">
        	<div class="cre-of1"><img src="{{ asset('img/Images-42.png') }}" class="mascott"></div>
        </div>
        <div class="col-sm-12 cre-info">
            <div class="box">
                <div class="box-bg" style="background-color:#ed0677"></div>
                <div class="box-content"> 
                    <div class="col-sm-9 col-sm-9 col-sm-offset-2">
                        <div class="row">
                            <div class="col-sm-2">
                            	<p class="desctitle" style="color:#8c0039">客户名称</p>
                            	<p>{{ $project['name'] }}</p>
                                <br>
                                <p class="desctitle" style="color:#8c0039">合作年份</p>
                            	<p>{{ $project['year'] }}</p>
                            </div>
                            <div class="col-sm-10">
                                <p class="desctitle" style="color:#8c0039">项目名称</p>
                            	<h3>{{ $project['name'] }}</h3>
                                
                                <p class="desctitle" style="color:#8c0039">项目概述</p>
                            	<div class="col-sm-6 crecol-1">当世界进入品牌竞争的时代，当品牌成为中华大地上商界的热点时，品牌设计也成为人们常挂在嘴边的时髦词汇。有人统计说企业每投在品牌形象设计上1美元，所获得的收益是227美元。如此诱人的投资回报率，无怪乎企业界对品牌设计趋之若鹜。那么，品牌设计究竟是什么？其魅力来自何处？<br>
                                <br>
                                品牌设计是在企业自身正确定位的基础之上，基于正确品牌定义下的视觉沟通，它是一个协助企业发展的形象实体，不仅协助企业正确的把握品牌方向，而且能够使人们正确的、快速的对企业形象进行有效深刻的记忆。品牌设计来源于最初的企业品牌战略顾问和策划顾问对企业进行战略整合以后，通过形象的东西所表现出来的东西，后来慢慢的形成了专业的品牌设计团体对企业品牌形象设计进行有效的规划。</div>
                                <div class="col-sm-6 crecol-2">设计是冰山一角，却至关重要！如果我们把品牌理解成一座冰山。品牌或企业所属的文化制度、员工行为、组织结构、核心技术、营销方式等要素是构成这座冰山的主体，尽管隐于水下，却是品牌发展最强有力的支撑与原动力。<br>
                                <br>
                                但这一切都必须通过一系列完整有效的视觉设计与品牌推广来被大众所认知。<br>
                                <br>
                                想想设计究竟有多重要！
                                </div>
                                
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-2 col-ppl">
                            	<div class="photo"><img src="{{ asset('img/Images-08.png') }}" width="100%"></div>
                            	<p>Founder / CEO</p>
                                <p>-{{ $project['founder'] }}-</p>
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
    <?php $imgIds = explode(",", $project['img_ids']); ?>
    @foreach ($imgIds as $imgId)
    <div class="row"> 
        <div class="col-xs-12 nopadding">
            <img src="{{ Files::find($imgId)->dir }}" width="100%">
        </div>
    </div>
    @endforeach
</div> 
@endsection