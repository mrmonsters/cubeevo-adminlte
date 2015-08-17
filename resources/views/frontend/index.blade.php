@extends('partials.frontend.app')

@section('frontend-content') 
<div id="fullpage">
    <div class="section" id="section0">
        <div class="col-sm-6 maincol-right">
            <ul class="scene mob-hide">
                <li class="layer" data-depth="0.50"><img src="{{ asset('img/Images-41-2.png') }}" width="100%" ></li>
            </ul>
            <ul class="scene mob-visible">
                <li class="layer" data-depth="0.50"><img src="{{ asset('img/Images-30.png') }}" width="100%" ></li>
            </ul>
        </div> 
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                    <div class="row">
                        <div class="col-sm-push-5 col-sm-6">
                            <h3>形立方</h3>
                            <p>
                            形立方的标志概念和灵感是基于最基本的设计元素， 魔术方块，形状，格框以及线条所组成的。形立方追求【灵活】，聆听客户意见，灵活变通，跳脱不必要的框架；形立方也讲究【活力】，在打造品牌的过程中就是展现活力。
                            </p>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>  
    </div>
    <div class="section" id="section1">
    	<div class="col-sm-6 maincol-right">
            <ul class="scene orange">
                <li class="layer" data-depth="1.00"><div id="light"></div></li>
                <li class="layer" data-depth="0.30"><div id="orangemascott"></div></li>  
            </ul>
        </div> 
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                <div class="row">
                    <div class="col-sm-push-5 col-sm-6">
                        <h3>灵活</h3>
                        <p>
                        形立方追求灵活，弹性，务必让合作过程更加灵活，只为达致客户最理想的成果。
                        </p>
                    </div> 
                </div> 
                </div> 
            </div>
        </div>
        
    </div>
    <div class="section" id="section2">
    	<div class="col-sm-6 maincol-right">
            <ul class="scene">
                <li class="layer" data-depth="0.50"><img src="{{ asset('img/Mascott/Light.gif') }}" width="100%" ></li>
                <li class="layer" data-depth="0.70"><img src="{{ asset('img/Mascott/Orange-Background_1.png') }}" width="100%" ></li>
                <li class="layer" data-depth="0.80"><img src="{{ asset('img/Mascott/Orange-Background_2.png') }}" width="100%" ></li>
                <li class="layer" data-depth="1"><img src="{{ asset('img/Mascott/Orange-Background_3.png') }}" width="100%" ></li>
            </ul>
        </div> 
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                <div class="row">
                    <div class="col-sm-push-5 col-sm-6">
                        <h3>活力</h3>
                        <p>
                        形立方无时无刻都精力充沛，为企业带来正能量！
                        </p>
                    </div> 
                </div> 
                </div> 
            </div>
        </div>
         
    </div>
    <div class="section" id="section3">
    	<div class="col-sm-6 maincol-right">
            <!--<img src="img/Images-41-2.png" width="100%">-->
        </div>  
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                <div class="row">
                    <div class="col-sm-push-5 col-sm-6">
                        <h3>破格</h3>
                        <p>
                        形立方在创业上不仅仅是大胆，还会打破框框，为客户打造专属形象！
                        </p>
                    </div> 
                </div> 
                </div> 
            </div>
        </div>
        
    </div>
    <div class="section" id="section4">
    	<div class="col-sm-6 maincol-right">
            <!--<img src="img/Images-41-2.png" width="100%">-->
        </div>
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                <div class="row">
                    <div class="col-sm-push-5 col-sm-6">
                        <h3>美感</h3>
                        <p>
                        形立方的根本是创意设计，大前提必须是美感触觉，为客户建立完美形象！
                        </p>
                    </div> 
                </div> 
                </div> 
            </div>
        </div>
          
    </div>
    <div class="section" id="section5">
    	<div class="col-sm-6 maincol-right">
            <!--<img src="img/Images-41-2.png" width="100%">-->
        </div>  
        <div class="col-sm-6 maincol-left">
            <div class="content-wrapper">
                <div class="content-section"> 
                <div class="row">
                    <div class="col-sm-push-5 col-sm-6">
                        <h3>创意</h3>
                        <p>
                        形立方的创意是一种天赋，精心打造独一无二的作品便是最大成就！
                        </p>
                    </div> 
                </div> 
                </div> 
            </div>
        </div>
        
    </div>
    @if (isset($sections) && is_array($sections) && !empty($sections))
    @foreach ($sections as $section)
    <?php echo html_entity_decode($section->section_content); ?>
    @endforeach
    @endif
</div>   

@include('partials.frontend.navi')

@endsection