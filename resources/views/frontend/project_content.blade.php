@extends('partials.frontend.app')
<?php use App\Models\Block;
list($r, $g, $b) = sscanf($project->pri_color_code, "#%02x%02x%02x");?>

@section('frontend-content')
    <style>
        .btn-back {
            background-color: {{ $project->pri_color_code }};
        }

        .box-content {
            color: {{ $project->txt_color_code }};
        }

        .box-content a {
            color: {{ $project->txt_color_code }};
        }

        .arrow-bar-1, .arrow-bar-2 {
            background-color: #fff;
        }

        .container-fluid.credential {
            background-color: {{ $project->pri_color_code }}

        }

        .slick-prev-wrapper.slick-arrow {
            background-color: {{ $project->pri_color_code }};
        }

        .slick-next-wrapper.slick-arrow {
            background-color: {{ $project->pri_color_code }};
        }

        .back-to-top {
            z-index: 50;
            width: 44px;
            height: 45px;
            background-color: {{ $project->pri_color_code }};
            padding: 13px 10px;
            cursor: pointer;
        }

        .play-button-wrapper {
            background-color: {{ $project->pri_color_code }};
        }

        .video-btn {
            background-color: rgba({{$r}},{{$g}},{{$b}}, 0.7);
        }

        .project-block-content > .row > .col-xs-12 {
            background-color: {{ $project->pri_color_code }};
        }
    </style>
    <div class="container-fluid credential">
        <div class="row">
            <div class="col-sm-12 nopadding brandImage"
                 style="background-image:url('{{ ($project->brand_img_id) ? $project->brandImage->dir : '' }}');">
            </div>
            <div class="col-sm-12 cre-info" style="background-color:{{ $project->sec_color_code }}">
                <div class="box">
                    <div class="js-back-to-top back-to-top smart-object">
                        <div class="arrow-top arrow">
                            <div class="arrow-bar-1 smart-transition"></div>
                            <div class="arrow-bar-2 smart-transition"></div>
                            <div style="position:relative;top:5px;" class="arrow-bar-1 smart-transition"></div>
                            <div style="position:relative;top:5px;" class="arrow-bar-2 smart-transition"></div>
                        </div>
                    </div>
                    <div class="box-bg"></div>
                    <div class="box-content" style="background-color:{{ $project->pri_color_code }}">
                        <div class="row">
                            <div class="col-sm-9 col-sm-9 col-sm-offset-2">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="desctitle project-client-name"
                                           style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'CLIENT' : '客户名称' }}</p>
                                        <p>{{ (Session::get('locale') == 'en') ? strtoupper($project->translate(Session::get('locale'))->client_name) : $project->translate(Session::get('locale'))->client_name }}</p>
                                        <br>
                                        <p class="desctitle project-year"
                                           style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'YEARS' : '合作年份' }}</p>
                                        <p>{{ $project->year }}</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p class="desctitle project-name"
                                           style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'PROJECT' : '项目名称' }}</p>
                                        <h1 style="margin-top:0px;">{{ (Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(Session::get('locale'))->name }}</h1>
                                        @if($project->translate(Session::get('locale'))->sub_heading)
                                            <h4>{{ $project->translate(Session::get('locale'))->sub_heading }}</h4>
                                        @endif

                                        <div style="padding-top:14%;">
                                            <div class="col-sm-6 crecol-1">
                                                <p class="desctitle"
                                                   style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'BACKGROUND' : '客户细节' }}</p>
                                                {{ $project->translate(Session::get('locale'))->background }}
                                                <br>
                                                <br>
                                                <br>
                                                @if($project->translate(Session::get('locale'))->challenge)
                                                <p class="desctitle"
                                                   style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE CHALLENGE' : '项目概述' }}</p>
                                                {{ $project->translate(Session::get('locale'))->challenge }}
                                                @endif
                                                @if (isset($project->web_link) && $project->web_link != '')
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <p class="desctitle"
                                                       style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'WEBSITE' : '网址' }}</p>
                                                <?php
                                                    $urlStr = $project->web_link;
                                                    $parsed = parse_url($project->web_link);
                                                if (empty($parsed['scheme'])) {
                                                    $urlStr = 'http://' . ltrim($urlStr, '/');
                                                }?>
                                                    <a href="<?php echo $urlStr;?>"
                                                       target="_blank"><?php echo preg_replace('#^https?://#', '', $project->web_link);?></a>
                                                @endif
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1 crecol-2">
                                                @if($project->translate(Session::get('locale'))->result)
                                                <p class="desctitle"
                                                   style="color:{{ $project->txt_heading_color_code }}">{{ (Session::get('locale') == 'en') ? 'THE RESULT' : '最终成果' }}</p>
                                                {{ $project->translate(Session::get('locale'))->result }}
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    @if (isset($project->mascottImage->dir))
                        <div class="cre-of1"><img src="{{ $project->mascottImage->dir }}" class="project-mascott"></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="project-block-content">
            @foreach ($project->blocks()->orderBy('sort_order')->get() as $block)
                @if ($block->type == Block::IMAGE)
                    @include('partials.frontend.image')
                @elseif ($block->type == Block::GALLERY)
                    @include('partials.frontend.carousel')
                @elseif ($block->type == Block::VIDEO)
                    @include('partials.frontend.video')
                @endif
            @endforeach
        </div>
    </div>

    <div class="text-center" style="background-color: #EFEFEF;padding: 50px 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h2 style="margin-top: ">Let's Get Started !</h2>
                    <p>Have a Project like this one and would like to discuss more?</p>
                    <div><a href="{{url('contact-us')}}"><img src="{{ asset('/img/Programmer Needs-25.svg') }}"
                                                              width="100px"/></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid cre">
        <div class="row">
            <?php $counter = 0;?>
            @foreach ($similarProjects as $project)
                @if($counter < 2)
                <div id='cre-box__0' class="js-three-d cre-box col-sm-6 col-lg-6"
                     style="background: {{ ($project->grid_bg_img_id) ? 'url(\''.url().$project->brandImage->dir.'\') no-repeat; background-size: cover;background-position:center center;' : '#666; min-height: 281px;' }}">
                    <div class="contbox">
                        <div class="greybox"
                             onClick="location.href='{{ url('credential/project/' . $project->slug) }}';"></div>
                        <div class="cd-background-wrapper"
                             onClick="location.href='{{ url('credential/project/' . $project->slug) }}';">
                        </div>
                        <div class="row panel-body overlap"
                             onClick="location.href='{{ url('credential/project/' . $project->slug) }}';">
                            <p class="col-sm-12 hidden-text panel-title">
                                {{ $project->translate(Session::get('locale'))->client_name }}
                            </p>
                        </div>
                        <div class="row" style="position: absolute;bottom: 12%;left: 8%;z-index:1;">
                            <div class="col-xs-12 visible-xs-block visible-sm-block visible-md-block">
                                <div class="threedot js-showtitle"><i class="icon-btn-link icon-btn-link-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php $counter++;?>
                    @endif
            @endforeach
        </div>
    </div>
@endsection

@section('frontend-addon-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.video-btn').click(function () {
                var video = $(this).siblings('.video');
                if (video.get(0).play) {
                    video.get(0).play();
                    $(this).parent().siblings('.greybox').addClass('playing');
                }
                $(this).hide();
                return false;
            });

            $('.js-video').click(function () {
                if (this.pause) {
                    this.pause();
                    $(this).siblings('.video-btn').show();
                    $(this).parent().siblings('.greybox').removeClass('playing');
                }
                return false;
            });

            $('.video').on('ended', function () {
                var src = $(this).children('source').attr('src');

                $(this).parent().siblings('.greybox').removeClass('playing');
                $(this).siblings('.video-btn').show();
                $(this)[0].src = "";
                $(this)[0].load();
                $(this)[0].src = src;

                return false;
            });
        });
    </script>
@endsection