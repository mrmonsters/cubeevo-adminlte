@extends('partials.frontend.app')

@section('frontend-content')

    <?php
    $content = html_entity_decode($posts[0]->translate(Session::get('locale'))->description);
    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
    ?>
    <style>
        .post_0_background{
            background : url('{{$posts[0]->coverImage->dir}}') !important;
            background-size: cover !important;
            height: 100% !important;
            width: 100% !important;
            position: relative !important;
            background-position: center center !important;
        overflow: hidden;} ;
    </style>
    <div ng-controller="HomepageCtrl" class="home">
        <div class="wrapper wrapper__home wrapper__home-left col-xs-12 col-md-6 col-sm-6">
            <div class="content-wrapper no-margin">
                <div class="col-md-push-5 col-md-6 col-xs-11 col-sm-push-5 col-sm-6 left-content">
                    <div class="js-left-content hide @{{ leftcontentFontColor }} moveOut" >
                        <h4 class="leftcontent_topheading">Ever Evolving CUBEevo @{{ leftcontentbackgroundImage }}</h4><br/>
                        <div class="leftcontent_client"><p class="text-white">Client</p><h4 class="leftcontent_client_name text-white"></h4></div><br/>
                        <h1 class="h2 leftcontent_heading"></h1>
                        <p class="leftcontent_desc">Ready to transform your brand with infinite posibilities <br/>by our transformed
                            Thinking Caps.</p>
                    </div>
                </div>
            </div>
        </div>
        <div full-page options="mainOptions" class="home__background">
            <div class="section moveOut" id="section0">
            </div>
            <?php $counter = 1;?>
            @foreach($projects as $project)
                <style>
                    .leftcontentbackgroundImage_<?php echo $counter;?>{background:{{$project->pri_color_code}} !important;}
                </style>
                <div class="section" style="background: url('{{$project->brandImage->dir}}') no-repeat center center;
                        background-size: cover;background-position: center center;"
                     ng-init="projects.push(
                     {'label':'{{ (\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name }}',
                      'client_name': '{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}',});post.push({'label':'{{{$posts[0]->translate(\Session::get('locale'))->title}}}','desc':'{{mb_substr($content,0,$char_count)}}'}); ">
                </div>
                <?php $counter++;?>
            @endforeach
            <div class="section moveOut" id="section3">
                <div class="col-sm-6 col-sm-push-6 wrapper__right">
                    <div class="wrapper">
                        <div class="row content-wrapper-layer content-wrapper-first-layer">
                            <div class="content-wrapper"
                                 style="background-image : url('{{$posts[1]->coverImage->dir}}')">
                                <div class="col-xs-12 col-md-7 content-wrapper__content">
                                    <?php
                                    $content = html_entity_decode($posts[1]->translate(Session::get('locale'))->description);
                                    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                                    ?>
                                    <h2>{{$posts[1]->translate(Session::get('locale'))->title}}</h2>
                                    <p>{{mb_substr($content,0,$char_count)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row content-wrapper-layer content-wrapper-second-layer">
                            <div class="content-wrapper"
                                 style="background-image: url('{{$posts[2]->coverImage->dir}}')">
                                <div class="col-xs-12 col-md-7 content-wrapper__content">
                                    <?php
                                    $content = html_entity_decode($posts[2]->translate(Session::get('locale'))->description);
                                    $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                                    ?>
                                    <h2>{{$posts[2]->translate(Session::get('locale'))->title}}</h2>
                                    <p>{{mb_substr($content,0,$char_count)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section moveOut" id="section5">
            </div>
        </div>
    </div>

@endsection