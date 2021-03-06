@extends('partials.frontend.app')

@section('frontend-content')
    <?php
    use App\Models\Status;
    use App\Models\Setting;

    $settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
    $response = Session::get('response');
    ?>
    <style type="text/css">
        .post {
            border-left: 1px solid black;
            border-top: 1px solid black;
            border-right: 1px solid black;
            padding: 20px;
            margin-bottom: 15px;
        }
    </style>
    <div class="container-fluid insight" style="min-height: 100%;">
        <div class="row" style="position:relative;">
            <div class="col-sm-10 col-sm-offset-2">
                <div>
                    <h1 class="txtorange">{{ (Session::get('locale') == 'en') ? 'INSIGHTS' : '品牌洞察' }}</h1>
                    <div class="heading-line"></div>
                    <h5>&nbsp;</h5>
                </div>
            </div>
        </div>
        <br class="hidden-xs hidden-sm"/>
        <br class="hidden-xs hidden-sm"/>
        <br class="hidden-xs hidden-sm"/>
        <br class="hidden-xs hidden-sm"/>
        <br class="hidden-xs hidden-sm"/>
        <br/>
        <br/>
        <div class="row" style="position:relative;padding:15px;">
            @foreach($posts as $post)
                <?php
                $content = html_entity_decode($post->translate(Session::get('locale'))->description);
                $content = trim(strip_tags(preg_replace("/<img[^>]+\>/i", " ", $content))); ?>
                <div class="col-sm-8 col-sm-offset-2 post">
                    <div class="row">
                        <div class="post-content col-xs-9">
                            <a href="{{url('insights/detail/'.$post->slug)}}">
                                <h4 class="txtorange nopadding">{{$post->translate(Session::get('locale'))->title}}</h4>
                                <?php $char_count = (Session::get('locale') == 'en') ? 80 : 50;?>
                                <div class="text-black"><?php echo mb_substr($content, 0, $char_count);?>...</div>
                            </a>
                        </div>
                        <div class="post-date col-xs-3 text-center" style="border-left:1px solid black">
                            <p style="padding-top:12px;"><?php echo date('F d, Y', strtotime($post->created_at));?></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection