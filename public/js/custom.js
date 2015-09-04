  $(window).load(function() {
    if($('.cre-box')){
      function builtboxsize(){  
        var _boxheight = $('.cre-box').height();  
        $('.extra-info-box').css('height', _boxheight);  
      }   
      builtboxsize(); 
      $(window).resize(function() { 
        builtboxsize(); 
      });
    } 

    $('.blanket').fadeOut();
  });

  $(document).ready(function() {


  $('.cd-nav-trigger').click(function(){
    if($('.btn-back').length > 0){
      if($(this).hasClass('menu-is-open')){
        $('.btn-back').hide();
      }else{ 
        $('.btn-back').show();
      }
    }
    return false;
  });

	if($('.scene').length > 0){ 
		var $scene = $('.scene').parallax(); 
    $scene.parallax('scalar',12, 2); 
  } 

	if($('#fullpage').length > 0){ 
    $('#fullpage').fullpage({ 
      afterLoad :  function(anchorLink, index){
          var loadedSection = $(this); 
          var contentSection = loadedSection.find('.content-section').html(); 
          $('.home-content').html('').removeClass('animated fadeOutUp').append(contentSection).addClass('animated fadeInUp'); 
          //using index  
           switch(index){ 
            case 1:  
              $('.cd-prev').parent().addClass('hide');
            break;
            case 2:
            $('.scene.orange').removeClass('animated fadeOut').addClass('animated slideInRight');
            break;
            case 3:
            $('.scene.yellow').removeClass('animated fadeOut').addClass('animated slideInUp');
            break;
            case 4:
            $('.scene.red').removeClass('animated fadeOut').addClass('animated fadeInRight');
            break;
            case 5:
            $('.scene.purple .body').removeClass('animated fadeOut').addClass('animated zoomInDown');
            $('.scene.purple .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
              setTimeout(function () {
                $('.scene.purple .cube').removeClass('animated fadeOut').addClass('animated bounceInDown');
              }, 1000
            ));
            break;
            case 6:
            $('.scene.blue').removeClass('animated fadeOut').addClass('animated slideInRight');
            break;
            case 7:
              $('.scene.green .body').removeClass('animated fadeOut').addClass('animated fadeIn'); 
              $('.scene.green .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
                setTimeout(function () {
                  $('.scene.green .plant').removeClass('animated fadeOut').addClass('animated fadeIn');
                }, 1000
              ));
              $('.cd-next').parent().addClass('hide');
            break;
          }   
      },
      onLeave: function(index, nextIndex, direction){  
        $('.home-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
        switch(index){
            case 1:
              $('.cd-prev').parent().removeClass('hide');
            break;
            case 2:
              $('.scene.orange').removeClass('animated slideInRight').addClass('animated fadeOut');
            break;
            case 3:
              $('.scene.yellow').removeClass('animated slideInUp').addClass('animated fadeOut');
            break;
            case 4:
              $('.scene.red').removeClass('animated fadeInRight').addClass('animated fadeOut');
            break;
            case 5:
              $('.scene.purple .body').removeClass('animated zoomInDown').addClass('animated fadeOut');
              $('.scene.purple .cube').removeClass('animated bounceInDown').addClass('animated fadeOut');
            break;
            case 6:
              $('.scene.blue').removeClass('animated slideInRight').addClass('animated fadeOut');
            break;
            case 7:
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
       superman.animate({top:'+=20'}, 1000);
       superman.animate({top:'-=20'}, 1000, fly);
       cube.animate({top:'+=20'}, 1000);
       cube.animate({top:'-=20'}, 1000, fly);
    } 
    fly(); 

    $('.cd-next').click(function(){ 
      $.fn.fullpage.moveSectionDown();
      return false;
    });
    $('.cd-prev').click(function(){
      $.fn.fullpage.moveSectionUp();
      return false;
    });
  } 
  
  	$('.contactus .form-control,.contactus textarea').focus(function(){
  		$(this).parent().addClass('active');
  	});
  	$('.contactus .form-control,.contactus textarea').blur(function(){
  		$(this).parent().removeClass('active');
  	}); 
});