@extends('partials.frontend.app')

@section('frontend-content')
    <?php
    use App\Models\Status;
    use App\Models\Setting;

    $settings = Setting::where('status', '=', STATUS::ACTIVE)->get();
    $response = Session::get('response');
    ?>
    <div class="container-fluid contactus">
        <div class="row" style="position:relative;">
            <div class="col-sm-10 col-sm-offset-2">
                <div>
                    <h1 class="txtorange">{{ (Session::get('locale') == 'en') ? 'CONTACT US' : '联络我们' }}</h1>
                    <div class="heading-line"></div>
                    <h5><?php echo (Session::get('locale') == 'en') ? "If there's anything that you need from our service, feel free to leave us your contact and information. <br/>We can't wait to get in touch with you." : '任何服务方案需求，欢迎留下您的联系方式，我们迫不及待想与您愉快聊天！';?></h5>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @if ($response != null && !empty($response))
                    <div class="col-md-12">
                        <div class="alert alert-{{ ($response['code'] == STATUS::SUCCESS) ? 'success' : 'danger' }} alert-dismissable">
                            <i class="fa fa-{{ ($response['code'] == STATUS::SUCCESS) ? 'check' : 'ban' }}"
                               style="padding: 0 8px;"></i> <?php echo $response['msg'];?>
                        <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row" style="position:relative;">
            <form id="form-contact-us" method="POST" action="{{ url('contact-us/submit') }}"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-6">
                    <span class="icon cont-name"></span>
                    <input type="text" id="inputName" class="form-control" name="name"
                           placeholder="{{ (Session::get('locale') == 'en') ? 'NAME' : '姓名' }}" required=""
                           autofocus="">
                </div>
                <div class="col-sm-6">
                    <span class="icon cont-mail"></span>
                    <input type="email" id="inputEmail" class="form-control" name="email"
                           placeholder="{{ (Session::get('locale') == 'en') ? 'EMAIL' : '电邮' }}" required=""
                           autofocus="">
                </div>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-6">
                    <span class="icon cont-contact"></span>
                    <input type="text" id="inputNumber" class="form-control" name="phone"
                           placeholder="{{ (Session::get('locale') == 'en') ? 'CONTACT NO' : '联络号码' }}" required=""
                           autofocus="">
                </div>
                <div class="col-sm-6">
                    <span class="icon cont-title"></span>
                    <input type="text" id="inputTitle" class="form-control" name="subject"
                           placeholder="{{ (Session::get('locale') == 'en') ? 'SUBJECT' : '标题' }}" required=""
                           autofocus="">
                </div>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
                <div class="col-sm-12">
                    <label class="unhide">{{ (Session::get('locale') == 'en') ? 'MESSAGE' : '讯息' }}</label>
                    <span class="icon cont-msg" style="top:-3px;"></span>
                    <textarea name="content" required></textarea>
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 text-center">
                <br/>
                <br/>
                <button class="btn btn-sm btn-default"
                        type="submit">{{ (Session::get('locale') == 'en') ? 'SEND' : '呈交' }}</button>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
            </form>
        </div>

        <div class="row contactdetails" style="position:relative;">
            <div class="col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                <div class="col-sm-12 nopadding">
                    <small class="contactus-country-label"><b>MALAYSIA</b></small>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <h4 style="margin:0px;">
                                {{ (Session::get('locale') == 'en') ? 'CUBEevo Advertising Sdn. Bhd.' : '形立方广告有限公司' }}
                                <br class="visible-xs"/>
                                <small>(949017-T)</small>
                            </h4>
                            <h5>No 43-2, Jalan Temenggung 21/9, <br class="visible-xs"/>
                                Bandar Mahkota Cheras, <br/>43200 Batu Cheras 9 Cheras, <br class="visible-xs"/>Selangor Darul Ehsan, Malaysia
                            </h5>
                            <p>Latitude : 3<sup>o</sup>03'14.16"N , Longitude : 101<sup>o</sup>47'16.6"E</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-sm-4 showmarginleftmobile"
                                             style="margin-top: 0px;white-space: nowrap;"><i class="icon phone"></i><h5
                                                    style="padding-left: 27px;margin-top: 0px;"><a class="text-black"
                                                                                                   href="tel:{{ $settings->where('code', 'phone')->first()->value }}">{{ $settings->where('code', 'phone')->first()->value }}</a>
                                            </h5></div>
                                        <div class="col-sm-4 showmarginleftmobile"
                                             style="margin-top: 0px;white-space: nowrap;"><i class="icon fax"></i><h5
                                                    style="padding-left: 27px;margin-top: 0px;">{{ $settings->where('code', 'fax')->first()->value }}</h5>
                                        </div>
                                        <div class="col-sm-4 showmarginleftmobile" style="margin-top: 0px;"><i
                                                    class="icon mail" style="margin-top: -3px;"></i><h5
                                                    style="padding-left: 27px;margin-top: 0px;"><a class="text-black"
                                                                                                   href="mailto:{{ $settings->where('code', 'email')->first()->value }}">{{ $settings->where('code', 'email')->first()->value }}</a>
                                            </h5></div>

                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-lg-push-2">
                                    <h5 style="margin:0px;">Timothy Tai</h5>
                                    <p><i>{{ (Session::get('locale') == 'en') ? 'Account Manager' : '客户经理' }}</i><br>
                                    </p>
                                    <ul>
                                        <li><i class="icon handphone"></i><a class="text-black" href="tel:+60173216004">+6017
                                                321 6004</a></li>
                                    </ul>
                                    <br/>
                                </div>

                                <div class="col-sm-6">
                                    <h5 style="margin:0px;">Keith Phang</h5>
                                    <p><i>{{ (Session::get('locale') == 'en') ? 'Branding Manager' : '品牌经理' }}</i></p>
                                    <ul>
                                        <li><i class="icon handphone"></i><a class="text-black"
                                                                             href="tel:+6018 352 4300">+6018 352
                                                4300</a></li>
                                    </ul>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>

                <div class="col-sm-12 nopadding">
                    <small class="contactus-country-label"><b>SINGAPORE</b></small>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <h4 style="margin:0px;">
                                    {{ (Session::get('locale') == 'en') ? 'CUBEevo Advertising Pte. Ltd' : '形立方广告有限公司' }}
                                  <br class="visible-xs"/>
                                <small>(UEN - 201604341R)</small>
                            </h4>
                            <h5>20 Maxwell Rd, #09-17, Maxwell House <br/>Singapore 069113</h5>
                            <div class="row">

                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-sm-4 showmarginleftmobile"
                                             style="margin-top: 0px;white-space: nowrap;">
                                            <i class="icon phone"></i><h5 style="padding-left: 27px;margin-top: 0px;"><a
                                                        class="text-black" href="tel:+6590814118">+65 9081 4118</a></h5>
                                        </div>
                                        <div class="col-sm-4 showmarginleftmobile" style="margin-top: 0px;"><i
                                                    class="icon mail"
                                                    style="margin-top: -3px;"></i>
                                            <h5 style="padding-left: 27px;margin-top: 0px;">
                                                <a class="text-black" href="mailto:enquire@cubeevo.com">enquire@cubeevo.com</a></h5></div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-lg-push-2">
                                    <h5 style="margin:0px;">David Lim</h5>
                                    <p><i>{{ (Session::get('locale') == 'en') ? 'Account Director' : '客户总监' }}</i><br>
                                    </p>
                                    <ul>
                                        <li><i class="icon handphone"></i><a class="text-black" href="tel:+6590814118">+65
                                                9081 4118</a></li>
                                        <li class=""><i class="icon mail"></i><a class="text-black"
                                                                                 href="mailto:david@cubeevo.com">david@cubeevo
                                                .com</a></li>
                                    </ul>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row contactdetails" style="position:relative;padding:0px;">--}}
        {{--<div style="overflow:hidden;height:500px;width:100%;">--}}
        {{--<div id="map-canvas" style="height:500px;width:100%;"></div>--}}
        {{--<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>--}}
        {{--<a class="google-map-code" href="http://premium-wordpress-themes.org" id="get-map-data">premium wordpress themes</a>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>

@section('frontend-addon-script')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        $(window).load(function () {
            function initMap() {
                        @if(Session::get('locale') == 'en')
                var image = 'img/Map_Pointer.svg';
                        @elseif(Session::get('locale') == 'cn')
                var image = 'img/Map_Pointer.svg';
                        @endif
                var styles = [
                            {
                                featureType: "all",
                                elementType: "all",
                                "stylers": [
                                    {"saturation": -100},
                                    {"lightness": 14},
                                    {"gamma": 0.31}
                                ]
                            }
                        ];

                // Create a new StyledMapType object, passing it the array of styles,
                // as well as the name to be displayed on the map type control.
                var styledMap = new google.maps.StyledMapType(styles,
                        {name: "Styled Map"});

                // Create a map object, and include the MapTypeId to add
                // to the map type control.
                var mapOptions = {
                    scrollwheel: false,
                    zoom: 18,
                    center: {
                        lat: {{ $settings->where('code', 'gmaps_lat')->first()->value }},
                        lng: {{ $settings->where('code', 'gmaps_lng')->first()->value }} },
                    mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                    }
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'),
                        mapOptions);

                var beachMarker = new google.maps.Marker({
                    position: {
                        lat: {{ $settings->where('code', 'gmaps_lat')->first()->value }},
                        lng: {{ $settings->where('code', 'gmaps_lng')->first()->value }} },
                    map: map,
                    icon: image
                });


                //Associate the styled map with the MapTypeId and set it to display.
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');

            }

            initMap();
        });
    </script>
@endsection