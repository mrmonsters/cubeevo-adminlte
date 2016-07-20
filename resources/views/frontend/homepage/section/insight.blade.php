@if ($posts->count() >= 3)
    <style>
        .post_0_background {
            background: url('{{$posts[0]->coverImage->dir}}') !important;
        };
    </style>

    <div class="col-xs-6 col-xs-push-6 wrapper__right">
        <div class="wrapper">
            <div class="row content-wrapper-layer content-wrapper-first-layer">
                <a href="{{url('insights/detail/'.$posts[1]->slug)}}">
                    <div class="content-wrapper"
                         style="background-image : url('{{$posts[1]->coverImage->dir}}')">
                        <div class="insight-bg insight-bg-2"></div>
                        <div class="col-xs-11 col-md-7 content-wrapper__content text-white">
                            <?php
                            $content = html_entity_decode($posts[1]->translate(Session::get('locale'))->description);
                            $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                            ?>
                            <h2 class=" mobile-h1">{{$posts[1]->translate(Session::get('locale'))->title}}</h2>
                            <p class="hidden-xs">{{mb_substr($content,0,$char_count)}}</p>
                            <p class="text-white"><i
                                            class="icon-btn-link icon-btn-link-purewhite text-white"></i> <span
                                            class="hidden-xs">See More</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row content-wrapper-layer content-wrapper-second-layer">
                <a href="{{url('insights/detail/'.$posts[2]->slug)}}">
                    <div class="content-wrapper"
                         style="background-image: url('{{$posts[2]->coverImage->dir}}')">
                        <div class="insight-bg insight-bg-3"></div>
                        <div class="col-xs-11 col-md-7 content-wrapper__content text-black">
                            <?php
                            $content = html_entity_decode($posts[2]->translate(Session::get('locale'))->description);
                            $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content)));
                            ?>
                            <h2 class=" mobile-h1">{{$posts[2]->translate(Session::get('locale'))->title}}</h2>
                            <p class=" hidden-xs">{{mb_substr($content,0,$char_count)}}</p>

                                <p class="text-black"><i
                                            class="icon-btn-link text-white"></i> <span
                                            class="hidden-xs">See More</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif