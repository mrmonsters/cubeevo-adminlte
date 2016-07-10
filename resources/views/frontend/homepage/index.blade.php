@extends('partials.frontend.app')

@section('frontend-content')

    <div ng-controller="HomepageCtrl" class="home">
        <div class="wrapper wrapper__home wrapper__home-left col-xs-6">
            <div class="content-wrapper no-margin">
                <div class="col-xs-10 col-sm-push-3 col-sm-8 col-md-push-5 col-md-6 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }} moveOut">
                        <h4 class="leftcontent_topheading">Ever Evolving CUBEevo @{{ leftcontentbackgroundImage }}</h4>
                        <br/>
                        <div class="leftcontent_client"><p class="text-white">Client</p><h4
                                    class="leftcontent_client_name text-white"></h4></div>
                        <br/>
                        <h1 class="h2 leftcontent_heading"></h1>
                        <p class="leftcontent_desc">Ready to transform your brand with infinite posibilities <br/>by our
                            transformed
                            Thinking Caps.</p>
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions" class="home__background">
            <div class="section moveOut" id="section0" style="background-image: none;">
                <div class="col-xs-6 col-xs-push-6 wrapper__right">
                    <div class="wrapper height-full">
                        <div class="row height-full">
                            <div class="content-wrapper height-full" style="margin: 15% auto">
                                <img src="{{asset('img/Homepage_Core Services.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
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