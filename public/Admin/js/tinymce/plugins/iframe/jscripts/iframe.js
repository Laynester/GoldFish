function init() {
	tinyMCEPopup.resizeToInnerSize();
	var pl = "", f = document.forms[0];
	var inst = tinyMCE.getInstanceById(tinyMCE.getWindowArg('editor_id'));
	var el = inst.getFocusElement();
	var action = "insert";
	
	if (el != null && el.nodeName == "IMG")
		action = "update";
		
	f.insert.value = tinyMCE.getLang('lang_' + action, 'Insert', true);
	
	if(action == "update"){		
		f.vspace.value = tinyMCE.getAttrib(el, 'vspace') || trimSize(getStyle(el, 'marginTop')) || trimSize(getStyle(el, 'marginBottom'));
		f.hspace.value = tinyMCE.getAttrib(el, 'hspace') || trimSize(getStyle(el, 'margiLeft')) || trimSize(getStyle(el, 'marginRight'));
	
		f.width.value = f.tmp_width.value = parseInt(tinyMCE.getAttrib(el, 'width')) || trimSize(getStyle(el, 'width'));
		f.height.value = f.tmp_height.value = parseInt(tinyMCE.getAttrib(el, 'height')) || trimSize(getStyle(el, 'height'));
		
		f.title.value = tinyMCE.getAttrib(el, 'title');
		f.id.value = tinyMCE.getAttrib(el, 'id');
		
		pl = "x={" + tinyMCE.getAttrib(el, 'alt') + "};";
		if (pl != "") {
			pl = eval(pl);	
			setStr(pl, 'name');
			setStr(pl, 'src');
			setStr(pl, 'marginwidth');
			setStr(pl, 'marginheight');
			setStr(pl, 'frameborder');
			setStr(pl, 'scrolling');
		}
		selectByValue(f, 'align', tinyMCE.getAttrib(el, 'align') || trimSize(getStyle(el, 'float')));
		updateStyle();
	}
}
function setStr(pl, n) {
	var f = document.forms[0], e = f.elements[n];

	if (typeof(pl[n]) == "undefined")
		return;

	if (e.type == "text")
		e.value = pl[n];
	else
		selectByValue(f, n, pl[n]);
}
function getStr(n, d) {
	var el = document.forms[0].elements[n];
	var v = el.type == "text" ? el.value : el.options[el.selectedIndex].value;

	return ((n == d || v == '') ? '' : n + ":'" + jsEncode(v) + "',");
}
function getInt(n, d) {
	var e = document.forms[0].elements[n];
	var v = e.type == "text" ? e.value : e.options[e.selectedIndex].value;

	return ((n == d || v == '') ? '' : n + ":" + v.replace(/[^0-9]+/g, '') + ",");
}
function jsEncode(s) {
	s = s.replace(new RegExp('\\\\', 'g'), '\\\\');
	s = s.replace(new RegExp('"', 'g'), '\\"');
	s = s.replace(new RegExp("'", 'g'), "\\'");

	return s;
}
function serializeParameters() {
	var d = document, f = d.forms[0], s = '';
	s += getStr('name');
	s += getStr('src');
	s += getInt('marginwidth');
	s += getInt('marginwidth');
	s += getInt('frameborder');
	s += getStr('scrolling');
	s = s.length > 0 ? s.substring(0, s.length - 1) : s;
	return s;	
}
function insertIFrame() {	
	var f = document.forms[0];
	var inst = tinyMCE.getInstanceById(tinyMCE.getWindowArg('editor_id'));
	var elm = inst.getFocusElement();
	var src = f.src.value;
	
	if(!src){
        alert(tinyMCE.getLang('lang_iframe_no_src', '', true));
        return;
    }
	
	var alt = serializeParameters();	
	var spacer = tinyMCE.getParam('document_base_url') + '/mambots/editors/jce/jscripts/tiny_mce/libraries/images/spacer.gif';

	if (elm != null && elm.nodeName == "IMG") {
		setAttrib(elm, 'src', spacer);
		setAttrib(elm, 'mce_src', spacer);
		setAttrib(elm, 'alt', alt);
		setAttrib(elm, 'title');
		//setAttrib(elm, 'vspace');
		//setAttrib(elm, 'hspace');
		setAttrib(elm, 'width');
		setAttrib(elm, 'height');
		setAttrib(elm, 'id');
		setAttrib(elm, 'longdesc');
		setAttrib(elm, 'style');
		setAttrib(elm, 'class', 'mceItemIframe');
		
		var align = getSelectValue(f, 'align');
		
		if(align == 'left' || align == 'right'){
			setAttrib(elm, 'align','');	
		}else{
			setAttrib(elm, 'align', align);
		}

		// Refresh in old MSIE
		if (tinyMCE.isMSIE5)
			elm.outerHTML = elm.outerHTML;
	} else {
		var html = "<img";

		html += makeAttrib('src', spacer);
		html += makeAttrib('mce_src', spacer);
		html += makeAttrib('alt', alt);
		html += makeAttrib('title');
		html += makeAttrib('border');
		//html += makeAttrib('vspace');
		//html += makeAttrib('hspace');
		html += makeAttrib('width');
		html += makeAttrib('height');
		html += makeAttrib('id');
		html += makeAttrib('longdesc');
		html += makeAttrib('style');
		html += makeAttrib('class', 'mceItemIframe');
		html += makeAttrib('align', getSelectValue(f, 'align'));
		html += " />";

		tinyMCEPopup.execCommand("mceInsertContent", false, html);
	}
	tinyMCEPopup.close();
}
function setAttrib(elm, attrib, value) {
	var f = document.forms[0];
	var valueElm = f.elements[attrib];

	if (typeof(value) == "undefined" || value == null) {
		value = "";

		if (valueElm)
			value = valueElm.value;
	}

	if (value != "") {
		elm.setAttribute(attrib, value);

		if (attrib == "style")
			attrib = "style.cssText";

		if (attrib == "longdesc")
			attrib = "longDesc";

		if (attrib == "width") {
			attrib = "style.width";
			value = value + "px";
		}
		if (attrib == "height") {
			attrib = "style.height";
			value = value + "px";
		}

		if (attrib == "class")
			attrib = "className";

		eval('elm.' + attrib + "=value;");
	} else
		elm.removeAttribute(attrib);
}
function makeAttrib(attrib, value) {
	var d = document, f = d.forms[0];
	var valueElm = f.elements[attrib];

	if (typeof(value) == "undefined" || value == null) {
		value = "";

		if (valueElm)
			value = valueElm.value;
	}
	
	if(attrib == "align"){
		value = ( value == "left" || value == "right" ) ? "" : value;	
	}

	if (value == "")
		return "";

	// XML encode it
	value = value.replace(/&/g, '&amp;');
	value = value.replace(/\"/g, '&quot;');
	value = value.replace(/</g, '&lt;');
	value = value.replace(/>/g, '&gr;');

	return ' ' + attrib + '="' + value + '"';
}
function updateStyle() {
	var f = document.forms[0];
	var st = tinyMCE.parseStyle(f.style.value);

	st['width'] = f.width.value == '' ? '' : f.width.value + "px";
	st['height'] = f.height.value == '' ? '' : f.height.value + "px";
	
	if(getSelectValue(f, 'align') == 'left' || getSelectValue(f, 'align') == 'right'){
		st['float'] = getSelectValue(f, 'align');	
	}else{
		st['float'] = '';	
	}				
	if(parseInt(f.vspace.value) == 0){
		st['margin-top'] = st['margin-bottom'] = '';
	}else{
		st['margin-top'] = st['margin-bottom'] = f.vspace.value + 'px';
	}
	if(parseInt(f.hspace.value) == 0){
		st['margin-left'] = st['margin-right'] = '';	
	}else{
		st['margin-left'] = st['margin-right'] = f.hspace.value + 'px';	
	}
	f.style.value = tinyMCE.serializeStyle(st);
}
function changeHeight() {
	var f = document.forms[0];

    if( !f.constrain.checked || f.tmp_height.value == "")
        return;

    if (f.width.value == "" || f.height.value == "")
		return;

	var temp = (f.width.value / f.tmp_width.value) *f.tmp_height.value;
	f.height.value = temp.toFixed(0);
}

function changeWidth() {
	var f = document.forms[0];

    if( !f.constrain.checked || f.tmp_width.value == "")
        return;

    if (f.width.value == "" || f.height.value == "")
		return;

	var temp = (f.height.value / f.tmp_height.value) * f.tmp_width.value;
	f.width.value = temp.toFixed(0);
}
