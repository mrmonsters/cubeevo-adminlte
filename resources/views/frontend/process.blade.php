@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid process">
    @if (isset($page) && isset($page->page_content))
        <?php echo html_entity_decode($page->page_content); ?>
    @endif
</div> 
@endsection