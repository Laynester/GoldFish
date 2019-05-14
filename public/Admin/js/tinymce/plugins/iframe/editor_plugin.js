/* Import plugin specific language pack */
tinyMCE.importPluginLanguagePack('iframe','en');

var TinyMCE_IFramePlugin = {
	getInfo : function() {
		return {
			longname : 'TinyMCE IFrame Plugin (backported)',
			author : 'Ryan Demmer / Michael Hadlich',
			authorurl : 'http://www.cellardoor.za.net',
			infourl : 'http://www.ios-solutions.de/',
			version : '1.2.1'
		};
	},

    initInstance : function(inst) {
        tinyMCE.importCSS(inst.getDoc(), tinyMCE.baseURL + "/plugins/iframe/css/content.css");
	},

    getControlHTML : function(cn) {
		switch (cn) {
			case "iframe":
				return tinyMCE.getButtonHTML(cn, 'lang_iframe_desc', tinyMCE.baseURL + '/plugins/iframe/images/iframe.gif', 'mceIFrame');
		}

		return "";
	},
	execCommand : function(editor_id, element, command, user_interface, value) {
		// Handle commands
		switch (command) {
			case "mceIFrame":
				var template = new Array();
				template['file']   = '../../plugins/iframe/iframe.htm'; // Relative to theme
				template['width']  = 480;
				template['height'] = 300;
				
				var inst = tinyMCE.getInstanceById(editor_id);
				var elm = inst.getFocusElement();
				
				//if (elm != null && tinyMCE.getAttrib(elm, 'class').indexOf('mceItem') != 0)
					//return true;

				tinyMCE.openWindow(template, {editor_id : editor_id, inline : "yes"});

				return true;
		}
		return false;
    },
    cleanup : function(type, content) {
        switch (type) {
        case "insert_to_editor":
    			var startPos = 0;
				var embedList = new Array();

				// Fix the iframe elements
				content = content.replace(new RegExp('<[ ]*iframe','gi'),'<iframe');
				content = content.replace(new RegExp('<[ ]*/iframe[ ]*>','gi'),'</iframe>');
                // Parse all iframe tags
				while ((startPos = content.indexOf('<iframe', startPos)) != -1) {
					var endPos = content.indexOf('>', startPos);
					var at = TinyMCE_IFramePlugin._parseAttributes(content.substring(startPos + 7, endPos));
                    embedList[embedList.length] = at;
                    startPos++;
                }
               	// Parse all iframe tags and replace them with images
				var index = 0;
				while ((startPos = content.indexOf('<iframe', startPos)) != -1) {
					if (index >= embedList.length)
						break;

					var at = embedList[index];

					// Find end of object
					endPos = content.indexOf('</iframe>', startPos);
					endPos += 9;

                    //Converts URLs back to absolute - Ryan Demmer 08/05/2005 (ryandemmer@gmail.com)
                    var hostURL = tinyMCE.settings['document_base_url'];
                    if ((at['src'].indexOf(hostURL, at['src']+1) != -1) || (at['src'].indexOf('http://', at['src']+1) != -1) || (at['src'].indexOf('https://', at['src']+1) != -1)){
                        at['src'] = at['src'];
                    }else{
                      at['src'] = hostURL+at['src'];
                    }
					var s = '';
					for(n in at){
						n = n.toLowerCase();
						if(n == 'src' || n == 'name' || n == 'marginwidth' || n == 'marginheight' || n == 'frameborder' || n == 'scrolling'){
							if (at[n] != null && at[n] != '')
								s += n.toLowerCase() + ':\'' + at[n] + "',";
						}
					}	
					s = s.length > 0 ? s.substring(0, s.length - 1) : s;
					var h = '<img';
						h += TinyMCE_IFramePlugin._makeAttrib('src', tinyMCE.baseURL + '/plugins/iframe/images/spacer.gif');
						//h += TinyMCE_IFramePlugin._makeAttrib('name', at['name'], 'Iframe');
						h += TinyMCE_IFramePlugin._makeAttrib('alt', s);
						h += TinyMCE_IFramePlugin._makeAttrib('title', at['title']);
						h += TinyMCE_IFramePlugin._makeAttrib('vspace', at['vspace']);
						h += TinyMCE_IFramePlugin._makeAttrib('hspace', at['hspace']);
						h += TinyMCE_IFramePlugin._makeAttrib('width', at['width'], 100);
						h += TinyMCE_IFramePlugin._makeAttrib('height', at['height'], 100);
						h += TinyMCE_IFramePlugin._makeAttrib('align', at['align']);
						h += TinyMCE_IFramePlugin._makeAttrib('id', at['id']);
						h += TinyMCE_IFramePlugin._makeAttrib('longdesc', at['longdesc']);
						h += TinyMCE_IFramePlugin._makeAttrib('style', at['style']);
						h += TinyMCE_IFramePlugin._makeAttrib('class', 'mceItemIframe');
						h += ' />';
						
                    // Insert image
    				var contentAfter = content.substring(endPos);
    				content = content.substring(0, startPos);
    				content += h;
                    content += contentAfter;
    				index++;

    				startPos++;
                }
    			break;

    		case "get_from_editor":
    			// Parse all img tags and replace them with iframe
    			var startPos = -1;
    			while ((startPos = content.indexOf('<img', startPos+1)) != -1) {
    				var endPos = content.indexOf('/>', startPos);
    				var at = TinyMCE_IFramePlugin._parseAttributes(content.substring(startPos + 4, endPos));

                    if(at['class'] != 'mceItemIframe')
                        continue;

        			endPos += 2;

                    var embedHTML = '';					
					// Parse attributes
					at['alt'] = at['alt'].replace(/&#39;/g, "'").replace(/&#quot;/g, '"');
					p = eval('x={' + at['alt'] + '};');
					
					var h = '';
					h += '<iframe';
					h += typeof(p['src']) != "undefined" ? ' src="' + p['src'] + '"' : '';
					h += typeof(p['marginwidth']) != "undefined" ? ' marginwidth="' + p['marginwidth'] + '"' : '';
					h += typeof(p['marginheight']) != "undefined" ? ' marginheight="' + p['marginheight'] + '"' : '';
					h += typeof(p['frameborder']) != "undefined" ? ' frameborder="' + p['frameborder'] + '"' : '';
					h += typeof(p['scrolling']) != "undefined" ? ' scrolling="' + p['scrolling'] + '"' : '';
					h += typeof(p['classlist']) != "undefined" ? ' class="' + p['classlist'] + '"' : '';
					h += typeof(p['name']) != "undefined" ? ' name="' + p['name'] + '"' : '';
										
					h += TinyMCE_IFramePlugin._makeAttrib('title', at['title']);
					h += TinyMCE_IFramePlugin._makeAttrib('vspace', at['vspace']);
					h += TinyMCE_IFramePlugin._makeAttrib('hspace', at['hspace']);
					h += TinyMCE_IFramePlugin._makeAttrib('width', at['width'], 100);
					h += TinyMCE_IFramePlugin._makeAttrib('height', at['height'], 100);
					h += TinyMCE_IFramePlugin._makeAttrib('align', at['align']);
					h += TinyMCE_IFramePlugin._makeAttrib('id', at['id']);
					h += TinyMCE_IFramePlugin._makeAttrib('longdesc', at['longdesc']);
					h += TinyMCE_IFramePlugin._makeAttrib('style', at['style']);
					h += '></iframe>';
					
                    // Insert embed/object chunk
    				chunkBefore = content.substring(0, startPos);
    				chunkAfter = content.substring(endPos);
    				content = chunkBefore + h + chunkAfter;
    			}
    			break;
    	}
    	// Pass through to next handler in chain
    	return content;
    },
    handleNodeChange : function(editor_id, node, undo_index, undo_levels, visual_aid, any_selection) {
		if (node == null)
			return;

		do {
			if (node.nodeName == "IMG" && tinyMCE.getAttrib(node, 'class').indexOf('mceItemIframe') == 0){
				tinyMCE.switchClass(editor_id + '_iframe', 'mceButtonSelected');
				return true;
			}
		} while ((node = node.parentNode));

		tinyMCE.switchClass(editor_id + '_iframe', 'mceButtonNormal');

		return true;
	},
	// Private plugin internal functions
	_makeAttrib : function(attrib, value, def) {	
		if (typeof(value) == "undefined" || value == null) {
			value = "";
		}
		if(value == "" && def){
			value = def;
		}
		if(attrib == "align"){
			value = ( value == "left" || value == "right" ) ? "" : value;	
		}
	
		if (value == "")
			return "";
			
		return ' ' + attrib + '="' + value + '"';
	},
	_parseAttributes : function(attribute_string) {
		var attributeName = "", endChr = '"';
		var attributeValue = "";
		var withInName;
		var withInValue;
		var attributes = new Array();
		var whiteSpaceRegExp = new RegExp('^[ \n\r\t]+', 'g');

		if (attribute_string == null || attribute_string.length < 2)
			return null;

		withInName = withInValue = false;

		for (var i=0; i<attribute_string.length; i++) {
			var chr = attribute_string.charAt(i);

			if ((chr == '"' || chr == "'") && !withInValue) {
				withInValue = true;
				endChr = chr;
			} else if (chr == endChr && withInValue) {
				withInValue = false;

				var pos = attributeName.lastIndexOf(' ');
				if (pos != -1)
					attributeName = attributeName.substring(pos+1);

				attributes[attributeName.toLowerCase()] = attributeValue.substring(1);

				attributeName = "";
				attributeValue = "";
			} else if (!whiteSpaceRegExp.test(chr) && !withInName && !withInValue)
				withInName = true;

			if (chr == '=' && withInName)
				withInName = false;

			if (withInName)
				attributeName += chr;

			if (withInValue)
				attributeValue += chr;
		}

		return attributes;
	},
	_getValue : function(value, def) {
        if (value == "undefined" || value == null || value == "") {
            value = def;
        }
        return value;
    }
};

tinyMCE.addPlugin("iframe", TinyMCE_IFramePlugin);
