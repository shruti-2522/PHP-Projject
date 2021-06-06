
// Store form state at page load
var initial_form_state = $('#myform').serialize();

// Store form state after form submit
$('#myform').submit(function(){
  initial_form_state = $('#myform').serialize();
});

// Check form changes before leaving the page and warn user if needed
$(window).bind('beforeunload', function(e) {
  var form_state = $('#myform').serialize();
  if(initial_form_state != form_state){
    var message = "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
    e.returnValue = message; // Cross-browser compatibility (src: MDN)
    return message;
  }
});
