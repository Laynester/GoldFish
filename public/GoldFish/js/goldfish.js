function updateStatic() {
  $.ajax({
      url: '/api',
      dataType: "text",
      type: 'GET',
      success: function(data){
        var parsed_data = JSON.parse(data);
        $('#onlinecount').html(parsed_data.hotel.online);
      }
    });
}
$(document).ready(function(e) {
    $.ajaxSetup({
        cache:true
    });
    setInterval(function() {
      updateStatic();
    }, 2000);
    $( "#onlinecount").click(function() {
      updateStatic();
    });
  });
