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
  $('#losh-carousel').css('visibility', 'unset');

/**
 * Scroll Magic for Multi Page
 */ 
function setScrollButton(event){
    section = event.currentTarget.triggerElement();
    sectionID = $(section).attr('id');
 console.log( sectionID, event.type);    
        if(event.type == 'enter'){
            nextSection = sectionID.replace(/(\d+)$/, function (match, n) {
                return ++n; // parse to int and increment number
            }); 
            prevSection = sectionID.replace(/(\d+)$/, function (match, n) {
                return --n; // parse to int and increment number
            }); 
 console.log(nextSection);
            $('#scroll-down a').attr('href','#' + nextSection + '-anchor');
            if( prevSection =='losh-0'){
                $('#scroll-up a').attr('href','#page');
            } else {
                $('#scroll-up a').attr('href','#' + prevSection + '-anchor');
            }
        }
        if( event.type == 'leave'){
           
 console.log(sectionID);
        prevSection = sectionID.replace(/(\d+)$/, function (match, n) {
                return n - 2; // parse to int and increment number
            }); 
        $('#scroll-down a').attr('href','#' + sectionID + '-anchor');
        if( prevSection =='losh-0'){
                $('#scroll-up a').attr('href','#page');
            } else {
                $('#scroll-up a').attr('href','#' + prevSection + '-anchor');
            }
        }
    }
// init controller

	var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 0}});

	// build scenes
    if( $('#losh-1').length ){
        new ScrollMagic.Scene({triggerElement: "#losh-1"})
                .setClassToggle("body", "bg1") // add class toggle
                .addIndicators() // add indicators (requires plugin)
                .on('enter leave', setScrollButton)
                .addTo(controller);
    }
    if( $('#losh-2').length ){	
        new ScrollMagic.Scene({triggerElement: "#losh-2"})
                .setClassToggle("body", "bg2") // add class toggle
                .addIndicators() // add indicators (requires plugin)
                .on('enter leave', setScrollButton)
                .addTo(controller);
    }
    if( $('#losh-3').length ){
        new ScrollMagic.Scene({triggerElement: "#losh-3"})
                .setClassToggle("body", "bg3") // add class toggle
                .addIndicators() // add indicators (requires plugin)
                .on('enter leave', setScrollButton)    
                .addTo(controller);
    }
    if( $('#losh-4').length ){
        new ScrollMagic.Scene({triggerElement: "#losh-4"})
                .setClassToggle("body", "bg4") // add class toggle
                .addIndicators() // add indicators (requires plugin)
                .on('enter leave', setScrollButton)    
                .addTo(controller);
    }
    if( $('.admin-bar').length){
        barOffset = -32;
    } else {
        barOffset = 0;
    }
    offset = 0;
console.log( offset);
    new ScrollMagic.Scene({
                    triggerElement: ".site-branding", // point of execution
                    duration: 0, // pin element for the window height - 1
                    triggerHook: 0, // don't trigger until #pinned-trigger1 hits the top of the viewport
                    offset: barOffset,
                    reverse: true // allows the effect to trigger when scrolled in the reverse direction
                  })
                  .setPin(".site-branding") // the element we want to pin
                .addIndicators() // add indicators (requires plugin)
                .setClassToggle('.site-branding', 'logo-shrink')
            .addTo(controller);
    
});

