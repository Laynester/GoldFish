window.FlashExternalInterface.logLoginStep = function(b) {
if (b == "client.init.start") {
  document.getElementById('loader_bar').style = "width:10%;";
}
if (b == "client.init.swf.loaded") {
document.getElementById('loader_bar').style = "width:20%;";
}
if (b == "client.init.core.init") {
document.getElementById('loader_bar').style = "width:50%;";
}
if (b == "client.init.socket.ok") {
document.getElementById('loader_bar').style = "width:60%;";
}
if (b == "client.init.handshake.start") {
document.getElementById('loader_bar').style = "width:65%;";
}
if (b == "client.init.auth.ok") {
document.getElementById('loader_bar').style = "width:75%;";
}
if (b == "client.init.localization.loaded") {
document.getElementById('loader_bar').style = "width:90%;";
}
if (b == "client.init.core.running") {
document.getElementById('loader_bar').style = "width:95%;";
}
if (b === "client.init.config.loaded") {
          setTimeout(function() {
                document.getElementById('loader_bar').style = "width:100%;";
          }, 3000);
          setTimeout(function() {
              $('#loader').fadeOut(700);
          }, 5000);
}
}
$( document ).ready(function() {
  var myEle = document.getElementById("client");
      if(myEle){
        document.getElementById('loader').style = "z-index:4;";
        document.getElementById('client-ui').style = "z-index:3;";
      }
});
