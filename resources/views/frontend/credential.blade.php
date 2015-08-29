@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid cre">
    @if (isset($categories) && !$categories->isEmpty())
        <?php $count = 0; ?>
        <?php echo '<div class="row">'; ?>
        @foreach ($categories as $category)
            <?php $count++; ?>
            @if ($count % 3 == 1) 
            @endif
            <div id='cre-box__{{$count}}' class="js-three-d cre-box col-sm-6 col-lg-4" onClick="location.href='{{ url('credential/' . $category->id) }}';" style="background: {{ ($dir = $category->backgroundImage->dir) ? 'url(\'..'.$dir.'\'); background-repeat: no-repeat;' : '#666; min-height: 281px;' }}">
                <div class="contbox">
                    <div class="greybox"></div> 

                    <div class="cd-background-wrapper">
                        <figure class="cd-floating-background">
                            @if ($dir = $category->frontImage->dir)
                            <img src="{{ $dir }}" width="100%"/>
                            @endif
                        </figure>
                    </div> 

                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $category->name }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 3 == 0) || ($count == $categories->count())) 
            @endif
        @endforeach
        <?php echo '</div>'; ?>
    @endif
</div> 
@endsection