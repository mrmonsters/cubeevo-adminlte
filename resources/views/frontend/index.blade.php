@extends('partials.frontend.app')

@section('frontend-content') 
@if (isset($page))
<?php echo html_entity_decode($page->content); ?>
@endif

@include('partials.frontend.navi')

@endsection