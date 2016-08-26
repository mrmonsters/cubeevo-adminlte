
$(document).ready(function() {
    if (!$(".wrapper.timeline").length) return;
    $(".wwdContainer .text").css({
        opacity: 0,
        display: "block"
    });
    $(".wwdContainer .ico").each(function(i) {
        if (i > 0) $(this).css({
            opacity: 0.2
        });
        $(this).attr("href", "javascript:forceDot(" + i + ");");
        var perc = (i * 100 / ($(".wwdContainer .ico").length - 1));
        var dot = $("<div class='dot'><div class='white'></div><div class='black'></div></div>");
        dot.css({
            left: perc + "%"
        });
        var widthFull = parseInt($(".wwdContainer .wwdBar").css("width"), 10);
        var pxl = (widthFull / 100) * perc;
        dot.attr("data-pxl", pxl - 8);
        dot.appendTo(".wwdContainer .wwdBarContainer .dots")
    });
    wwdStart(!0);

    $(window).scroll(function() {
        var WT = $(window).scrollTop();
        if (WT > 400) {
            $(".logo.name.following").addClass("visible")
        } else {
            $(".logo.name.following").removeClass("visible")
        }
    });
    $(window).load(function() {
        var gif = $("section.hero .logo").attr("data-gif");
        $("section.hero .logo").css({
            backgroundImage: "url(" + gif + ")"
        })
    })
});
var wwdFullT = 0;

function wwdStart(auto) {
    var width = parseInt($(".wwdContainer .wwdBar").width(), 10);
    var t = width * 20;
    wwdFullT = t;
    var delay = (auto == !0) ? 4000 : 0;
    delay = 0;
    $(".wwdContainer .dot").removeClass("showed").addClass("notShowed").find(".black").delay(delay).animate({
        opacity: 0
    }, 200, function() {
        $(this).css({
            width: 0,
            opacity: 1
        })
    });
    var timeReset = 200;
    if ($(".wwdContainer").hasClass("r320")) {
        timeReset = 800;
        $(".wwdContainer table").animate({
            marginLeft: "-50px"
        }, timeReset)
    } else {
        $(".wwdContainer table").css({
            marginLeft: "0px"
        })
    }
    $(".wwdContainer .wwdBar .black").stop(!0, !0, !1).delay(delay).animate({
        height: 0
    }, timeReset, function() {
        $.when(showDot($(".dot.notShowed:eq(0)"))).done(function() {
            $(".wwdContainer .wwdBar .black").css({
                height: "3px",
                width: "0px"
            });
            animateWWDblackBar(t)
        })
    })
}

function animateWWDblackBar(time, width) {
    if (!width) width = "100%";
    var elements = $(".wwdContainer .ico").length;
    $(".wwdContainer .wwdBar .black").stop(!0, !1).animate({
        width: width
    }, {
        duration: time,
        easing: "linear",
        progress: function(now, progress, leftTime) {
            wwdLeftTime = leftTime;
            var perc = now.tweens[0].now;
            var widthFull = parseInt($(".wwdContainer .wwdBar").css("width"), 10);
            var nowPixel = (widthFull / 100) * perc;
            if ($("section.capabilities").css("overflow") == "hidden") $(".capabilitiesMobileScroller").css({
                marginLeft: -nowPixel + "px"
            });
            else $(".capabilitiesMobileScroller").css({
                marginLeft: "0px"
            });
            var DOT = $(".dot.notShowed").filter(function() {
                return parseInt($(this).attr("data-pxl"), 10) <= nowPixel
            });
            if (DOT.length) showDot(DOT)
        },
        complete: function() {
            restart = setTimeout(function() {
                wwdStart(!0)
            }, wwdFullT / elements)
        }
    })
}
var restart = null;
var wwdLeftTime = 0;

function forceDot(index) {
    OBJ = $(".dot:eq(" + index + ")");
    var barWidth = OBJ.attr("data-pxl");
    $(".wwdContainer .wwdBar .black").stop(!0, !1);
    if (restart) clearTimeout(restart);
    $(".wwdContainer .wwdBar .black").animate({
        width: barWidth + "px"
    }, {
        duration: 400,
        easing: "linear",
        progress: function(now, progress, leftTime) {
            var nowPixel = parseInt(now.tweens[0].now, 10);
            if ($("section.capabilities").css("overflow") == "hidden") $(".capabilitiesMobileScroller").css({
                marginLeft: -nowPixel + "px"
            });
            else $(".capabilitiesMobileScroller").css({
                marginLeft: "0px"
            });
            var DOT = $(".dot.notShowed").filter(function() {
                return parseInt($(this).attr("data-pxl"), 10) <= nowPixel
            });
            if (DOT.length) showDot(DOT);
            var DOT = $(".dot.showed").filter(function() {
                return parseInt($(this).attr("data-pxl"), 10) + 8 >= nowPixel
            });
            if (DOT.length) hideDot(DOT)
        },
        complete: function() {
            var DOT = $(".dot.showed").filter(function() {
                return parseInt($(this).attr("data-pxl"), 10) + 8 >= barWidth
            });
            if (DOT.length) hideDot(DOT);
            var perc = 100 / (parseInt($(".wwdContainer .wwdBarContainer").width(), 10) / barWidth);
            var leftTime = wwdFullT - (wwdFullT / 100) * perc;
            animateWWDblackBar(leftTime)
        }
    })
}

function hideDot(OBJ) {
    var index = OBJ.prevAll(".dot").length;
    OBJ.stop(!0, !1).addClass("notShowed").removeClass("showed").find(".black").animate({
        width: "0px"
    }, 250);
    $(".wwdContainer .ico").eq(index).stop(!0, !1).animate({
        opacity: 0.2
    }, 300)
}

function showDot(OBJ) {
    if (typeof(OBJ) == "object") {
        var dfd = $.Deferred()
    } else {
        OBJ = $(".dot:eq(" + OBJ + ")")
    }
    OBJ.addClass("showed").removeClass("notShowed").find(".black").stop(!0, !1).animate({
        width: "12px"
    }, 250);
    var index = OBJ.prevAll(".dot").length;
    $(".wwdContainer .ico").eq(index).stop(!0, !1).animate({
        opacity: 1
    }, 500);
    $(".wwdContainer .ico").not($(".wwdContainer .ico").eq(index)).stop(!0, !1).animate({
        opacity: 0.2
    }, 500);
    $(".wwdContainer .text").eq(index).stop(!0, !1).delay(300).animate({
        opacity: 1
    }, 500);
    $(".wwdContainer .text").not($(".wwdContainer .text").eq(index)).stop(!0, !1).animate({
        opacity: 0
    }, 500);
    if (dfd) {
        setTimeout(dfd.resolve, 150);
        return dfd.promise()
    }
}

