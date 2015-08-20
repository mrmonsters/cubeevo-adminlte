@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid cre">
    @if (isset($categories) && !$categories->isEmpty())
        <?php $count = 0; ?>
        @foreach ($categories as $category)
            <?php $count++; ?>
            @if ($count % 3 == 1)
                <?php echo '<div class="row">'; ?>
            @endif
            <div class="col-sm-4 cre-{{ $count }}" onClick="location.href='credential_content.html';">
                <div class="contbox">
                    <div class="greybox"></div>
                    <ul class="scene">
                        <li class="layer" data-depth="0.30"><img src="{{ ($img = $category->image()->first()) ? $img->dir : '' }}" width="100%"/></li>
                    </ul> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $category->name }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 3 == 0) || ($count == $categories->count()))
                <?php echo '</div>'; ?>
            @endif
        @endforeach
    @endif
</div> 
@endsection