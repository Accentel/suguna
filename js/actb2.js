function actb2(obj,ca){
	
	/* ---- Public Variables ---- */
	this.actb2_timeOut = -1; // Autocomplete Timeout in ms (-1: autocomplete never time out)
	this.actb2_lim = 5;    // Number of elements autocomplete can show (-1: no limit)
	this.actb2_firstText = true; // should the auto complete be limited to the beginning of keyword?
	this.actb2_mouse = true; // Enable Mouse Support
	this.actb2_delimiter = new Array(';',',');  // Delimiter for multiple autocomplete. Set it to empty array for single autocomplete
	this.actb2_startcheck = 1; // Show widget only after this number of characters is typed in.
	/* ---- Public Variables ---- */

	/* --- Styles --- */
	this.actb2_bgColor ='#D8FBF8';//'#5CE3D9';// '#888888';
	//this.actb2_borderColor ='red';//'#5CE3D9';// '#888888';

	this.actb2_textColor ='#FF6600' ;//'#339999';//'#FF6600' ;//'#FFFFFF';
	this.actb2_tColor = 'green';
	this.actb2_hColor ='#B7E2DF';//'#B7E2DF';// '#000000';
	this.actb2_fFamily = 'Arial';
	this.actb2_fSize = '12px';
	/**/this.actb2_nextSize = '10px';
	this.actb2_hStyle = 'text-decoration:underline;font-weight="bold"';
	/* --- Styles --- */

	/* ---- Private Variables ---- */
	var actb2_delimwords = new Array();
	var actb2_cdelimword = 0;
	var actb2_delimchar = new Array();
	var actb2_display = false;
	var actb2_pos = 0;
	var actb2_total = 0;
	var actb2_curr = null;
	var actb2_rangeu = 0;
	var actb2_ranged = 0;
	var actb2_bool = new Array();
	var actb2_pre = 0;
	var actb2_toid;
	var actb2_tomake = false;
	var actb2_getpre = "";
	var actb2_mouse_on_list = 1;
	var actb2_kwcount = 0;
	var actb2_caretmove = false;
	this.actb2_keywords = new Array();
	/* ---- Private Variables---- */
	
	this.actb2_keywords = ca;
	var actb2_self = this;
//alert(actb2_keywords.length)
	actb2_curr = obj;
	
	addEvent(actb2_curr,"focus",actb2_setup);
	function actb2_setup(){
		addEvent(document,"keydown",actb2_checkkey);
		addEvent(actb2_curr,"blur",actb2_clear);
		addEvent(document,"keypress",actb2_keypress);
	}

	function actb2_clear(evt){
		if (!evt) evt = event;
		removeEvent(document,"keydown",actb2_checkkey);
		removeEvent(actb2_curr,"blur",actb2_clear);
		removeEvent(document,"keypress",actb2_keypress);
		actb2_removedisp();
	}
	function actb2_parse(n){
		if (actb2_self.actb2_delimiter.length > 0){
			var t = actb2_delimwords[actb2_cdelimword].trim().addslashes();
			var plen = actb2_delimwords[actb2_cdelimword].trim().length;
		}else{
			var t = actb2_curr.value.addslashes();
			var plen = actb2_curr.value.length;
		}
		var tobuild = '';
		var i;

		if (actb2_self.actb2_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}
		var p = n.search(re);
				
		for (i=0;i<p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "<font style='"+(actb2_self.actb2_hStyle)+"'>"
		for (i=p;i<plen+p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "</font>";
			for (i=plen+p;i<n.length;i++){
			tobuild += n.substr(i,1);
		}
		return tobuild;
	}
	function actb2_generate(){
		if (document.getElementById('tat_table')){ actb2_display = false;document.body.removeChild(document.getElementById('tat_table')); } 
		if (actb2_kwcount == 0){
			actb2_display = false;
			return;
		}
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		//a.border='1px';
		a.width='18.5%';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb2_curr) + actb2_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb2_curr) + "px";
		a.style.backgroundColor=actb2_self.actb2_bgColor;
//		a.style.bordercolor=actb2_self.actb2_borderColor;
		a.style.border='1px solid #5CE3D9';
		
		a.id = 'tat_table';
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb2_self.actb2_mouse){
			a.onmouseout = actb2_table_unfocus;
			a.onmouseover = actb2_table_focus;
		}
		var counter = 0;
		for (i=0;i<actb2_self.actb2_keywords.length;i++){
			if (actb2_bool[i]){
				counter++;
				r = a.insertRow(-1);
				if (first && !actb2_tomake){
					r.style.backgroundColor = actb2_self.actb2_hColor;
					first = false;
					actb2_pos = counter;
				}else if(actb2_pre == i){
					r.style.backgroundColor = actb2_self.actb2_hColor;
					first = false;
					actb2_pos = counter;
				}else{
					r.style.backgroundColor = actb2_self.actb2_bgColor;
				}
				r.id = 'tat_tr'+(j);
				c = r.insertCell(-1);
				c.style.color = actb2_self.actb2_textColor;
				c.style.fontFamily = actb2_self.actb2_fFamily;
				c.style.fontSize = actb2_self.actb2_fSize;
				//c.align='center';
				c.innerHTML = actb2_parse(actb2_self.actb2_keywords[i]);
				c.id = 'tat_td'+(j);
				c.setAttribute('pos',j);
				if (actb2_self.actb2_mouse){
					c.style.cursor = 'pointer';
					c.onclick=actb2_mouseclick;
					c.onmouseover = actb2_table_highlight;
				}
				j++;
			}
			if (j - 1 == actb2_self.actb2_lim && j < actb2_total){
				r = a.insertRow(-1);
			r.style.backgroundColor = actb2_self.actb2_bgColor;
				c = r.insertCell(-1);
			/*new code*/	c.style.color = actb2_self.actb2_tColor;
				c.style.fontFamily = 'verdana';
				c.style.fontSize = actb2_self.actb2_nextSize;
				c.align='right';
				replaceHTML(c,'next >>');
				if (actb2_self.actb2_mouse){
					c.style.cursor = 'pointer';
					c.onclick = actb2_mouse_down;
				}
				break;
			}
		}
		actb2_rangeu = 1;
		actb2_ranged = j-1;
		actb2_display = true;
		if (actb2_pos <= 0) actb2_pos = 1;
	}
	function actb2_remake(){
		document.body.removeChild(document.getElementById('tat_table'));
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		a.width='18.5%';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb2_curr) + actb2_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb2_curr) + "px";
		a.style.backgroundColor=actb2_self.actb2_bgColor;
		a.style.border='1px solid #5CE3D9';
		a.id = 'tat_table';
		if (actb2_self.actb2_mouse){
			a.onmouseout= actb2_table_unfocus;
			a.onmouseover=actb2_table_focus;
		}
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb2_rangeu > 1){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb2_self.actb2_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb2_self.actb2_tColor;
			c.style.fontFamily ='verdana';
			c.style.fontSize = actb2_self.actb2_nextSize;
			c.align='left';
			replaceHTML(c,'<< previous');
			if (actb2_self.actb2_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb2_mouse_up;
			}
		}
		for (i=0;i<actb2_self.actb2_keywords.length;i++){
			if (actb2_bool[i]){
				if (j >= actb2_rangeu && j <= actb2_ranged){
					r = a.insertRow(-1);
					r.style.backgroundColor = actb2_self.actb2_bgColor;
					r.id = 'tat_tr'+(j);
					c = r.insertCell(-1);
					c.style.color = actb2_self.actb2_textColor;
					c.style.fontFamily = actb2_self.actb2_fFamily;
					c.style.fontSize = actb2_self.actb2_fSize;
					c.innerHTML = actb2_parse(actb2_self.actb2_keywords[i]);
					c.id = 'tat_td'+(j);
					c.setAttribute('pos',j);
					if (actb2_self.actb2_mouse){
						c.style.cursor = 'pointer';
						c.onclick=actb2_mouseclick;
						c.onmouseover = actb2_table_highlight;
					}
					j++;
				}else{
					j++;
				}
			}
			if (j > actb2_ranged) break;
		}
		if (j-1 < actb2_total){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb2_self.actb2_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb2_self.actb2_tColor;
			c.style.fontFamily = 'verdana';
			c.style.fontSize = actb2_self.actb2_nextSize;
			c.align='right';
			replaceHTML(c,'next >>');
			if (actb2_self.actb2_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb2_mouse_down;
			}
		}
	}
	function actb2_goup(){
		if (!actb2_display) return;
		if (actb2_pos == 1) return;
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_bgColor;
		actb2_pos--;
		if (actb2_pos < actb2_rangeu) actb2_moveup();
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_hColor;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list=0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	function actb2_godown(){
		if (!actb2_display) return;
		if (actb2_pos == actb2_total) return;
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_bgColor;
		actb2_pos++;
		if (actb2_pos > actb2_ranged) actb2_movedown();
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_hColor;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list=0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	function actb2_movedown(){
		actb2_rangeu++;
		actb2_ranged++;
		actb2_remake();
	}
	function actb2_moveup(){
		actb2_rangeu--;
		actb2_ranged--;
		actb2_remake();
	}

	/* Mouse */
	function actb2_mouse_down(){
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_bgColor;
		actb2_pos++;
		actb2_movedown();
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_hColor;
		actb2_curr.focus();
		actb2_mouse_on_list = 0;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list=0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	function actb2_mouse_up(evt){
		if (!evt) evt = event;
		if (evt.stopPropagation){
			evt.stopPropagation();
		}else{
			evt.cancelBubble = true;
		}
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_bgColor;
		actb2_pos--;
		actb2_moveup();
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_hColor;
		actb2_curr.focus();
		actb2_mouse_on_list = 0;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list=0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	function actb2_mouseclick(evt){
		if (!evt) evt = event;
		if (!actb2_display) return;
		actb2_mouse_on_list = 0;
		actb2_pos = this.getAttribute('pos');
		actb2_penter();
	}
	function actb2_table_focus(){
		actb2_mouse_on_list = 1;
	}
	function actb2_table_unfocus(){
		actb2_mouse_on_list = 0;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list = 0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	function actb2_table_highlight(){
		actb2_mouse_on_list = 1;
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_bgColor;
		actb2_pos = this.getAttribute('pos');
		while (actb2_pos < actb2_rangeu) actb2_moveup();
		while (actb2_pos > actb2_ranged) actb2_movedown();
		document.getElementById('tat_tr'+actb2_pos).style.backgroundColor = actb2_self.actb2_hColor;
		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list = 0;actb2_removedisp();},actb2_self.actb2_timeOut);
	}
	/* ---- */

	function actb2_insertword(a){
		if (actb2_self.actb2_delimiter.length > 0){
			str = '';
			l=0;
			for (i=0;i<actb2_delimwords.length;i++){
				if (actb2_cdelimword == i){
					prespace = postspace = '';
					gotbreak = false;
					for (j=0;j<actb2_delimwords[i].length;++j){
						if (actb2_delimwords[i].charAt(j) != ' '){
							gotbreak = true;
							break;
						}
						prespace += ' ';
					}
					for (j=actb2_delimwords[i].length-1;j>=0;--j){
						if (actb2_delimwords[i].charAt(j) != ' ') break;
						postspace += ' ';
					}
					str += prespace;
					str += a;
					l = str.length;
					if (gotbreak) str += postspace;
				}else{
					str += actb2_delimwords[i];
				}
				if (i != actb2_delimwords.length - 1){
					str += actb2_delimchar[i];
				}
			}
			actb2_curr.value = str;
			setCaret(actb2_curr,l);
		}else{
			actb2_curr.value = a;
		}
		actb2_mouse_on_list = 0;
		actb2_removedisp();
	}
	function actb2_penter(){
		if (!actb2_display) return;
		actb2_display = false;
		var word = '';
		var c = 0;
		for (var i=0;i<=actb2_self.actb2_keywords.length;i++){
			if (actb2_bool[i]) c++;
			if (c == actb2_pos){
				word = actb2_self.actb2_keywords[i];
				break;
			}
		}
		actb2_insertword(word);
		l = getCaretStart(actb2_curr);
	}
	function actb2_removedisp(){
		if (actb2_mouse_on_list==0){
			actb2_display = 0;
			if (document.getElementById('tat_table')){ document.body.removeChild(document.getElementById('tat_table')); }
			if (actb2_toid) clearTimeout(actb2_toid);
		}
	}
	function actb2_keypress(e){
		if (actb2_caretmove) stopEvent(e);
		return !actb2_caretmove;
	}
	function actb2_checkkey(evt){
		if (!evt) evt = event;
		a = evt.keyCode;
		caret_pos_start = getCaretStart(actb2_curr);
		actb2_caretmove = 0;
		switch (a){
			case 38:
				actb2_goup();
				actb2_caretmove = 1;
				return false;
				break;
			case 40:
				actb2_godown();
				actb2_caretmove = 1;
				return false;
				break;
			case 13: case 9:
				if (actb2_display){
					actb2_caretmove = 1;
					actb2_penter();
					return false;
				}else{
					return true;
				}
				break;
			default:
				setTimeout(function(){actb2_tocomplete(a)},50);
				break;
		}
	}

	function actb2_tocomplete(kc){
		if (kc == 38 || kc == 40 || kc == 13) return;
		var i;
		if (actb2_display){ 
			var word = 0;
			var c = 0;
			for (var i=0;i<=actb2_self.actb2_keywords.length;i++){
				if (actb2_bool[i]) c++;
				if (c == actb2_pos){
					word = i;
					break;
				}
			}
			actb2_pre = word;
		}else{ actb2_pre = -1};
		
		if (actb2_curr.value == ''){
			actb2_mouse_on_list = 0;
			actb2_removedisp();
			return;
		}
		if (actb2_self.actb2_delimiter.length > 0){
			caret_pos_start = getCaretStart(actb2_curr);
			caret_pos_end = getCaretEnd(actb2_curr);
			
			delim_split = '';
			for (i=0;i<actb2_self.actb2_delimiter.length;i++){
				delim_split += actb2_self.actb2_delimiter[i];
			}
			delim_split = delim_split.addslashes();
			delim_split_rx = new RegExp("(["+delim_split+"])");
			c = 0;
			actb2_delimwords = new Array();
			actb2_delimwords[0] = '';
			for (i=0,j=actb2_curr.value.length;i<actb2_curr.value.length;i++,j--){
				if (actb2_curr.value.substr(i,j).search(delim_split_rx) == 0){
					ma = actb2_curr.value.substr(i,j).match(delim_split_rx);
					actb2_delimchar[c] = ma[1];
					c++;
					actb2_delimwords[c] = '';
				}else{
					actb2_delimwords[c] += actb2_curr.value.charAt(i);
				}
			}

			var l = 0;
			actb2_cdelimword = -1;
			for (i=0;i<actb2_delimwords.length;i++){
				if (caret_pos_end >= l && caret_pos_end <= l + actb2_delimwords[i].length){
					actb2_cdelimword = i;
				}
				l+=actb2_delimwords[i].length + 1;
			}
			var ot = actb2_delimwords[actb2_cdelimword].trim(); 
			var t = actb2_delimwords[actb2_cdelimword].addslashes().trim();
		}else{
			var ot = actb2_curr.value;
			var t = actb2_curr.value.addslashes();
		}
		if (ot.length == 0){
			actb2_mouse_on_list = 0;
			actb2_removedisp();
		}
		if (ot.length < actb2_self.actb2_startcheck) return this;
		if (actb2_self.actb2_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}

		actb2_total = 0;
		actb2_tomake = false;
		actb2_kwcount = 0;
		for (i=0;i<actb2_self.actb2_keywords.length;i++){
			actb2_bool[i] = false;
			if (re.test(actb2_self.actb2_keywords[i])){
				actb2_total++;
				actb2_bool[i] = true;
				actb2_kwcount++;
				if (actb2_pre == i) actb2_tomake = true;
			}
		}

		if (actb2_toid) clearTimeout(actb2_toid);
		if (actb2_self.actb2_timeOut > 0) actb2_toid = setTimeout(function(){actb2_mouse_on_list = 0;actb2_removedisp();},actb2_self.actb2_timeOut);
		actb2_generate();
	}
	return this;
}