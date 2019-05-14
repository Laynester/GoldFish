var _33611="21421";var _26452="19895";var _89563="18563";var _54489="23541";var _48962="21535";var _99871="36421";if(typeof deconcept=="undefined"){var deconcept=new Object();}
if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}
if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}
deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}
this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(_1){this.setAttribute("swf",_1);}
if(id){this.setAttribute("id",id);}
if(w){this.setAttribute("width",w);}
if(h){this.setAttribute("height",h);}
if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}
this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}
if(c){this.addParam("bgcolor",c);}
var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};var FlashExternalInterface=(function(){return{logout:function(){if(window.opener){try{window.opener.location=FlashExternalInterface.signoutUrl;window.close();}catch(k){window.location=FlashExternalInterface.signoutUrl;}}else{window.location=FlashExternalInterface.signoutUrl;}},getClient:function(){return document.getElementById('flash-container');}}})();deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f)
{this.attributes[_e]=_f;},getAttribute:function(_10)
{return this.attributes[_10];},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15];},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=new Array();var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+ _18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+ this.getAttribute("swf")+"\" width=\""+ this.getAttribute("width")+"\" height=\""+ this.getAttribute("height")+"\" style=\""+ this.getAttribute("style")+"\"";_19+=" id=\""+ this.getAttribute("id")+"\" name=\""+ this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+ _1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+ _1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+ this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+ this.getAttribute("width")+"\" height=\""+ this.getAttribute("height")+"\" style=\""+ this.getAttribute("style")+"\">";_19+="<param name=\"movie\" value=\""+ this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+ key+"\" value=\""+ _1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+ _1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+ _26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+ 1));}}}return"";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length- 1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var _15567=_48962;var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;

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
function closeNews(){
  $( "#news" ).hide();
}
$( function() {
    $( "#news" ).draggable({
  containment: "#client-ui",
  cursor: "crosshair"
});
});

window.FlashExternalInterface.openNews = function() {
    $( "#news" ).show();
}
window.addEventListener("message", processMessage);

function processMessage(data) {
    var client = document.getElementsByName('client')[0];
    if (data && data.data) {
        var call = data.data.call;
        var target = data.data.target;

									if(call == 'navigator-tab')
				            {
				                // official_view, hotel_view, roomads_view, myworld_view etc (any custom tab)
				                return client.openlink('navigator/tab/' + target);
				            }
				            else if(call === 'home-room')
				            {
				                return client.openlink('navigator/goto/home');
				            }
				            else if(call === 'open-room')
				            {
				                // room id
				                return client.openlink('navigator/goto/' + target);
				            }
				            else if(call === 'navigator-search')
				            {
				                // searches hotel_view
				                return client.openlink('navigator/search/' + target);
				            }
				            else if(call === 'navigator-tag')
				            {
				                // searches hotel_view
				                return client.openlink('navigator/tag/' + target);
				            }
				            else if(call === 'navigator-report')
				            {
				                // room id
				                // reason code??
				                return client.openlink('navigator/report/' + target + '/reasoncode');
				            }
				            else if(call === 'open-friends')
				            {
				                return client.openlink('friendlist/open')
				            }
				            else if(call === 'open-chat')
				            {
				                // user id
				                return client.openlink('friendlist/openchat' + target);
				            }
				            else if(call === 'open-group')
				            {
				                // group id
				                return client.openlink('group/' + target);
				            }
				            else if(call == 'inventory-tab')
				            {
				                // furni, badges
				                return client.openlink('inventory/open/' + target);
				            }
				            else if(call === 'avatar-editor')
				            {
				                return client.openlink('avatareditor/open');
				            }
				            else if(call === 'find-friends')
				            {
				                return client.openlink('friendbar/friendfriends');
				            }
				            else if(call === 'open-link')
				            {
				                return client.openlink(target);
				            }
				            else if(call === 'open-achievements')
				            {
				                return client.openlink('questengine/achievements');
				            }
				            else if(call === 'open-guest-calendar')
				            {
				                return client.openlink('questengine/calendar');
				            }
				            else if(call === 'open-quests')
				            {
				                return client.openlink('questengine/quests');
				            }
				            else if(call === 'open-room-thumbnail')
				            {
				                // some string
				                return client.openlink('roomThumbnailCamera/' + target);
				            }
				            else if(call === 'open-tour')
				            {
				                // some string
				                return client.openlink('help/tour');
				            }
				            else if(call === 'open-tour')
				            {
				                // some string
				                return client.openlink('help/tour');
				            }
				            else if(call === 'report-room')
				            {
				                // room id
				                return client.openlink('help/report/room/' + target);
				            }
				            else if(call === 'open-memenu')
				            {
				                // room id
				                return client.openlink('toolbar/memenu');
				            }
				            else if(call === 'highlight-toolbar')
				            {
				                // catalog, navigator, memenu
				                return client.openlink('toolbar/hightlight/' + target);
				            }
				            else if(call === 'open-game')
				            {
				                // some game
				                return client.openlink('games/open/' + target);
				            }
				            else if(call === 'play-game')
				            {
				                // some game
				                return client.openlink('games/play/' + target);
				            }
				            else if(call === 'open-catalog')
				            {
				                // open catalog
				                return client.openlink('catalog/open');
				            }
				            else if(call === 'open-catalog-page')
				            {
				                // some page
				                return client.openlink('catalog/open/' + target);
				            }
				            else if(call === 'open-warehouse')
				            {
				                // open catalog
				                return client.openlink('catalog/warehouse');
				            }
				            else if(call === 'open-warehouse-page')
				            {
				                // some page
				                return client.openlink('catalog/warehouse/' + target);
				            }
				            else if(call === 'club-buy')
				            {
				                // some page
				                return client.openlink('catalog/club_buy');
				            }
				            else if(call === 'open-nux-lobbyoffer')
				            {
				                // something
				                return client.openlink('nux/lobbyoffer');
				            }
				            else if(call === 'open-nux-lobbyoffer-show')
				            {
				                // something
				                return client.openlink('nux/lobbyoffer/show');
				            }
				            else if(call === 'open-friendbar-user')
				            {
				                // username or id ???
				                return client.openlink('friendbar/open/' + target);
				            }
				            else if(call === 'open-hccenter')
				            {
				                return client.openlink('habboUI/open/hccenter');
				            }
				            else if(call === 'open-habbopages')
				            {
				                return client.openlink('habbopages/' + target);
				            }
				            else if(call === 'open-calendar')
				            {
				                return client.openlink('openView/calendar');
				            }
				            else if(call === 'open-habblet')
				            {
				                // credits else something else..
				                return client.openlink('habblet/open/' + target);
				            }
                    else if (call == 'show-interstitial') {
                      return openInterstitial();
                    }
    }
}
