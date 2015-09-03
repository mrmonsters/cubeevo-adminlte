@extends('partials.frontend.app')

@section('frontend-content')
<div class="container-fluid cre">
    @if (isset($projects) && !$projects->isEmpty())
        <?php $count = 0; ?>
        <?php echo '<div class="row">'; ?>
        @foreach ($projects as $project)
            <?php $count++; ?>
            @if ($count % 2 == 1) 
            @endif
            <div id='cre-box__{{$count}}' class="js-three-d cre-box col-sm-6 col-lg-4" onClick="location.href='{{ url('credential/project/' . $project->slug) }}';" style="background: {{ ($dir = $project->backgroundImage->dir) ? 'url(\'..'.$dir.'\') no-repeat; background-size: cover;' : '#666; min-height: 281px;' }}">
                <div class="contbox">
                    <div class="greybox"></div>
                    <div class="cd-background-wrapper">
                        <figure class="cd-floating-background">
                            @if ($dir = $project->frontImage->dir)
                            <img src="{{ $dir }}" width="100%"/>
                            @endif
                        </figure>
                    </div> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $project->translate(Session::get('locale'))->client_name }}
                        </p>
                    </div>  
                </div>
            </div>
            @if (($count % 2 == 0) || ($count == $projects->count())) 
            @endif
        @endforeach
        <?php echo '</div>'; ?>
    @endif
</div> 
@endsection