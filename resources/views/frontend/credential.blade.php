@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid cre">
    @if (isset($sections) && is_array($sections) && !empty($sections))
        <?php $count = 0; ?>
        @foreach ($sections as $section)
            <?php $count++; ?>
            @if ($count % 3 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <?php echo html_entity_decode($section->section_content); ?>
            @if (($count % 3 == 0) || ($count == count($sections)))
                <?php echo '</div>'; ?>
            @endif
        @endforeach
    @endif
</div> 
@endsection