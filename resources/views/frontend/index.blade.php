@extends('partials.frontend.app')

@section('frontend-content') 
@if (isset($page))
<?php echo html_entity_decode($page->translate(Session::get('locale'))->content); ?>
@endif
@if($page->slug == '/')
@include('partials.frontend.navi')
@endif
@endsection