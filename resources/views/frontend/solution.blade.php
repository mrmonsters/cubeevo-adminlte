@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid sol">
    @if (isset($solutions) && !$solutions->isEmpty())
        <?php $count = 0; ?>
        <?php echo '<div class="row">'; ?>
        @foreach ($solutions as $solution)
            <?php $count++; ?>
            @if ($count % 3 == 1) 
            @endif 
            <div id='sol-box__{{$count}}' class="js-three-d sol-box col-sm-6 col-lg-4" style="background: {{ $solution->pri_color_code }} url('..{{ $solution->backgroundImage->dir }}') no-repeat center center;  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;background-size: 110% auto;">
                <div class="contbox"> 
                    <div class="greybox"></div> 

                    <div class="cd-background-wrapper">
                        <figure class="cd-floating-background">
                            @if ($dir = $solution->frontImage->dir) 
                            <ul class="scene">
                                <li class="layer" data-depth="0.20"><img src="{{ $solution->frontImage->dir }}" width="100%"/></li>
                            </ul>  
                            @endif
                        </figure>
                    </div> 

                    <div class="row panel-body overlap">
                        <p class="col-xs-12 hidden-text text-center panel-title">
                            {{ $solution->translate(Session::get('locale'))->name }}
                        </p>
                        <div class="clearfix"></div>
                        <br/> 
                        <p class="col-xs-12 hidden-text text-center panel-title-desc">
                            <?php echo $solution->translate(Session::get('locale'))->desc;?>
                        </p> 
                    </div> 
                    <div class="row" style="position: absolute;bottom: 12%;left: 8%;z-index:1;">
                        <div class="col-xs-12 visible-xs-block visible-sm-block visible-md-block">
                            <div class="threedot js-showtitle"><i class="icon-btn-link icon-btn-link-white"></i></div>
                        </div> 
                    </div>   

                </div>
            </div>
            @if (($count % 3 == 0) || ($count == $solutions->count())) 
            @endif
        @endforeach
            <div id='sol-box' class="extra-info-box sol-box visible-sm-block visible-md-block col-sm-6">
                <div class="extra-info-box__wrapper">
                    <div class="extra-info-box__info">
                    @if(Session::get('locale') == 'en') 
                     <h4 class="text-white">We have proven our worthiness.<br/>Work with us.<br/>Together we shall create masterpieces.</h4>
                     <p class="text-white" style="padding:0px 0px 10px 0px;display:block;">Please Contact</p> 
                     @else
                     <h4 class="text-white">希望这些作品能提高您对我们的信心<br/>更多的精彩作品，只待您跟我们一同完成，<br/>欢迎前来咨询</h4>
                     <p class="text-white" style="padding:0px 0px 10px 0px;display:block;">请联络</p> 
                     @endif 
                     <ul class="list-unstyled list-with-icon">
                        <li><i class="icon phone phone-white"></i><a href="tel:+60390109882" class="text-orange" style="padding-left:30px;">+603 9010 9882</a></li>
                        <li><i class="icon mail mail-white"></i><a href="mailto:enquire@cubeevo.com" class="text-orange" style="padding-left:30px;">enquire@cubeevo.com</a></li>
                    </ul> 
                     </div>
                 </div>
            </div>
        <?php echo '</div>'; ?>
    @endif 
</div> 
@endsection