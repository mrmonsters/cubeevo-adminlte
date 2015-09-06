<?php

use App\Models\Files;

$file = Files::find($block->value);

?>

<div class="row">
    <div class="col-xs-12 nopadding">
	    <div class="videoWrapper">
            <video id="video" controls>
                <source src="{{ (isset($file)) ? $file->dir : '' }}" type="{{ (isset($file)) ? $file->type : '' }}">
            </video>
	    </div>
	</div>
</div>

<style>
.videoWrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    padding-top: 25px;
    height: 0;
}
.videoWrapper video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>