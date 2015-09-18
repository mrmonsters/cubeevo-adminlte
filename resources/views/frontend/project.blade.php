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
            <div id='cre-box__{{$count}}' class="js-three-d cre-box col-sm-6 col-lg-4" style="background: {{ ($project->grid_bg_img_id) ? 'url(\'..'.$project->backgroundImage->dir.'\') no-repeat; background-size: cover;' : '#666; min-height: 281px;' }}">
                <div class="contbox">
                    <div class="greybox" onClick="location.href='{{ url('credential/project/' . $project->slug) }}';" ></div>
                    <div class="cd-background-wrapper" onClick="location.href='{{ url('credential/project/' . $project->slug) }}';" >
                        <figure class="cd-floating-background">
                            @if ($project->grid_img_id)
                             <ul class="scene">
                                <li class="layer" data-depth="0.20"><img src="{{ $project->frontImage->dir }}" width="100%"/></li>
                            </ul>
                            @endif
                        </figure>
                    </div> 
                    <div class="row panel-body overlap" onClick="location.href='{{ url('credential/project/' . $project->slug) }}';" >
                        <p class="col-sm-12 hidden-text panel-title">
                            {{ $project->translate(Session::get('locale'))->client_name }}
                        </p>
                     </div> 
                    <div class="row" style="position: absolute;bottom: 12%;left: 8%;z-index:1;">
                        <div class="col-xs-12 visible-xs-block visible-sm-block visible-md-block">
                            <div class="threedot js-showtitle"><i class="icon-btn-link icon-btn-link-white"></i></div>
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
                    $class = 'col-sm-6 col-lg-4';
                    $k = 2;
                    break;

                case '2':
                    # code...
                    $class = 'col-sm-6 col-lg-4'; 
                    $k = 1;
                    break; 


                case '3':
                    # code...
                    $class = 'col-sm-6 hidden-md hidden-sm col-lg-4';
                    $k = 1;
                    break; 

                default:
                    $class = '';
                    break;
            } 
            $smleftoutclass = ($count % 2) ;
            switch ($smleftoutclass) {
                case '0':
                    # code... 
                    $k = 2;
                    break;

                case '1':
                    # code... 
                    $k = 1;
                    break;  

                default: 
                    break;
            } 
            $totalmissingbox = 9 - $count;  
            $isChanged = 0;?>
            @for($i= 1 ;$i <= $totalmissingbox; $i++)
            <?php 
            if($isChanged == 1){ 
                $current_sm_box_color = 'bg-greybox';
            }else{
                $current_sm_box_color = 'bg-lightgreybox';
            }?>
            <div id='cre-box' class="extra-info-box cre-box hidden-xs 
                @if($i % 2 != 0)
                    odd
                @else
                    even
                @endif  {{$class}} 
                @if($k % 2 ==0 && $k != 1) 
                    <?php $k = 0;
                    if($isChanged == 1){
                        $isChanged = 0;
                    }else{
                        $isChanged = 1;
                    }?>
                @endif  
                {{$current_sm_box_color}}  
                <?php $k++;?>
                "> 
            
            </div>
            @endfor
        @endif
        <?php echo '</div>'; ?>
    @endif
</div> 
@endsection