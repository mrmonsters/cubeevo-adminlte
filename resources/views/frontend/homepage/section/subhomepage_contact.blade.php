<div class="col-xs-6 col-xs-push-6 wrapper__right">
    <div class="wrapper">
        <div class="row content-wrapper-layer content-wrapper-first-layer">
            <div class="content-wrapper__content-contact-us text-white vcenter" style="background-color: #616161;">
                <div class="col-xs-12 ">

                    <h4 class="content-wrapper__content-contact-us-heading"><b>{{ (Session::get('locale') == 'en') ? "LET'S TALK" : '欢迎咨询' }}</b></h4>
                    @if (Session::get('locale') == 'cn')
                        <p class="content-wrapper__content-contact-us-subheading hidden-xs">新业务或合作方案</p>
                    @else
                        <p class="content-wrapper__content-contact-us-subheading hidden-xs">NEW BUSINESS &
                            COLLABORATIONS</p>
                    @endif
                    <br class="hidden-sm hidden-xs hidden-md"/>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-sm-push-5 col-md-12 col-md-push-5 col-lg-push-5 col-lg-4">
                            <small>
                                <div class="homepage_contact_us-mobile-line visible-xs"></div>
                                <b>{{ (Session::get('locale') == 'en') ? 'SINGAPORE' : '新加坡' }}</b>
                                <div class="homepage-line hidden-xs"></div>
                            </small>
                            <br class="hidden-sm hidden-xs hidden-md"/>

                            <p style="line-height: 1em;">
                                <small>David Lim <br/>
                                    @if (Session::get('locale') == 'cn')
                                        客户总监
                                    @else
                                        Account Director
                                    @endif
                                    <br/>
                                    <a class="text-white" href="tel:+6590814118">+65 9081 4118</a><br/>
                                    <a class="text-white hidden-sm hidden-xs hidden-md"
                                       href="mailto:enquire@cubeevo.com">enquire@cubeevo
                                        .com</a></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row content-wrapper-layer content-wrapper-second-layer ">
            <div class="content-wrapper__content-contact-us text-white vcenter" style="background-color: #3A3839;">
                <div class="col-xs-12 ">

                    <h4 class="content-wrapper__content-contact-us-heading"><b>{{ (Session::get('locale') == 'en') ? 'GET IN TOUCH' : '保持联系' }}</b>
                    </h4>
                    <br class="hidden-xs"/>
                    <div class="row">
                        <br class="visible-xs">
                        <div class="col-xs-12 col-sm-12 col-sm-push-4 col-md-12 col-md-push-5 col-lg-push-5 col-lg-4">
                            <small class="homepage-contact-us__country">
                                <div class="homepage_contact_us-mobile-line visible-xs"></div>
                                <b>{{ (Session::get('locale') == 'en') ? 'SINGAPORE' : '新加坡' }}</b>
                            </small>
                            <br class="hidden-sm hidden-md"/>

                            <p style="line-height: 1em;" class="content-wrapper__content-contact-us-address ">
                                <small style="position: relative">

                                    @if (Session::get('locale') == 'cn')
                                        形立方广告有限公司
                                    @else
                                        CUBEevo ADVERTISING PTE LTD
                                    @endif
                                    <br class="visible-sm visible-md visible-lg"/>
                                    <span class="homepage-line homepage-line-custom hidden-xs"></span>
                                    <span class="hidden-xs">(UEN - 201604241R)</span><br class="hidden-xs"/><br class="hidden-xs"/>
                                <span class="hidden-xs hidden-sm hidden-md">20 Maxwell Rd<br/>
                                #09-17, Maxwell House<br/>
                                Singapore 069113.<br/>
                               <br/></span><br/>
                                    <span class="hidden-xs">T:</span> <a class="text-white" href="tel:+6590814118">+659081 4118</a><br/>
                                    <span class="hidden-xs">E:</span> <a class="text-white" href="mailto:enquire@cubeevo.com">enquire@cubeevo.com</a>
                                </small>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>