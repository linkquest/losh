/* 
 * Mediavandals
 */
jQuery(document).ready(function($){
 
      $("#site-navigation").mmenu({
         // options
      }, {
            // configuration
            clone: true 
         });
      var API = $("#site-navigation").data( "mmenu" );
      
      $("button.menu-toggle").click(function() {
         API.open();
      });

  $('#losh-carousel').slick({
    arrows: false,
    infinite: true,
    slidesToShow: 10,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000
  });
  $(document).on('scroll',function(){
      console.log('got scrolling happening');
      $('section.multi-page').each(function(){
          console.log( $(this).scrollTop() );
      });
  });

});

