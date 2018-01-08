$(document).ready(function(){
    /**
     * Event when click on toogle button
     */
    $(document).on('click', '.main-header button.navbar-toggle', function(){
        if($('.container-navbar-collapse').hasClass('mobile-hidden')){
            $('.container-navbar-collapse').removeClass('mobile-hidden');
            $('.container-navbar-collapse').animate({height: '100%'}, 200);
            $('body').css({overflow: 'hidden'});
        }else{
            $('.container-navbar-collapse').animate({height: '0'}, 200, function(){
                $('.container-navbar-collapse').addClass('mobile-hidden');
                $('body').css({overflow: 'auto'});
            });
        }
    });
   
    $(document).on('click', '#navbar-collapse .btn-close', function(){
        if($('.container-navbar-collapse').hasClass('mobile-hidden')){
            $('.container-navbar-collapse').removeClass('mobile-hidden');
            $('.container-navbar-collapse').animate({height: '100%'}, 200);
            $('body').css({overflow: 'hidden'});
        }else{
            $('.container-navbar-collapse').animate({height: '0'}, 200, function(){
                $('.container-navbar-collapse').addClass('mobile-hidden');
                $('body').css({overflow: 'auto'});
            });
        }
    });

    $(document).on('click', '.container-navbar-collapse .navbar-nav>li>i', function(){
        if($(this).hasClass('fa-chevron-right')){
            $(this).removeClass('fa-chevron-right');
            $(this).addClass('fa-chevron-down');
        } else {
            $(this).removeClass('fa-chevron-down');
            $(this).addClass('fa-chevron-right');
        }
    });
    
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
            } else {
                    $('.scrollToTop').fadeOut();
            }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
    });
    
    $("body").bind('selectstart', function(event) {
        event.preventDefault();
    });

    $('.content-container img').on('dragstart', function (e) {return false; });
    $('.content-container img').on('mousedown', function(e){e.preventDefault()});
});