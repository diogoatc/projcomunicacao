 // function to set the height on fly
 function autoHeight() {
   $('.container').css('min-height', 0);
   $('.container').css('min-height', )
     $(document).height() 
     - $('.navbar navbar-inverse').height() 
     - $('.rodape').height()
   ));
 }

 // onDocumentReady function bind
 $(document).ready(function() {
   autoHeight();
 });

 // onResize bind of the function
 $(window).resize(function() {
   autoHeight();
 });