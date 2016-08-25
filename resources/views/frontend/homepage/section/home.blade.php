<div class="col-xs-6 col-xs-push-6 wrapper__right">
    <div class="wrapper">
        <div class="row content-wrapper-layer content-wrapper-first-layer">
            <div class="col-xs-12 col-sm-8 col-sm-push-2  col-md-push-0 col-md-6 vcenter">
                <a href="{{url('/visual-branding')}}" class="service-icon text-black">
                    <img src="{{asset('/img/Programmer Needs-36.svg')}}" class="center-block core-service core-service-1" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? 'See More' : '详情' !!}{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Visual</span> Branding' : '品牌视觉形象打造' !!}</h5>
                </a>

                <a href="{{url('/thematic-campaign')}}" class="service-icon text-black visible-xs visible-sm">
                    <img src="{{asset('/img/Programmer Needs-37.svg')}}" class="center-block core-service core-service-2" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Thematic</span> Campaign<br/> <span class="hidden-xs">Design</span>' : '主题类活动设计' !!}</h5>
                </a>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-push-2  col-md-push-0  col-md-6 vcenter hidden-xs hidden-sm">
                <a href="{{url('/thematic-campaign')}}" class="service-icon text-black">
                    <img src="{{asset('/img/Programmer Needs-37.svg')}}" class="center-block core-service core-service-2" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Thematic</span> Campaign<br/> <span class="hidden-xs">Design</span>' : '主题类活动设计' !!}</h5>
                </a>
            </div>
        </div>
        <div class="row content-wrapper-layer content-wrapper-second-layer">
            <div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-push-0 col-md-6 vcenter">
                <a href="{{url('/online-digital-platform')}}" class="service-icon text-black">
                    <img src="{{asset('/img/Programmer Needs-38.svg')}}" class="center-block core-service core-service-3" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Online</span> Digital<br/> <span class="hidden-xs">Platform</span>' : '网络营销企划' !!}</h5>
                </a>
                <a href="{{url('/explainer-video-production')}}" class="service-icon text-black visible-xs visible-sm">
                    <img src="{{asset('/img/Programmer Needs-39.svg')}}" class="center-block core-service core-service-4" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Explainer</span> Video<br/> <span class="hidden-xs">Production</span>' : '简报式影片制作' !!}</h5>
                </a>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-push-0 col-md-6 vcenter hidden-xs hidden-sm">
                <a href="{{url('/explainer-video-production')}}" class="service-icon text-black">
                    <img src="{{asset('/img/Programmer Needs-39.svg')}}" class="center-block core-service core-service-4" width="100%">
                    <h5 class="core-service-heading text-center text-uppercase">{!!  (Session::get('locale') == 'en') ? '<span class="hidden-xs">Explainer</span> Video<br/> <span class="hidden-xs">Production</span>' : '简报式影片制作' !!}</h5>
                </a>
            </div>
        </div>
    </div>
</div>


<img src="{{asset('/img/2016.0715_Cubeevo_Visual_Branding.gif')}}" width="1">
<img src="{{asset('/img/2016.0715_Cubeevo_Thematic_Campaign_Design.gif')}}" width="1">
<img src="{{asset('/img/2016.0715_Cubeevo_Online_Digital_Platform.gif')}}" width="1">
<img src="{{asset('/img/2016.0715_Cubeevo_Explainer_Video_Production.gif')}}" width="1">