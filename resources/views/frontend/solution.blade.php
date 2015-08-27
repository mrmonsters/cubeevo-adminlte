@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid sol">
    @if (isset($solutions) && is_array($solutions) && !empty($solutions))
        <?php $count = 0; ?>
                <?php echo '<div class="row">'; ?>
        @foreach ($solutions as $solution)
            <?php $count++; ?>
            @if ($count % 3 == 1) 
            @endif 
            <div id='cre-box__{{$count}}' class="js-three-d sol-box col-sm-6 col-lg-4" style="background: {{ $solution['pri_bg_color_code'] }} url('..{{ Files::find($solution['grid_bg_img_id'])->dir }}'); background-position: right;">
                <div class="contbox"> 
                    <div class="greybox"></div> 

                    <div class="cd-background-wrapper">
                        <figure class="cd-floating-background"> 
                            <img src="{{ Files::find($solution['grid_img_id'])->dir }}" width="100%"/>
                        </figure>
                    </div> 

                    <div class="row panel-body overlap">
                        <p class="col-sm-4 panel-title">
                            {{ $solution['name'] }}
                        </p>
                        <p class="col-sm-8 hidden-text panel-title-desc">
                            {{ $solution['desc'] }}
                        </p>
                    </div> 
                </div>
            </div>
            @if (($count % 3 == 0) || ($count == count($solutions))) 
            @endif
        @endforeach
                <?php echo '</div>'; ?>
    @endif 
</div> 
@endsection