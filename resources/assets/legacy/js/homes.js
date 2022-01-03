$(function() {
	$(".draggable").draggable({
		containment: "#containment-wrapper",
		cursor: 'move'
    });
    $(document).click(function(evt){
		console.log($(evt.target).hasClass('icon-edit'))
        if($(evt.target).hasClass('icon-edit') || $(evt.target).hasClass('selectSkin')){

        } else {
			$('.edit-menu').removeClass('show');
		}
    });
});
$(document).on("mouseup", ".draggable", function() {
	var elem = $(this),
		pos = elem.position();
	elem.attr('data-top', pos.top)
	elem.attr('data-left', pos.left)
});
$(document).on("mousedown", ".draggable", function() {
	var topZ = 0;
	$('.draggable').each(function() {
		var thisZ = parseInt($(this).css('z-index'), 10);
		if (thisZ > topZ) {
			topZ = thisZ;
		}
	});
	var elem = $(this);
	elem.css('z-index', topZ + 1);
	elem.attr('data-z', topZ + 1)
});
$("#save").click(function() {
	var widgets = disp($(".draggable").toArray());
	console.log($(".draggable").toArray());
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: 'POST',
		url: '/user/home/' + username + '/save',
		contentType: 'application/json',
		data: widgets,
		success: function(result) {
			var overlay = $('<div class="store_overlay">');
			$('body').append(overlay);
			$('.store_overlay').append('<div style="" id="habbos_loading"><img src="/assets/legacy/images/progress_habbos.gif"><br><img src="/assets/legacy/images/progress_bar_blue.gif">');
			$('#habbos_loading').center();
			setTimeout(function() {
				window.location.href = "/user/home/" + username;
			}, 1000);
		}
	});
});

function disp(divs) {
	var a = [];
	for (var i = 0; i < divs.length; i++) {
		var thing = {
			"id": divs[i].getAttribute('id'),
			"y": divs[i].getAttribute('data-top'),
			"x": divs[i].getAttribute('data-left'),
			"z": divs[i].getAttribute('data-z'),
            "skin": divs[i].getAttribute('data-skin'),
            "data": divs[i].getAttribute('data-data')
		}
		a.push(thing);
	}
	return JSON.stringify(a);
}

function showMenu(selector) {
	var elem = $(selector),
        id = elem.attr('data-id');
    if($('#' + id + '-menu').hasClass('show')) {
        $('#' + id + '-menu').removeClass('show');
    } else if ($(".edit-menu").hasClass('show')) {
		$(".edit-menu").removeClass('show');
		$('#' + id + '-menu').addClass('show');
	} else {
		$('#' + id + '-menu').addClass('show');
    }
}
function changeSkin(selector, value) {
	var elem = $(selector),
		id = elem.attr('data-id');
	console.log(id)
	$('.edit-menu').removeClass('show');
	$('#' + id).fadeOut("slow", function() {
		$('#' + id).removeClass('widget_default_skin'),
			$('#' + id).removeClass('widget_bubble_skin'),
			$('#' + id).removeClass('widget_notepad_skin'),
			$('#' + id).removeClass('widget_metal_skin'),
            $('#' + id).removeClass('widget_golden_skin');
            $('#' + id).removeClass('widget_note_skin');
            $('#' + id).removeClass('widget_hcm_skin');
		$('#' + id).addClass('widget_' + value).fadeIn(1000);
		$('#' + id).attr('data-skin', value);
	});
}

function deleteElement(selector) {
	var elem = $(selector),
		id = elem.attr('data-id'),
		type = elem.attr('data-type');
	var value = JSON.stringify({
		"id": id,
		"type": type
	});
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: 'POST',
		url: '/user/home/' + username + '/delete',
		contentType: 'application/json',
		data: value,
		success: function(result) {
			if (type != 'w') {
				$('#' + id).fadeOut(200, function() {
					$(this).remove();
				});
			} else {
				$('#' + id).fadeOut(200, function() {
                    $(this).hide();
                    setTimeout(function(){
                        $('#' + id).css({
                            zIndex: 0,
                            top: 0,
                            left: 0
                        })
                    },100);
				});
			}

		}
	});
}
jQuery.fn.center = function() {
	this.css("position", "absolute");
	this.css("top", Math.max(0, (($('.store_overlay').height() - $(this).outerHeight()) / 2) +
		$('.store_overlay').scrollTop()) + "px");
	this.css("left", Math.max(0, (($('.store_overlay').width() + 10 - $(this).outerWidth()) / 2) +
		$('.store_overlay').scrollLeft()) + "px");
	return this;
}

function openTab(evt, tabName) {
	var i, tabcontent, tablinks;

	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}

function openStore(open = '') {
	$.ajax({
		type: 'GET',
		url: '/user/habblet/store',
		success: function(data) {
			$(data).hide().appendTo('body');
			$(".store").center();
			$(".store").draggable({
				containment: "body",
				cursor: 'move'
			});
			if (open == '') {
				document.getElementById("viewInventory").click();
				document.getElementById("defaultOpen").click();
			} else {
				document.getElementById("viewStore").click();
			}
		}
	}).done(function() {
		setTimeout(function() {
			$('.store_overlay').fadeIn(200);
		}, 100);
	});
}

function placeElement(selector) {
	var elem = $(selector),
		id = elem.attr('data-id'),
		name = elem.attr('data-name'),
		type = elem.attr('data-type');
	var value = JSON.stringify({
		"id": id,
		"name": name
	});
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: 'POST',
		url: '/user/home/' + username + '/add',
		contentType: 'application/json',
		data: value,
		success: function(result) {
			if (result.type == 's') {
				var t = $('<div id="' + result.id + '" data-z="' + result.z + '" data-left="' + result.x + '" data-top="' + result.y + '" class="sticker draggable" style="z-index:' + result.z + ';top:' + result.y + 'px;left:' + result.x + 'px;">');
				var i = $('<img onclick="showMenu(this)" data-id="' + result.id + '" class="icon-edit" src="/assets/legacy/images/icon_edit.gif"><img src="/assets/images/homestickers/' + result.name + '.gif">');
				var m = $('<div class="edit-menu" id="' + result.id + '-menu"><b>Settings</b><button class="deleteElement" data-id="' + result.id + '" data-type="s" onclick="deleteElement(this)">Delete</button></div>');
				$('#containment-wrapper .homepages .col-md-6').append(t);
				$('#' + result.id).hide().append(i, m);
				$(".draggable").draggable({
					containment: "#containment-wrapper",
					cursor: 'move'
				});
				$('#store_overlay').fadeOut(200, function() {
					$(this).remove();
				});
				setTimeout(function() {
					$('#' + result.id).fadeOut(200, function() {
						$('#' + result.id).fadeIn(200);
					});
				}, 500);
			} else {
                $('#' + id).hide();
				$('#store_overlay').fadeOut(200, function() {
					$(this).remove();
				});
				setTimeout(function() {
					$('#' + id).fadeOut(200, function() {
						$('#' + id).fadeIn(200);
					});
				}, 500);
			}
		}
	});
}

function storePreview(selector) {
	var elem = $(selector),
		id = elem.attr('data-id'),
		name = elem.attr('data-name'),
        type = elem.attr('data-type');
	$('.store_item.selected').removeClass('selected');
	$('.store_preview').css('display','block');
	elem.addClass('selected');
	switch (type) {
		case "b-inv":
			$('.store_image').removeClass('preview_sticker');
			$('.store_image').css('background-image', 'url(/assets/images/profile_backgrounds/' + name + ')');
			var c = $('<button onclick="previewBg(this)" data-id="' + id + '" data-name="' + name + '">Preview</button><button onclick="changeBg(this)" data-id="' + id + '" data-name="' + name + '">Change</button>');
			$('.store_controls').html(c);
			break;
		case "s-inv":
			$('.store_image').addClass('preview_sticker');
			$('.store_image').css('background-image', 'url(/assets/images/homestickers/' + name + '.gif)');
			var c = $('<button onclick="placeElement(this)" data-name="' + name + '" data-id="' + id + '">Add</button>');
			$('.store_controls').html(c);
			break;
		case "s-store":
			$('.store_image').addClass('preview_sticker');
			$('.store_image').css('background-image', 'url(/assets/images/homestickers/' + name + '.gif)');
			var c = $('<button onclick="buyElement(this)" data-name="' + name + '" data-type="s" data-id="' + id + '">Purchase</button>');
			$('.store_controls').html(c);
			break;
		case "b-store":
			$('.store_image').removeClass('preview_sticker');
			$('.store_image').css('background-image', 'url(/assets/images/profile_backgrounds/' + name + ')');
			var c = $('<button onclick="previewBg(this)" data-id="' + id + '" data-name="' + name + '">Preview</button><button onclick="buyElement(this)" data-name="' + name + '" data-type="b" data-id="' + id + '">Purchase</button>');
			$('.store_controls').html(c);
			break;
		case "w-inv":
			console.log('reached here');
			$('.store_image').addClass('preview_sticker');
			if (name == 'groups') {
				$('.store_image').css('background-image', 'url(/assets/legacy/images/groupswidget.gif)');
			} else if (name == 'rooms') {
				$('.store_image').css('background-image', 'url(/assets/legacy/images/rooms_preview.gif)');
			} else if (name == 'mybadges') {
				$('.store_image').css('background-image', 'url(/assets/legacy/images/badges_preview.gif)');
			} else if (name == 'friends') {
				$('.store_image').css('background-image', 'url(/assets/legacy/images/friends_preview.gif)');
			} else if (name == 'photo') {
				$('.store_image').css('background-image', 'url(/assets/legacy/images/photo_preview.gif)');
            }
			var c = $('<button onclick="placeElement(this)" data-id="' + id + '" data-type="w">Place</button>');
			$('.store_controls').html(c);
			break;
	}
}

function previewBg(selector) {
	var elem = $(selector),
		name = elem.attr('data-name');
	$('#store_overlay').fadeOut(200);
	setTimeout(function() {
		$('#store_overlay').fadeIn(200);
		$('.containment').css('background-image', 'url(/assets/images/profile_backgrounds/' + originalBackground + ')');
	}, 4000);
	$('.containment').css('background-image', 'url(/assets/images/profile_backgrounds/' + name + ')');
}

function changeBg(selector) {
	var elem = $(selector),
		id = elem.attr('data-id'),
		name = elem.attr('data-name');
	type = 'b'
	var value = JSON.stringify({
		"id": id,
		"name": name,
		"type": type
	});
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: 'POST',
		url: '/user/home/' + username + '/add',
		contentType: 'application/json',
		data: value,
		success: function(result) {
			$('#store_overlay').fadeOut(200, function() {
				$(this).remove();
			});
			$('.containment').css('background-image', 'url(/assets/images/profile_backgrounds/' + result.name + ')');
		}
	});
}

