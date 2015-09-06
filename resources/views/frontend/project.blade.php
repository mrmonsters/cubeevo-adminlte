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
                             <ul class="scene">
                                <li class="layer" data-depth="0.30"><img src="{{ $dir }}" width="100%"/></li>
                            </ul>
                            @endif
                        </figure>
                    </div> 
                    <div class="row panel-body overlap">
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $project->translate(Session::get('locale'))->client_name }}
                        </p>
                        <div class="col-xs-12 visible-xs-block" style="padding:6px;">
                            <div class="threedot"><i class="icon-btn-link"></i></div>
                        </div>
                     </div>
                </div>
            </div>
            @if (($count % 2 == 0) || ($count == $projects->count())) 
            @endif
        @endforeach   
        @if($count < 9)

            <?php
            $leftoutclass = 3 - ($count % 3) ;
            switch ($leftoutclass) {
                case '1':
                    # code...
                    $class = 'hidden-sm hidden-md col-sm-6 col-lg-4';
                    break;

                case '2':
                    # code...
                    $class = 'col-sm-6 col-lg-4';
                    break; 


                case '3':
                    # code...
                    $class = 'col-sm-6 hidden-md hidden-sm col-lg-4';
                    break; 

                default:
                    $class = '';
                    break;
            } 
            $totalmissingbox = 9 - $count; ?>
            @for($i= 1 ;$i <= $totalmissingbox; $i++)

            <div id='cre-box' class="extra-info-box cre-box hidden-xs 
                @if($i % 2 != 0)
                    odd
                @else
                    even
                @endif  {{$class}}"> 
            
            </div>
            @endfor
        @endif
        <?php echo '</div>'; ?>
    @endif
</div> 
@endsection