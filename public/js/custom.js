  $(window).load(function() {
    $('.blanket').addClass('animate fadeOut');
  });

  $(document).ready(function() {

	if($('.scene').length > 0){ 
		$('.scene').parallax(); 
  	}

	$('.cd-nav-trigger').click(function(){
		return false;
	});

	if($('#fullpage').length > 0){ 
    $('#fullpage').fullpage({ 
      afterLoad :  function(anchorLink, index){
          var loadedSection = $(this); 
          var contentSection = loadedSection.find('.content-section').html(); 
          $('.home-content').html('').removeClass('animated fadeOutUp').append(contentSection).addClass('animated fadeInUp'); 
          //using index
          if(index == 1){ 
            $('.cd-prev').parent().addClass('hide');
          }else{ 
            $('.cd-prev').parent().removeClass('hide');
          }
          if(index == 2){ 
            $('.scene.orange').removeClass('animated fadeOut').addClass('animated slideInRight');
          } 
          if(index == 3){ 
            $('.scene.yellow').removeClass('animated fadeOut').addClass('animated slideInUp');
          } 
          if(index == 4){ 
            $('.scene.red').removeClass('animated fadeOut').addClass('animated fadeInRight');
          } 
          if(index == 5){ 
            $('.scene.purple .body').removeClass('animated fadeOut').addClass('animated zoomInDown');
            $('.scene.purple .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
              setTimeout(function () {
                $('.scene.purple .cube').removeClass('animated fadeOut').addClass('animated bounceInDown');
              }, 1000
            ));
          }  
          if(index == 6){ 
            $('.scene.blue').removeClass('animated fadeOut').addClass('animated slideInRight');
          }  
          //using index
          if(index == 7){ 
            $('.scene.green .body').removeClass('animated fadeOut').addClass('animated fadeIn'); 
            $('.scene.green .body').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
              setTimeout(function () {
                $('.scene.green .plant').removeClass('animated fadeOut').addClass('animated fadeIn');
              }, 1000
            ));
            $('.cd-next').parent().addClass('hide');
          }else{ 
            $('.cd-next').parent().removeClass('hide');
          }
      },
      onLeave: function(index, nextIndex, direction){  
          $('.home-content').removeClass('animated fadeInUp').addClass('animated fadeOutUp');
          if(index == 2){  
            $('.scene.orange').removeClass('animated slideInRight').addClass('animated fadeOut');
          }
          if(index == 3){  
            $('.scene.yellow').removeClass('animated slideInUp').addClass('animated fadeOut');
          }
          if(index == 4){  
            $('.scene.red').removeClass('animated fadeInRight').addClass('animated fadeOut');
          }
          if(index == 5){  
            $('.scene.purple .body').removeClass('animated zoomInDown').addClass('animated fadeOut');
            $('.scene.purple .cube').removeClass('animated bounceInDown').addClass('animated fadeOut');
          }
          if(index == 6){  
            $('.scene.blue').removeClass('animated slideInRight').addClass('animated fadeOut');
          } 
          if(index == 7){  
            $('.scene.green .body').removeClass('animated fadeIn').addClass('animated fadeOut');
            $('.scene.green .plant').removeClass('animated fadeIn').addClass('animated fadeOut');
          } 
      }
    });
      $('#fullpage').fullpage.reBuild();
  }
  
  
  var superman = $('.yellow.mascott');
  function fly() { 
     superman.animate({top:'+=20'}, 1000);
     superman.animate({top:'-=20'}, 1000, fly);
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
  	$('.contactus .form-control,.contactus textarea').focus(function(){
  		$(this).parent().addClass('active');
  	});
  	$('.contactus .form-control,.contactus textarea').blur(function(){
  		$(this).parent().removeClass('active');
  	});


  	var cube = $('#cube');
   	function runIt() { 
       cube.animate({top:'+=20'}, 1000);
       cube.animate({top:'-=20'}, 1000, runIt);
   	} 
    runIt(); 
/*
  if($('.cd-background-wrapper').length){
        //check media query
    var mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, ""),
        
      //define store some initial variables
      halfWindowH = $('.cd-background-wrapper').height()*0.5,
      halfWindowW = $('.cd-background-wrapper').width()*0.5,
      //define a max rotation value (X and Y axises)
      maxRotationY = 10,
      maxRotationX = 3,
      aspectRatio;

    //detect if hero <img> has been loaded and evaluate its aspect-ratio
    $('.cd-floating-background').find('img').eq(0).load(function() {
      aspectRatio = $(this).width()/$(this).height();
        if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) initBackground();
    }).each(function() {
      //check if image was previously load - if yes, trigger load event
        if(this.complete) $(this).load();
    });
    
    //detect mouse movement
    $('.js-three-d').on('mousemove', function(event){ 
      if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
        window.requestAnimationFrame(function(){ 
          moveBackground(event);
        });
      }
    });

    //on resize - adjust .cd-background-wrapper and .cd-floating-background dimentions and position
    $(window).on('resize', function(){
      mediaQuery = window.getComputedStyle(document.querySelector('.cd-background-wrapper'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
      if( mediaQuery == 'web' && $('html').hasClass('preserve-3d') ) {
        window.requestAnimationFrame(function(){
          halfWindowH = $('.cd-background-wrapper').height()*0.5,
          halfWindowW = $('.cd-background-wrapper').width()*0.5;
          initBackground();
        });
      } else {
        $('.cd-background-wrapper').attr('style', '');
        $('.cd-floating-background').attr('style', '').removeClass('is-absolute');
      }
    });

    function initBackground() {
      var wrapperHeight = Math.ceil(halfWindowW*2/aspectRatio), 
        proportions = ( maxRotationY > maxRotationX ) ? 1.1/(Math.sin(Math.PI / 2 - maxRotationY*Math.PI/180)) : 1.1/(Math.sin(Math.PI / 2 - maxRotationX*Math.PI/180)),
        newImageWidth = Math.ceil(halfWindowW*2*proportions),
        newImageHeight = Math.ceil(newImageWidth/aspectRatio),
        newLeft = halfWindowW - newImageWidth/2,
        newTop = (wrapperHeight - newImageHeight)/2;

      //set an height for the .cd-background-wrapper
      $('.cd-background-wrapper').css({
        'height' : wrapperHeight,
      });
      //set dimentions and position of the .cd-background-wrapper   
      $('.cd-floating-background').addClass('is-absolute').css({
        'left' : newLeft,
        'top' : newTop,
        'width' : newImageWidth,
      });
    }

    function moveBackground(event) {
    //console.log(event.offset);    
      var rotateY = ((-event.pageX +halfWindowW)/halfWindowW)*maxRotationY,
        rotateX = ((event.pageY-halfWindowH)/halfWindowH)*maxRotationX; 
        console.log('start'+rotateY);
        if(rotateY < -32.9){
          rotateY = rotateY + 42.5;
        }else if(rotateY < -11.2){
          rotateY = rotateY + 22;
        } 
        console.log('end'+rotateY);

      if( rotateY > maxRotationY) rotateY = maxRotationY;
      if( rotateY < -maxRotationY ) rotateY = -maxRotationY;
      if( rotateX > maxRotationX) rotateX = maxRotationX;
      if( rotateX < -maxRotationX ) rotateX = -maxRotationX;

      $("#" + event.currentTarget.id + ' .cd-floating-background').css({
        '-moz-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
          '-webkit-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
        '-ms-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
        '-o-transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
        'transform': 'rotateX(' + rotateX + 'deg' + ') rotateY(' + rotateY + 'deg' + ') translateZ(0)',
      });
    }
  }*/
});


/*  Detect "transform-style: preserve-3d" support, or update csstransforms3d for IE10 ? #762
  https://github.com/Modernizr/Modernizr/issues/762 */
/*(function getPerspective(){
  var element = document.createElement('p'),
      html = document.getElementsByTagName('html')[0],
      body = document.getElementsByTagName('body')[0],
      propertys = {
        'webkitTransformStyle':'-webkit-transform-style',
        'MozTransformStyle':'-moz-transform-style',
        'msTransformStyle':'-ms-transform-style',
        'transformStyle':'transform-style'
      };

    body.insertBefore(element, null);

    for (var i in propertys) {
        if (element.style[i] !== undefined) {
            element.style[i] = "preserve-3d";
        }
    }

    var st = window.getComputedStyle(element, null),
        transform = st.getPropertyValue("-webkit-transform-style") ||
                    st.getPropertyValue("-moz-transform-style") ||
                    st.getPropertyValue("-ms-transform-style") ||
                    st.getPropertyValue("transform-style");

    if(transform!=='preserve-3d'){
      html.className += ' no-preserve-3d';
    } else {
      html.className += ' preserve-3d';
    }
    document.body.removeChild(element);

})();
*/