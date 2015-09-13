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
            <div id='cre-box__{{$count}}' class="js-three-d sol-box col-sm-6 col-lg-4" style="background: {{ $solution->pri_color_code }} url('..{{ $solution->backgroundImage->dir }}') no-repeat center center;  -webkit-background-size: cover;
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
                        <div class="col-xs-12 visible-xs-block">
                            <div class="threedot js-showtitle"><i class="icon-btn-link icon-btn-link-white"></i></div>
                        </div> 
                    </div>   

                </div>
            </div>
            @if (($count % 3 == 0) || ($count == $solutions->count())) 
            @endif
        @endforeach
        <?php echo '</div>'; ?>
    @endif 
</div> 
@endsection