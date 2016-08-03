@extends('partials.frontend.app')

@section('frontend-content')

    <div class="container-fluid">
        <div class="row">
            @if (isset($categories) && !$categories->isEmpty())
                <?php $counter = 0;?>
                @foreach ($categories as $category)
                    <?php
                            switch ($counter){
                                case '1':
                                    $bg_color = '#E50575';
                                    break;
                                case '2':
                                    $bg_color = '#1D924B';
                                    break;
                                case '3':
                                    $bg_color = '#B63E97';
                                    break;
                                case '4':
                                    $bg_color = '#DC1921';
                                    break;
                                case '5':
                                    $bg_color = '#0361B8';
                                    break;
                                case '6':
                                    $bg_color = '#FA9C2A';
                                    break;
                                case '7':
                                    $bg_color = '#EAEFF3';
                                    break;
                                case '8':
                                    $bg_color = '#4B7FBB';
                                    break;
                                default:
                                    $bg_color = '#C5C4C4';
                                    break;
                            }
                        ?>

                    <div class="col-sm-4 panelHeight-3"
                         style="background: <?php echo $bg_color;?> url('{{$category->backgroundImage->dir}}');background-repeat: no-repeat;background-size:cover;background-position:center center;">
                        <div class="panelBody vcenter">
                            <div class="greybox"
                                 onClick="location.href='{{ url('credential/' . $category->slug) }}';"></div>
                            <p class="text-center text-white panel-title">
                                {{ $category->translate(Session::get('locale'))->name }}
                            </p>

                            <div class="visible-xs-block visible-sm-block visible-md-block">
                                <div class="threedot js-showtitle-2">
                                    <i class="icon-btn-link icon-btn-link-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="col-sm-4 panelHeight-3 active">
                <div class="panelBody" style="background-color: #404b54">
                    <div class="" style="position: absolute;bottom: 5px;left: 20px;">
                        @if(Session::get('locale') == 'en')
                            <h4 class="text-white">We have proven our worthiness.<br/>Work with us.<br/>Together we shall create masterpieces.</h4>
                            <p class="text-white" style="padding:0px 0px 10px 0px;display:block;">Please Contact</p>
                        @else
                            <h4 class="text-white">希望这些作品能提高您对我们的信心<br/>更多的精彩作品，只待您跟我们一同完成，<br/>欢迎前来咨询</h4>
                            <p class="text-white" style="padding:0px 0px 10px 0px;display:block;">请联络</p>
                        @endif
                        <ul class="list-unstyled list-with-icon">
                            <li><i class="icon phone phone-white"></i><a href="tel:+60390109882" class="text-orange" style="padding-left:25px;">+603 9010 9882</a></li>
                            <li><i class="icon mail mail-white"></i><a href="mailto:enquire@cubeevo.com" class="text-orange" style="padding-left:25px;">enquire@cubeevo.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

