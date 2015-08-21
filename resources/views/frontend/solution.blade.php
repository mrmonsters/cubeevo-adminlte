@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid sol">
    @if (isset($solutions) && !$solutions->isEmpty())
        <?php $count = 0; ?>
        @foreach ($solutions as $solution)
            <?php $count++; ?>
            @if ($count % 3 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <div class="col-sm-4" style="background: {{ $solution->bg_color_code }} url('..{{ ($img = $solution->bgImage()->first()) ? $img->dir : '' }}'); background-position: right;">
                <div class="contbox"> 
                    <div class="greybox"></div>
                    <ul class="scene">
                        <li class="layer" data-depth="0.50"><img src="{{ ($img = $solution->image()->first()) ? $img->dir : '' }}" width="100%"/></li>
                    </ul> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-4 panel-title">
                            {{ $solution->title }}
                        </p>
                        <p class="col-sm-8 hidden-text panel-title-desc">
                            {{ $solution->desc }}
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