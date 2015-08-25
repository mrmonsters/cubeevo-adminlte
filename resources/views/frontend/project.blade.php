@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid cre">
    @if (isset($projects) && is_array($projects) && !empty($projects))
        <?php $count = 0; ?>
        @foreach ($projects as $project)
            <?php $count++; ?>
            @if ($count % 2 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <div class="col-sm-6" onClick="location.href='credential_content.html';" style="background: <?php echo ($project['bg_img_id'] != '') ? "url('.." . Files::find($project['bg_img_id'])->dir . "') no-repeat; background-size: cover;" : "#666; min-height: 281px;" ?>">
                <div class="contbox">
                    <div class="greybox"></div>
                    <ul class="scene">
                        <li class="layer" data-depth="0.30">
                        @if ($project['img_id'] != '')
                            <img src="{{ Files::find($project['img_id'])->dir }}" width="100%"/>
                        @endif
                        </li>
                    </ul>
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $project['name'] }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 2 == 0) || ($count == count($projects)))
                <?php echo '</div>'; ?>
            @endif
        @endforeach
    @endif
</div> 
@endsection