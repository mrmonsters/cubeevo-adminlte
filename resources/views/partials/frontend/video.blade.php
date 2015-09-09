<?php

use App\Models\Files;

$file = Files::find($block->value);

?>

<div class="row">
    <div class="col-xs-12 nopadding">
	    <div class="videoWrapper">
            <video class="video js-video" poster="{{ ($block->thumbnail_id) ? $block->thumbnail->dir : '' }}" preload="none">
                <source src="{{ (isset($file)) ? $file->dir : '' }}" type="{{ (isset($file)) ? $file->type : '' }}">
            </video> 
            <a href="#" class="smart-object video-btn">
                <div class="play-button-wrapper"> 
                        <div class="arrow-right arrow">
                            <div class="arrow-bar-1 smart-transition"></div>
                            <div class="arrow-bar-2 smart-transition"></div>
                        </div>
                </div>
            </a> 
	    </div>
	</div>
</div> 