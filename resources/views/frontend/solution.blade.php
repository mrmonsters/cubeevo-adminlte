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
                            <ul class="scene">
                                <li class="layer" data-depth="0.30"><img src="{{ $solution->frontImage->dir }}" width="100%"/></li>
                            </ul>   
                        </figure>
                    </div> 

                    <div class="row panel-body overlap">
                        <p class="col-xs-12 col-sm-5 panel-title">
                            {{ $solution->translate(Session::get('locale'))->name }}
                        </p>
                        <p class="col-xs-12 col-sm-7 hidden-text panel-title-desc">
                            {{ $solution->translate(Session::get('locale'))->desc }}
                        </p>
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