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
            <div id='cre-box__{{$count}}' class="js-three-d cre-box col-sm-6 col-lg-4" style="background: {{ ($dir = $category->backgroundImage->dir) ? 'url(\'..'.$dir.'\'); background-repeat: no-repeat;background-size:cover;' : '#666; min-height: 281px;' }}">
                <div class="contbox">
                    <div class="greybox" onClick="location.href='{{ url('credential/' . $category->slug) }}';"></div> 

                    <div class="cd-background-wrapper" onClick="location.href='{{ url('credential/' . $category->slug) }}';">
                        <figure class="cd-floating-background">
                            @if ($dir = $category->frontImage->dir) 
                            <ul class="scene">
                                <li class="layer" data-depth="0.30"><img src="{{ $dir }}" width="100%"/></li>
                            </ul>  
                            @endif
                        </figure>
                    </div> 

                    <div class="row panel-body overlap" onClick="location.href='{{ url('credential/' . $category->slug) }}';">
                        <p class="col-sm-12 hidden-text panel-title text-uppercase">
                            {{ $category->translate(Session::get('locale'))->name }}
                        </p>  
                    </div> 
                    <div class="row" style="position: absolute;bottom: 12%;left: 8%;z-index:1;">
                        <div class="col-xs-12 visible-xs-block">
                            <div class="threedot js-showtitle"><i class="icon-btn-link icon-btn-link-white"></i></div>
                        </div> 
                    </div> 
                </div>
            </div>
            @if (($count % 3 == 0) || ($count == $categories->count())) 
            @endif
        @endforeach

        @if($count % 3 != 0)
            <?php
            $leftoutclass = 3 - ($count % 3) ;
            switch ($leftoutclass) {
                case '1':
                    # code...
                    $class = 'hidden-sm col-sm-6 col-lg-4';
                    break;

                case '2':
                    # code...
                    $class = 'col-sm-6 col-lg-4 ';
                    break; 

                case '3':
                    # code...
                    $class = 'col-sm-6 hidden-sm hidden-md col-lg-8';
                    break; 

                default:
                    $class = '';
                    break;
            }
            ?>

            <div id='cre-box' class="extra-info-box cre-box hidden-xs {{$class}}">
                <div class="extra-info-box__wrapper">
                    <div class="extra-info-box__info">
                    @if(Session::get('locale') == 'en') 
                     <p class="text-white">We have proven our worthiness.<br/>Work with us.<br/>Together we shall create masterpieces.</p>
                     <small class="text-white">Please Contact</small> 
                     @else
                     <p class="text-white">希望这些作品能提高您对我们的信心<br/>更多的精彩作品，只待您跟我们一同完成，<br/>欢迎前来咨询</p>
                     <small class="text-white" style="padding:10px 0px 10px 0px;display:block;">请联络</small> 
                     @endif 
                     <ul class="list-unstyled list-with-icon">
                        <li><i class="icon phone phone-white"></i><a href="tel:+60390109882" class="text-orange" style="padding-left:30px;">+603 9010 9882</a></li>
                        <li><i class="icon mail mail-white"></i><a href="mailto:enquire@cubeevo.com" class="text-orange" style="padding-left:30px;">enquire@cubeevo.com</a></li>
                    </ul> 
                     </div>
                 </div>
            </div>
        @endif

        <?php echo '</div>'; ?>

    @endif
</div> 
@endsection