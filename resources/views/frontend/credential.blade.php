@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid cre">
    @if (isset($categories) && is_array($categories) && !empty($categories))
        <?php $count = 0; ?>
        @foreach ($categories as $category)
            <?php $count++; ?>
            @if ($count % 3 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <div class="col-sm-4" onClick="location.href='credential_content.html';" style="background: <?php echo ($category['bg_img_id'] != '') ? "url('.." . Files::find($category['bg_img_id'])->dir . "');" : "#666; min-height: 281px;" ?>">
                <div class="contbox">
                    <div class="greybox"></div>
                    <ul class="scene">
                        <li class="layer" data-depth="0.30">
                            @if ($category['img_id'] != '')
                            <img src="{{ Files::find($category['img_id'])->dir }}" width="100%"/>
                            @endif
                        </li>
                    </ul> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $category['name'] }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 3 == 0) || ($count == count($categories)))
                <?php echo '</div>'; ?>
            @endif
        @endforeach
    @endif
</div> 
@endsection