$(function() {
    var sticky_navigation_offset_top = $('#stick').offset().top;
    var sticky_navigation = function(){
     var scroll_top = $(window).scrollTop(); 
     
     if (scroll_top > sticky_navigation_offset_top) { 
      $('#stick').css({ 'position': 'fixed', 'top':0, 'left':0 });
     } else {
      $('#stick').css({ 'position': 'relative' }); 
     }   
    };
    
    sticky_navigation();
    
    $(window).scroll(function() {
      sticky_navigation();
    });
    
    // NOT required:
    // for this demo disable all links that point to "#"
    $('a[href="#"]').click(function(event){ 
     event.preventDefault(); 
    });
    
   });