@extends('partials.frontend.app')

@section('frontend-content')
    <div aria-labelledby="myModalLabel" class="modal fade" id="homevideo" role="dialog" tabindex="-1">

        <div class="modal-dialog homevideo" role="document">
            <div class="modal-content">
                <div class="modal-header text-right">
                    <a aria-label="Close" class="custom-close" data-dismiss="modal" type="button">
                        <img src="{{url("/img/Programmer Needs-26.svg")}}" width="50px">
                    </a>
                </div>

                <div class="modal-body">
                    <iframe allowfullscreen="" frameborder="0" height="400px"
                            src="https://www.youtube.com/embed/DWdombN1tIA" width="100%"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="hide">

        <div class="hidden-section-1">
            <h4 class="leftcontent_topheading">Ever Evolving CUBEevo<span class="bottom-line-grey"></span></h4>
            <h1 class="h2 leftcontent_heading mobile-h1">An Advertising Agency <br/> in Malaysia and Singapore.</h1>
            <div class="leftcontent_desc">
                <p>Ready to transform your brand with infinite possibilities by our transformed Thinking Caps.</p>
                <div class="col-xs-2 col-sm-12 nopadding">
                    <a class="visible-xs" data-target="#homevideo" data-toggle="modal"><i
                                class="icon-video-play-link"></i></a>
                    <a class="hidden-xs" data-target="#homevideo" data-toggle="modal" onclick=""
                       style="z-index:999;display:block;padding-top:15px;padding-bottom: 9px;" target="_blank">
                        <i class="icon-video"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php $counter = 2;?>
        @foreach($projects as $project)
            <div class="hidden-section-{{$counter}}">
                <a href="{{url('/credential/project/'.$project->slug)}}">
                    <div class="leftcontent_client">
                        <p class="text-white">Client<span class="bottom-line"></span></p>
                        <h4 class="leftcontent_client_name text-white">{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}</h4>
                    </div>
                    <h1 class="h2 leftcontent_heading text-white mobile-h1">{{(\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name}}</h1>
                    <div class="leftcontent_desc text-white">
                        <p class="hidden-xs">{{mb_substr($project->translate(\Session::get("locale"))->background,0,$char_count)}}
                            ...</p>
                        <p class="text-white"><i
                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                    class="hidden-xs">See More</span></p>
                    </div>
                </a>
            </div>
            <?php $counter++;?>
        @endforeach

        @if ($posts->count() > 0)
            <div class="hidden-section-5">
                <a href="{{url('/insights/detail/'.$posts[2]->slug)}}">
                    <div class="leftcontent_desc">
                        <?php
                        $content = html_entity_decode($posts[2]->translate(Session::get('locale'))->description);
                        $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                        ?>
                        <h2 class="text-white mobile-h1">{{$posts[2]->translate(Session::get('locale'))->title}}</h2>
                        <p class="text-white hidden-xs">{{mb_substr($content,0,$char_count)}}</p>
                        <p class="text-white"><i
                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                    class="hidden-xs">See More</span></p>
                    </div>
                </a>
            </div>
        @endif

        <div class="hidden-section-6">
            <h1 class="h2 leftcontent_heading mobile-h1">LET'S GET STARTED !</h1>
            <div class="leftcontent_desc">
                <p>There are infinite possibilities that you can transform <br class="visible-lg"/>your brands. We have
                    our Thinking Caps to help you.</p>
                <p>So, are you ready to transform?</p>
                <br/>
                <p class="hidden-xs">Having Doubts?</p>
                <a href="{{url('/credential')}}" class="hidden-xs">
                    <i class="icon-button"></i>
                </a>
                <p class="hidden-xs">That way you can put all your doubts to rest and <br class="visible-lg"/>let us
                    help you transform.</p>
            </div>
        </div>
    </div>

    <div ng-controller="HomepageCtrl" class="home newlanding">
        <div class="wrapper wrapper__home wrapper__home-left col-xs-6">
            <div class="content-wrapper no-margin">
                <div class="insight-bg"></div>
                <div class="col-xs-12 col-sm-12 col-md-push-5 col-md-7 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }} moveOut">
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions" class="home__background">
            <div class="section moveOut" id="section0" style="background-image: none;">
                @include('frontend.homepage.section.home')
            </div>

            @include('frontend.homepage.section.project')

            <div class="section moveOut" id="section3">
                @include('frontend.homepage.section.insight')
            </div>

            <div class="section moveOut" id="section5">
                @include('frontend.homepage.section.contact')
            </div>

        </div>
    </div>
@endsection