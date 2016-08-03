@extends('partials.frontend.app')

@section('frontend-content')
    <div class="container-fluid">
        <div class="row">
            @if (isset($solutions) && !$solutions->isEmpty())
                @foreach ($solutions as $solution)
                    <div class="col-sm-4 panelHeight-3"
                         style="background: <?php echo $solution->pri_color_code ;?> url('{{$solution->backgroundImage->dir}}');background-repeat: no-repeat;background-size:cover;background-position:center center;">
                        <div class="panelBody vcenter" style="position: relative">
                            <div class="greybox"></div>
                            <div class="text-center text-white panel-title" style="padding:5% 10%;">
                                <h1 class="h4">
                                    {{ $solution->translate(Session::get('locale'))->name }}
                                </h1>
                                <p class="text-center text-white">
                                    {{ $solution->translate(Session::get('locale'))->desc}}
                                </p>
                            </div>

                            <div class="visible-xs-block visible-sm-block visible-md-block" style="position: absolute;bottom: 0px;left: 0px;z-index: 1;">
                                <div class="threedot js-showtitle-2">
                                    <i class="icon-btn-link icon-btn-link-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection