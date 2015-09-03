<?php 
use App\Models\Files;

$imgIds = explode(",", $block->value);
?>
<div class="row"> 
    <div class="col-xs-12 nopadding">
        <img src="{{ Files::find($imgIds[0])->dir }}" width="100%">
    </div>
</div>