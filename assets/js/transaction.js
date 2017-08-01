$(function() {
$('#expiry').mask("99/99");
$('#cardno').mask("9999-9999-9999-9999");
$('#cvv').mask("999");
  $('#tranc_form').on('submit', function(e) {
      e.preventDefault();
      var data = $("#tranc_form :input").serializeArray();
      console.log(data);
  });
  document.getElementById("submit").addEventListener('click',function(){
    document.getElementById('tranc_form').className='submitted';
  });
});
