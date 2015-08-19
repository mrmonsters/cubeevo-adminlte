@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid aboutus">
    @if (isset($page) && isset($page->page_content))
        <?php echo html_entity_decode($page->page_content); ?>
    @endif
</div>
@endsection