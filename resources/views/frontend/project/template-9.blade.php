@extends('partials.frontend.app')

@section('frontend-content')
    <style>
        <?php $counter = 1 ;?>
        @foreach ($projects as $project)
        .background-{{$counter}} {
            background: <?php echo ($project->brand_img_id) ? 'url("'.$project->brandImage->dir.'") no-repeat; background-size: cover;background-position:center center;' : '#666;';?>

        }
        <?php $counter++;?>
        @endforeach
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 panelHeight-3 background-1">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[0]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[0]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-2">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[1]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[1]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-3">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[2]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[2]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-4">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[3]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[3]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-5">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[4]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[4]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-6">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[5]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[5]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-7">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[6]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[6]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-8">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[7]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[7]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 panelHeight-3 background-9">
                <div class="panelBody vcenter">
                    <div class="greybox"
                         onClick="location.href='{{ url('credential/project/' . $projects[8]->slug) }}';"></div>
                    <p class="text-center text-white panel-title">
                        {{ $projects[8]->translate(Session::get('locale'))->client_name }}
                    </p>

                    <div class="visible-xs-block visible-sm-block visible-md-block">
                        <div class="threedot js-showtitle-2">
                            <i class="icon-btn-link icon-btn-link-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection