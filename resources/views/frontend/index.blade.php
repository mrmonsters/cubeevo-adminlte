@extends('partials.frontend.app')

@section('frontend-content') 
<div id="fullpage">
    @if (isset($content) && isset($content->content))
    	<?php echo html_entity_decode($content->content); ?>
    @endif
</div>   

@include('partials.frontend.navi')

@endsection