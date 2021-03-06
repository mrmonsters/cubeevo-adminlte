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
                                <b>{{ (Session::get('locale') == 'en') ? 'MALAYSIA' : '马来西亚' }}</b>
                                <div class="homepage-line hidden-xs"></div>
                            </small>
                            <br class="hidden-sm hidden-xs hidden-md"/>

                            <p style="line-height: 1em;">
                                <small>Timothy Tai <br/>
                                    @if (Session::get('locale') == 'cn')
                                        客户经理
                                    @else
                                        Account Manager
                                    @endif<br/>
                                    <a class="text-white" href="tel:+60173216004">+6017 321 6004</a><br/>
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
                        <div class="col-xs-12 col-sm-12 col-sm-push-4 col-md-12 col-md-push-5 col-lg-push-5 col-lg-4">
                            <small class="homepage-contact-us__country">
                                <div class="homepage_contact_us-mobile-line visible-xs"></div>
                                <b>{{ (Session::get('locale') == 'en') ? 'MALAYSIA' : '马来西亚' }}</b>
                            </small>
                            <br class="hidden-sm hidden-md"/>

                            <p style="line-height: 1em;" class="content-wrapper__content-contact-us-address ">
                                <small style="position: relative">
                                    @if (Session::get('locale') == 'cn')
                                        形立方广告有限公司 <br class="visible-sm visible-md visible-lg"/>(949017-T)
                                    @else
                                        CUBEevo ADVERTISING SDN BHD <br class="visible-sm visible-md visible-lg"/>(949017-T)
                                    @endif
                                    <br/>
                                    <span class="homepage-line homepage-line-custom hidden-xs"></span>
                                     <br class="hidden-xs"/>
                                <span class="hidden-xs hidden-sm hidden-md"> 43-2, Jln Temenggung 21/9 <br/>
                                Bandar Mahkota Cheras<br/>
                                43200 Batu 9 Cheras<br/>
                                Selangor, Malaysia.<br/></span><br class="hidden-xs"/>

                                    <span class="hidden-xs">T:</span> <a class="text-white" href="tel:+60390109882">+603 9010 9882</a><br/>
                                    <span class="hidden-xs">F: <a class="text-white" href="tel:+60390759882">+603 9075 9882</a><br/>
                                    </span>
                                    <span class="hidden-xs">E:</span> <a class="text-white" href="mailto:enquire@cubeevo.com">enquire@cubeevo.com</a>
                                </small>
                            </p>
                        </div>
                        <br class="visible-xs">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>