function buyElement(selector) {
	var elem = $(selector),
		id = elem.attr('data-id'),
		name = elem.attr('data-name'),
		type = elem.attr('data-type'),
		value = JSON.stringify({
			"id": id,
			"name": name,
			"type": type
		});
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: 'POST',
		url: '/user/home/' + username + '/buy',
		contentType: 'application/json',
		data: value,
		success: function(result) {
			if (result.status == 'success') {
                $('.store-alert').html('Purchased!');
                $('.store-alert').fadeIn(200);
                var oldCount = parseInt($('#newItemsCount').text(), 10);
                var items = oldCount + 1;
                console.log($('#newItemsCount').text())
                console.log(oldCount)
                console.log(items)
                $('#newItems').show();
                $('#newItemsCount').html(items)
				setTimeout(function() {
					$('.store-alert').fadeOut(200, function() {
						$(this).html();
					});
				}, 1000)
				if (result.type == 's') {
					$('#inventory_stickers').load('/habblet/store #Stickers');
				} else {
					$('#bg-' + id).remove();
					$('#inventory_bgs').load('/habblet/store #Backgrounds');
				}
			}
		}
	});
}
$('#sticker_cat').toggleClass('show');$(this).toggleClass('dropdown');
$(document).on("click", "#viewInventory", function() {
    document.getElementById('defaultOpen').click();
	$('#newItems').hide();$('#newItemsCount').html('0');
	$('.store_preview').css('display','none');
});
$(document).on("click", "#viewStore", function() {
	$('.store_preview').css('display','none');
});
$(document).on("click", ".close_store", function() {
    $('#store_overlay').fadeOut(200,function() {
        $(this).remove();
    });
});
$(document).on("click", "#open_store_stickers", function() {
    $('#sticker_cat').toggleClass('show');
    $(this).toggleClass('dropdown');
});
function changePhoto(selector,value) {
    var elem = $(selector),
        id = elem.attr('data-id');
        $('#' + id).attr('data-data', value);
        $('#' + id+' .image').css('background-image','url('+value+')');
        $('.edit-menu').removeClass('show');
}
function initNote(){
	$("#noteForm").submit(function(e) {
		e.preventDefault();
		var form = $(this);
		var text = $("#note_message").val();
		if(!text) {
			$("#note_message").addClass('error');
		} else {
			$.ajax({
				type: "POST",
				url: '/user/home/' + username + '/note',
				data: form.serialize(),
				success: function(result) {
					var data = nl2br(result.data);
					var w = $('<div id="' + result.id + '" data-z="' + result.z + '" data-left="' + result.x + '" data-top="' + result.y + '" class="widget_'+result.skin+' home-widget note draggable ui-draggable" style="z-index:' + result.z + ';top:' + result.y + 'px;left:' + result.x + 'px;" data-skin="'+result.skin+'" data-data="'+result.data+'"></div>');
					$('#containment-wrapper .homepages .col-md-6').append(w);
					$('#' + result.id).hide();
					var h = $('<div class="heading"><span></span></div>');
					var m = $('<div class="edit-menu" id="' + result.id + '-menu"><b>Settings</b></div>');
					var i = $('<img onclick="showMenu(this)" data-id="' + result.id + '" class="icon-edit" src="/assets/legacy/images/icon_edit.gif">');
					var d = $('<div class="body">'+data+'</div>');
					$(w).append(h,i,m,d);
					$(m).append('<select class="selectSkin" id="' + result.id + '" data-id="' + result.id + '" onkeypress="changeSkin(this,this.value)" onchange="changeSkin(this,this.value)"><option disabled="" selected="">Choose</option><option value="default_skin">Default</option><option value="bubble_skin">Speech bubble</option><option value="metal_skin">Metal</option><option value="notepad_skin">Notepad</option><option value="note_skin">Sticky Note</option><option value="golden_skin">Golden</option><option value="hcm_skin">HC Machine</option></select><button class="deleteElement" data-id="' + result.id + '" data-type="'+result.type+'" onclick="deleteElement(this)">Delete</button>');
					$(".draggable").draggable({containment: "#containment-wrapper",cursor: 'move'});
					$('#store_overlay').fadeOut(200, function() {$(this).remove();});
					setTimeout(function() {
						$('#' + result.id).fadeOut(200, function() {
							$('#' + result.id).fadeIn(200);
						});
					}, 500);
				}
			});
			return false;
		}
	});
}
function nl2br (str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
	str = str.replace('<script>','&#60;script&#62;');
	str = str.replace('</script>','&#60;/script&#62;');
	str = str.replace(/\[b\]/gi,'<b>')
	str = str.replace(/\[\/b\]/g,'</b>')
	str = str.replace(/\[i\]/g,'<i>')
	str = str.replace(/\[\/i\]/g,'</i>')
	str = str.replace(/\[\/color\]/g,'</span>')
	str = str.replace(/\[color=(.+?)\]/g,'<span style="color:$1;">');
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
function noteAddition(value) {
	var old = $('#note_message').val();
	var $txt = jQuery("#note_message");
	var caretPos = $txt[0].selectionStart;
	var textAreaTxt = $txt.val();
	var txtToAdd = '';
	if(value == 'bold') {
		txtToAdd = '[b][/b]';
	} else if(value == 'italic') {
		txtToAdd = '[i][/i]';
	} else if(value == 'colour') {
		var colour = $('#selectColour').val();
		txtToAdd = '[color='+colour+'][/color]';
	}
	$txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
}
