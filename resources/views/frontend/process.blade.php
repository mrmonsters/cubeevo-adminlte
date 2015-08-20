@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid process">
    @if (isset($content) && isset($content->content))
        <?php echo html_entity_decode($content->content); ?>
    @endif
</div> 
@endsection