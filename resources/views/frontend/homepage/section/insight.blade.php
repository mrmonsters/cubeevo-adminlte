@if ($posts->count() > 3 && $posts = $posts->toArray())
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

    <div class="col-xs-6 col-xs-push-6 wrapper__right" ng-init="post.push({'label':'{{{$posts[0]->translate(\Session::get('locale'))->title}}}','desc':'{{mb_substr($content,0,$char_count)}}'});">
        <div class="wrapper">
            <div class="row content-wrapper-layer content-wrapper-first-layer">
                <div class="content-wrapper"
                     style="background-image : url('{{$posts[1]->coverImage->dir}}')">
                    <div class="insight-bg insight-bg-2"></div>
                    <div class="col-xs-12 col-md-7 content-wrapper__content text-white">
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
                    <div class="insight-bg insight-bg-3"></div>
                    <div class="col-xs-12 col-md-7 content-wrapper__content text-black">
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
@endif