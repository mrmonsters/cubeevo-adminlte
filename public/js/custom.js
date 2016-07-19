var isMobile = false;
if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4)))isMobile = true;
$(window).load(function () {
    if ($('.extra-info-box').length > 0) {
        function builtboxsize() {
            var _boxheight = $('.sol-box').height();
            if (_boxheight == null) {
                var _boxheight = $('.cre-box').height();
                $('.cre-box').css('height', _boxheight);
            } else {
                $('.sol-box').css('height', _boxheight);
            }
            $('.extra-info-box').css('height', _boxheight);
        }

        builtboxsize();
        $(window).resize(function () {
            builtboxsize();
        });
    }
});
$(document).ready(function () {
    if ($('.home__background').length > 0) {
        $('.home__background').fullpage.reBuild();
    }
    if ($('#fullpage').length > 0) {
        $('#fullpage').fullpage({
            navigation: true,
            navigationPosition: 'right',
            afterLoad: function (anchorLink, index) {
                var loadedSection = $(this);
                var contentSection = loadedSection.find('.content-section').html();
                $('.home-content').html('').removeClass('animated fadeOutUp').append(contentSection).addClass('animated fadeInUp');
                switch (index) {
                    case 1:
                        $('.scene.orange').removeClass('animated fadeOut').addClass('animated slideInRight');
                        break;
                    case 2:
                        $('.scene.yellow').removeClass('animated fadeOut').addClass('animated slideInUp');
                        break;
                    case 3:
                        $('.scene.red').removeClass('animated fadeOut').addClass('animated fadeInRight');
                        break;
                    case 4:
                        $('.scene.purple .body').removeClass('animated fadeOut').addClass('animated zoomInDown');
                        $('.scene.purple .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', setTimeout(function () {
                            $('.scene.purple .cube').removeClass('animated fadeOut').addClass('animated bounceInDown');
                            $('.scene.purple .bg').removeClass('animated fadeOut').addClass('animated fadeIn');
                        }, 1000));
                        break;
                    case 5:
                        $('.scene.blue').removeClass('animated fadeOut').addClass('animated slideInRight');
                        break;
                    case 6:
                        $('.scene.green .body').removeClass('animated fadeOut').addClass('animated fadeIn');
                        $('.scene.green .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', setTimeout(function () {
                            $('.scene.green .plant').removeClass('animated fadeOut').addClass('animated fadeIn');
                            $('.scene.green .bg').removeClass('animated fadeOut').addClass('animated fadeIn');
                        }, 1000));
                        $('.cd-next').parent().addClass('hide');
                        break;
                }
            }, onLeave: function (index, nextIndex, direction) {
                $('.home-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
                switch (index) {
                    case 1:
                        $('.scene.orange').removeClass('animated slideInRight').addClass('animated fadeOut');
                        break;
                    case 2:
                        $('.scene.yellow').removeClass('animated slideInUp').addClass('animated fadeOut');
                        break;
                    case 3:
                        $('.scene.red').removeClass('animated fadeInRight').addClass('animated fadeOut');
                        break;
                    case 4:
                        $('.scene.purple .body').removeClass('animated zoomInDown').addClass('animated fadeOut');
                        $('.scene.purple .cube').removeClass('animated bounceInDown').addClass('animated fadeOut');
                        $('.scene.purple .bg').removeClass('animated fadeIn').addClass('animated fadeOut');
                        break;
                    case 5:
                        $('.scene.blue').removeClass('animated slideInRight').addClass('animated fadeOut');
                        break;
                    case 6:
                        $('.scene.green .body').removeClass('animated fadeIn').addClass('animated fadeOut');
                        $('.scene.green .plant').removeClass('animated fadeIn').addClass('animated fadeOut');
                        $('.cd-next').parent().removeClass('hide');
                        break;
                }
            }
        });
        $('#fullpage').fullpage.reBuild();
        var superman = $('.yellow.mascott');
        var cube = $('#cube');

        function fly() {
            superman.animate({top: '+=20'}, 1000);
            superman.animate({top: '-=20'}, 1000, fly);
            cube.animate({top: '+=20'}, 1000);
            cube.animate({top: '-=20'}, 1000, fly);
        }

        fly();
        $('.cd-next').click(function () {
            $.fn.fullpage.moveSectionDown();
            return false;
        });
        $('.cd-prev').click(function () {
            $.fn.fullpage.moveSectionUp();
            return false;
        });
    }

    $(".modal, .homevideo .close, .homevideo .btn").click(function () {
        $(".homevideo iframe").attr("src", $(".homevideo iframe").attr("src"));
    });
    // $('html').bind("contextmenu", function (e) {
    //     return false;
    // });
    if ($('.js-back-to-top').length > 0) {
        $('.js-back-to-top').click(function () {
            $("html, body").animate({scrollTop: 0}, "slow");
            return false;
        });
    }
    if ($('.brandImage').length > 0) {
        var _viewportHeight = $(window).height();
        $('.brandImage').css('height', _viewportHeight);
    }
    function adjustprojectcontentimage() {
        var _viewportHeight = $(window).height();
        $('.brandImage').css('height', _viewportHeight);
    }

    $('.js-showtitle').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('.icon-btn-link').removeClass('active');
            var _parent = $(this).parent().parent().parent();
            _parent.find('.greybox').fadeOut();
            _parent.find(' .panel-body.overlap').fadeOut();
            _parent.find('.panel-title').fadeOut();
            _parent.find('.panel-title-desc').fadeOut();
        } else {
            var _parent = $(this).parent().parent().parent();
            _parent.find('.greybox').fadeIn();
            _parent.find('.panel-title').fadeIn();
            _parent.find(' .panel-body.overlap').fadeIn();
            _parent.find('.panel-title-desc').fadeIn();
            $(this).addClass('active');
        }
    });
    $('.cd-nav-trigger').click(function () {
        if ($('.btn-back').length > 0) {
            if ($(this).hasClass('menu-is-open')) {
                $('.btn-back').hide();
            } else {
                $('.btn-back').show();
            }
        }
        return false;
    });
    if ($('.scene').length > 0) {
        var $scene = $('.scene').parallax();
        $scene.parallax('scalar', 12, 2);
    }
    $('.contactus .form-control,.contactus textarea').focus(function () {
        $(this).parent().addClass('active');
    });
    $('.contactus .form-control,.contactus textarea').blur(function () {
        $(this).parent().removeClass('active');
    });
    var _slickcarousl = $('.slick-carousel').slick({
        dots: false,
        lazyLoad: 'progressive',
        prevArrow: '<div class="bg-orange slick-prev-wrapper smart-object"><div class="arrow-left arrow"><div class="arrow-bar-1 smart-transition"></div><div class="arrow-bar-2 smart-transition"></div></div></div>',
        nextArrow: '<div class="bg-orange slick-next-wrapper smart-object"><div class="arrow-right arrow"><div class="arrow-bar-1 smart-transition"></div><div class="arrow-bar-2 smart-transition"></div></div></div>',
    });
});