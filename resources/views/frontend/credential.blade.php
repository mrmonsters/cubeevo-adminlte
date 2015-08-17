@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid cre">
    <div class="row">
        <div class="col-sm-4 cre-1" onClick="location.href='{{ url('credential/content') }}';">
        	<div class="contbox">
                <div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/Hairdepot_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在零售业
                    </p>
                </div>  
            </div>
        </div>
        <div class="col-sm-4 cre-2" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.50"><img src="{{ asset('img/Credential Thumbnail/Greenology_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在餐饮业
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-sm-4 cre-3" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/PLT_Website_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在美容业
                    </p>
                </div> 
            </div>
        </div> 
    </div> 
    
    <div class="row">
        <div class="col-sm-4 cre-4" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox">
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/PLT_Website_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在电子业
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-sm-4 cre-5" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/HairMilk_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在金融业
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-sm-4 cre-6" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/Hairdepot_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在教学业
                    </p>
                </div> 
            </div>
        </div> 
    </div> 
    <div class="row">
        <div class="col-sm-4 cre-7" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/HairMilk_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在房产业
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-sm-4 cre-8" onClick="location.href='{{ url('credential/content') }}';">
            <div class="contbox">
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"><img src="{{ asset('img/Credential Thumbnail/PLT_Website_Thumbnail.png') }}" width="100%"/></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        型在汽车业
                    </p>
                </div> 
            </div>
        </div>
        <div class="col-sm-4 cre-9">
            <div class="contbox comingsoon"> 
            	<div class="greybox"></div>
                <ul class="scene">
                    <li class="layer" data-depth="0.30"></li>
                </ul> 
                <div class="row panel-body overlap">
                    <p class="col-sm-12 hidden-text panel-title">
                        敬请期待
                    </p>
                </div> 
            </div>
        </div> 
    </div> 
</div> 
@endsection