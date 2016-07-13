@extends('partials.frontend.app')

@section('frontend-content')
    <div aria-labelledby="myModalLabel" class="modal fade" id="homevideo" role="dialog" tabindex="-1">
        <div class="modal-dialog homevideo" role="document">
            <div class="modal-content">
                <div class="modal-header"><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button></div>

                <div class="modal-body"><iframe frameborder="0" height="450px" src="http://www.youtube.com/embed/SwwXrNGZE2Q" width="800px"></iframe></div>
            </div>
        </div>
    </div>

    <div class="hide">

        <div class="hidden-section-1">
            <h4 class="leftcontent_topheading">Ever Evolving CUBEevo<span class="bottom-line-grey"></span></h4>
            <h1 class="h2 leftcontent_heading">An Advertising Agency <br/> in Malaysia and Singapore.</h1>
            <div class="leftcontent_desc">
                <p>Ready to transform your brand with infinite possibilities by our transformed Thinking Caps.</p>
                <div class="col-xs-2 col-sm-12 nopadding">
                    <a class="visible-xs" data-target="#homevideo" data-toggle="modal"><i class="icon-video-play-link"></i></a>
                    <a class="hidden-xs" data-target="#homevideo" data-toggle="modal" onclick="" style="z-index:999;display:block;padding-top:15px;padding-bottom: 9px;" target="_blank">
                        <i class="icon-video"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php $counter = 2;?>
        @foreach($projects as $project)
        <div class="hidden-section-{{$counter}}">
            <div class="leftcontent_client">
                <p class="text-white">Client<span class="bottom-line"></span></p>
                <h4 class="leftcontent_client_name text-white">{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}</h4>
            </div>
            <h1 class="h2 leftcontent_heading text-white">{{(\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name}}</h1>
            <div class="leftcontent_desc text-white">
                <p>Ready to transform your brand with infinite possibilities by our transformed Thinking Caps.</p>
                <p class="text-white"><i
                            class="icon-btn-link text-white"></i> <span
                            class="hidden-xs">See More</span></p>
            </div>
        </div>
            <?php $counter++;?>
        @endforeach

        <div class="hidden-section-4">
            <div class="leftcontent_desc">
                <?php
                $content = html_entity_decode($posts[0]->translate(Session::get('locale'))->description);
                $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                ?>
                <h2 class="text-white">{{$posts[0]->translate(Session::get('locale'))->title}}</h2>
                <p class="text-white">{{mb_substr($content,0,$char_count)}}</p>
                <p class="text-white"><i
                            class="icon-btn-link text-white"></i> <span
                            class="hidden-xs">See More</span></p>
            </div>
        </div>

        <div class="hidden-section-5">
            <h1 class="h2 leftcontent_heading">LET'S GET STARTED</h1>
            <div class="leftcontent_desc">
                <p>There are infinite possibilities that you can transform <br class="visible-lg"/>your brands.We have our Thinking Caps to help you.</p>
                <p>So, are you ready to transform?</p>
                <br/>
                <p>Having Doubts?</p>
                <a href="{{url('/credential')}}">
                    <img src="{{asset('img/Programmer Needs-24.svg')}}" class="homepage-contact-us-cta" style="position: relative;left: -4px;top:-9px">
                </a>
                <p>That way you can put all your doubts to rest and <br class="visible-lg"/>let us help you transform.</p>
            </div>
        </div>
    </div>

    <div ng-controller="HomepageCtrl" class="home newlanding">
        <div class="wrapper wrapper__home wrapper__home-left col-xs-6">
            <div class="content-wrapper no-margin">
                <div class="insight-bg"></div>
                <div class="col-xs-10 col-sm-push-3 col-sm-8 col-md-push-5 col-md-7 left-content">
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