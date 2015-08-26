@extends('partials.frontend.app')

@section('frontend-content')
<?php use App\Models\Files; ?>
<div class="container-fluid cre">
    @if (isset($categories) && is_array($categories) && !empty($categories))
        <?php $count = 0; ?>
                <?php echo '<div class="row">'; ?>
        @foreach ($categories as $category)
            <?php $count++; ?>
            @if ($count % 3 == 1) 
            @endif
            <div class="cre-box col-sm-6 col-lg-4" onClick="location.href='{{ url('credential/' . $category['id']) }}';" style="background: <?php echo ($category['bg_img_id'] != '') ? "url('.." . Files::find($category['bg_img_id'])->dir . "');" : "#666; min-height: 281px;" ?>">
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
            @endif
        @endforeach
                <?php echo '</div>'; ?>
    @endif
</div> 
@endsection