<?php

use App\Models\Files;

$file = Files::find($block->value);

?>

<div class="row">
    <div class="col-xs-12 nopadding">
	    <div class="videoWrapper">
            <video class="video js-video">
                <source src="{{ (isset($file)) ? $file->dir : '' }}" type="{{ (isset($file)) ? $file->type : '' }}">
            </video>
            <a href="#" class="smart-object video-btn">
                <div class="arrow-right arrow">
                    <div class="arrow-bar-1 smart-transition"></div>
                    <div class="arrow-bar-2 smart-transition"></div>
                </div>
            </a>
	    </div>
	</div>
</div>

<style>
.videoWrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    padding-top: 0px;
    height: 0;
}
.videoWrapper video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.video-btn {
    position: absolute;
    top: 48%;
    left: 48%;
    background-color: #267481;
    height: 45px;
    width: 45px;
}
</style>