@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid sol">
    @if (isset($solutions) && is_array($solutions) && !empty($solutions))
        <?php $count = 0; ?>
        @foreach ($solutions as $solution)
            <?php $count++; ?>
            @if ($count % 3 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <div class="col-sm-4" style="background: {{ $solution['bg_color_code'] }} url('..{{ Files::find($solution['bg_img_id'])->dir }}'); background-position: right;">
                <div class="contbox"> 
                    <div class="greybox"></div>
                    <ul class="scene">
                        <li class="layer" data-depth="0.50"><img src="{{ Files::find($solution['img_id'])->dir }}" width="100%"/></li>
                    </ul> 
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
                <?php echo '</div>'; ?>
            @endif
        @endforeach
    @endif 
</div> 
@endsection