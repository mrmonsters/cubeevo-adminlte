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
            <h4 class="leftcontent_topheading">{{ (Session::get('locale') == 'en') ? 'Ever Evolving CUBEevo' : '创意从未歇息的形立方' }}<span class="bottom-line-grey"></span></h4>
            <h1 class="h2 leftcontent_heading mobile-h1">{!!  (Session::get('locale') == 'en') ? 'An Advertising Agency <br/> in Malaysia and Singapore.' : '一家横跨马来西亚与新加坡两地的广告公司。' !!}</h1>
            <div class="leftcontent_desc">
                <p>{{ (Session::get('locale') == 'en') ? 'Ready to transform your brand with infinite possibilities by our transformed Thinking Caps.' : '务求为您打造无限商机的品牌形象。' }}</p>
                <div class="col-xs-2 col-sm-12 nopadding">
                    <a class="visible-xs" data-target="#homevideo" data-toggle="modal">
                        <img src="{{asset('/img/Rocket_Mobile.gif')}}" width="120" style="border:1px solid #000;"/>
                    </a>
                    <a class="hidden-xs" data-target="#homevideo" data-toggle="modal" onclick=""
                       style="z-index:999;display:block;padding-top:15px;padding-bottom: 9px;cursor: pointer;" target="_blank">
                        <img src="{{asset('/img/Rocket_Tablet_Desktop.gif')}}" width="86%" title="Click to Watch Video" style="border:1px solid #000;max-width: 450px"/>
                    </a>
                </div>
            </div>
        </div>

        @foreach($projects as $index => $project)
            <div class="hidden-section-{{ $index + 2 }}">
                <a href="{{url('/credential/project/'.$project->slug)}}">
                    <div class="leftcontent_client">
                        <p class="text-white">{!!  (Session::get('locale') == 'en') ? 'Client' : '客户' !!}<span class="bottom-line"></span></p>
                        <h4 class="leftcontent_client_name text-white">{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}</h4>
                    </div>
                    <h1 class="h2 leftcontent_heading text-white mobile-h1">{{(\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name}}</h1>
                    <div class="leftcontent_desc text-white">
                        <p class="hidden-xs">{{mb_substr($project->translate(\Session::get("locale"))->background,0,$char_count)}}
                            ...</p>
                        <p class="text-white"><i
                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                    class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p>
                    </div>
                </a>
            </div>
        @endforeach

        @if ($posts->count() > 0)
            <div class="hidden-section-6">
                <a href="{{url('/insights/detail/'.$posts[0]->slug)}}">
                    <div class="leftcontent_desc">
                        <?php
                        $content = html_entity_decode($posts[0]->translate(Session::get('locale'))->description);
                        $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                        ?>
                        <h2 class="text-white mobile-h1 text-uppercase">{{$posts[0]->translate(Session::get('locale'))->title}}</h2>
                        <p class="text-white hidden-xs">{{mb_substr($content,0,$char_count)}}</p>
                        <p class="text-white"><i
                                    class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                    class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}</span></p>
                    </div>
                </a>
            </div>
        @endif

        <div class="hidden-section-7">
            <h1 class="h2 leftcontent_heading mobile-h1">{!!  (Session::get('locale') == 'en') ? 'LET\'S GET STARTED !' : '就是现在！' !!}</h1>
            <div class="leftcontent_desc">
                <p>{!!  (Session::get('locale') == 'en') ? 'There are infinite possibilities that you can transform <br class="visible-lg"/>your brands. We have
                    our Thinking Caps to help you.' : '眼下各个企业用着各类方案打造品牌，我们非常乐意凭着别树一格的思路创意助你一臂之力。' !!}</p>
                <p>{!!  (Session::get('locale') == 'en') ? 'So, are you ready to transform?' : '您是否愿意踏上这条转变之路？' !!}</p>
                <br/>
                <p class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'Having Doubts?' : '还在顾虑？' !!}</p>
                <a href="{{url('/credential')}}" class="hidden-xs" style="width: 200px; height: 49px; overflow: hidden; display: block;">
                    @if (Session::get('locale') == 'cn')
                        <i class="icon-button icon-button-cn"></i>
                        @else
                        <i class="icon-button"></i>
                    @endif
                </a>
                <p class="hidden-xs">{!!  (Session::get('locale') == 'en') ? 'That way you can put all your doubts to rest and <br class="visible-lg"/>let us
                    help you transform.' : '你肯定会放下心里最后一块石头。' !!}</p>
            </div>
        </div>
    </div>

    <div ng-controller="HomepageCtrl" class="home newlanding" style="height: 100%;">
        <div class="wrapper wrapper__home wrapper__home-left col-xs-6">
            <div class="content-wrapper no-margin">
                <div class="insight-bg"></div>
                <div class="col-xs-12 col-sm-12 col-md-push-5 col-md-7 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }} moveOut">
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions" class="home__background" style="height: 100%;">
            <div class="section moveOut" id="section0" style="background-image: none;height: 100%;">
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
