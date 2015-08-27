@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid cre">
    @if (isset($projects) && is_array($projects) && !empty($projects))
        <?php $count = 0; ?>
        <?php echo '<div class="row">'; ?>
        @foreach ($projects as $project)
            <?php $count++; ?>
            @if ($count % 2 == 1) 
            @endif
            <div id='cre-box__{{$count}}' class="js-three-d cre-box col-sm-6 col-lg-4" onClick="location.href='{{ url('credential/project/' . $project['id']) }}';" style="background: <?php echo ($project['grid_bg_img_id'] != '') ? "url('.." . Files::find($project['grid_bg_img_id'])->dir . "') no-repeat; background-size: cover;" : "#666; min-height: 281px;" ?>">
                <div class="contbox">
                    <div class="greybox"></div>
                    <div class="cd-background-wrapper">
                        <figure class="cd-floating-background">
                            @if ($project['grid_img_id'] != '')
                            <img src="{{ Files::find($project['grid_img_id'])->dir }}" width="100%"/>
                            @endif
                        </figure>
                    </div> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $project['name'] }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 2 == 0) || ($count == count($projects))) 
            @endif
        @endforeach
        <?php echo '</div>'; ?>
    @endif
</div> 
@endsection