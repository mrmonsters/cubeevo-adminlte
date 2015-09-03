<?php

$videoUrl = $block->value;
$segments = explode("/", $videoUrl);
$value    = end($segments);

?>

<div class="row">
    <div class="col-xs-12 nopadding">
	    <div class="videoWrapper">
	    	<!--
	        <iframe id="video" src="https://player.vimeo.com/video/50600924" frameborder="0"></iframe>
	        -->
	        <iframe id="video" src="https://player.vimeo.com/video/{{ $value }}" frameborder="0"></iframe>
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
.videoWrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>