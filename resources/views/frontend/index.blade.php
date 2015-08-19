@extends('partials.frontend.app')

@section('frontend-content') 
<div id="fullpage">
    @if (isset($sections) && is_array($sections) && !empty($sections))
	    @foreach ($sections as $section)
	    	<?php echo html_entity_decode($section->section_content); ?>
	    @endforeach
    @endif
</div>   

@include('partials.frontend.navi')

@endsection