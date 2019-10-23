
jQuery(function($) {

  // responsive nav
  var header = $('#header'),
      menu = $('#header .header-menu'),
      button  = '<button class="hamburger hidden"><span></span><span></span><span></span></button>';

  header.append( button );

  $('.hamburger').on('click', function() {
    header.toggleClass('responsive');
    menu.slideToggle('fast');
  });

  menu.on('click', '.menu-item-has-children > a', function(e) {

    if( header.hasClass('responsive') ) {

      if ($(this).next('ul').is(':visible')) {
        $(this).next('ul').slideUp('fast');
        $(this).removeClass('active');
      } else {
        $(this).closest('ul').find('.active').next('ul').slideUp('fast');
        $(this).closest('ul').find('.active').removeClass('active');
        $(this).next().slideToggle('fast');
        $(this).addClass('active');
      }
      e.preventDefault();

    }

  });

  /*
  $(window).scroll(function(){
    if( $(this).scrollTop() > ($('.page-header').outerHeight() - 1) ){
      header.addClass("fixed animated ad2 slideInDown");
    } else {
      header.removeClass("fixed animated ad2 slideInDown");
    }
  });
  */

  // smooth scrolling
  $('a.scroll').click(function(){
    //$('#header').removeClass('responsive');
    $('html, body').animate({
    scrollTop: $('#' + $(this).attr('href').substr(1)).offset().top + 1
    }, 800);
    return false;
  });

  // lightcase || gallery
  $(".content-wrapper--text a[href$='.jpg'], .content-wrapper--text a[href$='.JPG'], .content-wrapper--text a[href$='.gif'], .content-wrapper--text a[href$='.GIF'], .content-wrapper--text a[href$='.png'], .content-wrapper--text a[href$='.PNG'], .content-wrapper--text a[href$='.jpeg'], .content-wrapper--text a[href$='.JPEG']").each(function(){
      if( !$(this).attr('data-rel') ) { $(this).attr('data-rel','lightcase'); }
      $(this).attr('title',$(this).children().attr('alt'));
    });
  $('div.galerie--show a').attr('data-rel','lightcase:gallery');

  $('a[data-rel^="lightcase"]').lightcase({
    overlayOpacity: '.8',
    transitionOut: 'scrollHorizontal',
    transitionClose: 'elastic',
    maxWidth: 1100,
    maxHeight: 900,
    //transition: 'elastic',
    //title: 'Perex: ',
    //showTitle: true,
    navigateEndless: false
  });

  // perfect scrollbar
  $('.box-wrapper').perfectScrollbar();

  // fitvids
  /*
  $('.content-wrapper--text').fitVids({
    //ignore: '.class'
  });
  */

}); // document.ready

