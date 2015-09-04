<?php
use App\Models\Files;

$imgIds = explode(",", $block->value);
?>
<div class="row">
    <div class="col-xs-12 nopadding">
        <div class="slick-carousel"> 
            <?php $count = 0; ?>
            @foreach ($imgIds as $id)
            <div class="item {{ ($count++ == 0) ? 'active' : '' }}" style="max-height: 980px;">
                <img src="{{ Files::find($id)->dir }}" alt="{{ Files::find($id)->name }}" width="100%">
            </div>
            @endforeach
        </div> 
    </div>
</div>