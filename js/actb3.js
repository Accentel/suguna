function actb3(obj,ca){
	/* ---- Public Variables ---- */
	this.actb3_timeOut = -1; // Autocomplete Timeout in ms (-1: autocomplete never time out)
	this.actb3_lim = 5;    // Number of elements autocomplete can show (-1: no limit)
	this.actb3_firstText = true; // should the auto complete be limited to the beginning of keyword?
	this.actb3_mouse = true; // Enable Mouse Support
	this.actb3_delimiter = new Array(';',',');  // Delimiter for multiple autocomplete. Set it to empty array for single autocomplete
	this.actb3_startcheck = 1; // Show widget only after this number of characters is typed in.
	/* ---- Public Variables ---- */

	/* --- Styles --- */
	this.actb3_bgColor ='#E1C4FF';// '#888888';
	this.actb3_textColor = '#000000';//'#FFFFFF';
	this.actb3_tColor = '#E1C4FF';
	this.actb3_hColor ='#E1C4FF';// '#000000';
	this.actb3_fFamily = 'Arial';
	this.actb3_fSize = '12px';
	/**/this.actb3_nextSize = '12px';
	this.actb3_hStyle = 'text-decoration:underline;font-weight="bold"';
	/* --- Styles --- */

	/* ---- Private Variables ---- */
	var actb3_delimwords = new Array();
	var actb3_cdelimword = 0;
	var actb3_delimchar = new Array();
	var actb3_display = false;
	var actb3_pos = 0;
	var actb3_total = 0;
	var actb3_curr = null;
	var actb3_rangeu = 0;
	var actb3_ranged = 0;
	var actb3_bool = new Array();
	var actb3_pre = 0;
	var actb3_toid;
	var actb3_tomake = false;
	var actb3_getpre = "";
	var actb3_mouse_on_list = 1;
	var actb3_kwcount = 0;
	var actb3_caretmove = false;
	this.actb3_keywords = new Array();
	/* ---- Private Variables---- */
	
	this.actb3_keywords = ca;
	var actb3_self = this;
//alert(actb3_keywords.length)
	actb3_curr = obj;
	
	addEvent(actb3_curr,"focus",actb3_setup);
	function actb3_setup(){
		addEvent(document,"keydown",actb3_checkkey);
		addEvent(actb3_curr,"blur",actb3_clear);
		addEvent(document,"keypress",actb3_keypress);
	}

	function actb3_clear(evt){
		if (!evt) evt = event;
		removeEvent(document,"keydown",actb3_checkkey);
		removeEvent(actb3_curr,"blur",actb3_clear);
		removeEvent(document,"keypress",actb3_keypress);
		actb3_removedisp();
	}
	function actb3_parse(n){
		if (actb3_self.actb3_delimiter.length > 0){
			var t = actb3_delimwords[actb3_cdelimword].trim().addslashes();
			var plen = actb3_delimwords[actb3_cdelimword].trim().length;
		}else{
			var t = actb3_curr.value.addslashes();
			var plen = actb3_curr.value.length;
		}
		var tobuild = '';
		var i;

		if (actb3_self.actb3_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}
		var p = n.search(re);
				
		for (i=0;i<p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "<font style='"+(actb3_self.actb3_hStyle)+"'>"
		for (i=p;i<plen+p;i++){
			tobuild += n.substr(i,1);
		}
		tobuild += "</font>";
			for (i=plen+p;i<n.length;i++){
			tobuild += n.substr(i,1);
		}
		return tobuild;
	}
	function actb3_generate(){
		if (document.getElementById('tat_table')){ actb3_display = false;document.body.removeChild(document.getElementById('tat_table')); } 
		if (actb3_kwcount == 0){
			actb3_display = false;
			return;
		}
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		a.width='15%';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb3_curr) + actb3_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb3_curr) + "px";
		a.style.backgroundColor=actb3_self.actb3_bgColor;
		
		a.id = 'tat_table';
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb3_self.actb3_mouse){
			a.onmouseout = actb3_table_unfocus;
			a.onmouseover = actb3_table_focus;
		}
		var counter = 0;
		for (i=0;i<actb3_self.actb3_keywords.length;i++){
			if (actb3_bool[i]){
				counter++;
				r = a.insertRow(-1);
				if (first && !actb3_tomake){
					r.style.backgroundColor = actb3_self.actb3_hColor;
					first = false;
					actb3_pos = counter;
				}else if(actb3_pre == i){
					r.style.backgroundColor = actb3_self.actb3_hColor;
					first = false;
					actb3_pos = counter;
				}else{
					r.style.backgroundColor = actb3_self.actb3_bgColor;
				}
				r.id = 'tat_tr'+(j);
				c = r.insertCell(-1);
				c.style.color = actb3_self.actb3_textColor;
				c.style.fontFamily = actb3_self.actb3_fFamily;
				c.style.fontSize = actb3_self.actb3_fSize;
				//c.align='center';
				c.innerHTML = actb3_parse(actb3_self.actb3_keywords[i]);
				c.id = 'tat_td'+(j);
				c.setAttribute('pos',j);
				if (actb3_self.actb3_mouse){
					c.style.cursor = 'pointer';
					c.onclick=actb3_mouseclick;
					c.onmouseover = actb3_table_highlight;
				}
				j++;
			}
			if (j - 1 == actb3_self.actb3_lim && j < actb3_total){
				r = a.insertRow(-1);
			r.style.backgroundColor = actb3_self.actb3_bgColor;
				c = r.insertCell(-1);
			/*new code*/	c.style.color = actb3_self.actb3_tColor;
				c.style.fontFamily = 'arial narrow';
				c.style.fontSize = actb3_self.actb3_nextSize;
				c.align='right';
				replaceHTML(c,'next >>');
				if (actb3_self.actb3_mouse){
					c.style.cursor = 'pointer';
					c.onclick = actb3_mouse_down;
				}
				break;
			}
		}
		actb3_rangeu = 1;
		actb3_ranged = j-1;
		actb3_display = true;
		if (actb3_pos <= 0) actb3_pos = 1;
	}
	function actb3_remake(){
		document.body.removeChild(document.getElementById('tat_table'));
		a = document.createElement('table');
		a.cellSpacing='1px';
		a.cellPadding='2px';
		a.width='15%';
		a.style.position='absolute';
		a.style.top = eval(curTop(actb3_curr) + actb3_curr.offsetHeight) + "px";
		a.style.left = curLeft(actb3_curr) + "px";
		a.style.backgroundColor=actb3_self.actb3_bgColor;
		a.id = 'tat_table';
		if (actb3_self.actb3_mouse){
			a.onmouseout= actb3_table_unfocus;
			a.onmouseover=actb3_table_focus;
		}
		document.body.appendChild(a);
		var i;
		var first = true;
		var j = 1;
		if (actb3_rangeu > 1){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb3_self.actb3_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb3_self.actb3_tColor;
			c.style.fontFamily = 'arial narrow';
			c.style.fontSize = actb3_self.actb3_nextSize;
			c.align='left';
			replaceHTML(c,'<< previous');
			if (actb3_self.actb3_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb3_mouse_up;
			}
		}
		for (i=0;i<actb3_self.actb3_keywords.length;i++){
			if (actb3_bool[i]){
				if (j >= actb3_rangeu && j <= actb3_ranged){
					r = a.insertRow(-1);
					r.style.backgroundColor = actb3_self.actb3_bgColor;
					r.id = 'tat_tr'+(j);
					c = r.insertCell(-1);
					c.style.color = actb3_self.actb3_textColor;
					c.style.fontFamily = actb3_self.actb3_fFamily;
					c.style.fontSize = actb3_self.actb3_fSize;
					c.innerHTML = actb3_parse(actb3_self.actb3_keywords[i]);
					c.id = 'tat_td'+(j);
					c.setAttribute('pos',j);
					if (actb3_self.actb3_mouse){
						c.style.cursor = 'pointer';
						c.onclick=actb3_mouseclick;
						c.onmouseover = actb3_table_highlight;
					}
					j++;
				}else{
					j++;
				}
			}
			if (j > actb3_ranged) break;
		}
		if (j-1 < actb3_total){
			r = a.insertRow(-1);
			r.style.backgroundColor = actb3_self.actb3_bgColor;
			c = r.insertCell(-1);
			c.style.color = actb3_self.actb3_tColor;
			c.style.fontFamily = 'arial narrow';
			c.style.fontSize = actb3_self.actb3_nextSize;
			c.align='right';
			replaceHTML(c,'next >>');
			if (actb3_self.actb3_mouse){
				c.style.cursor = 'pointer';
				c.onclick = actb3_mouse_down;
			}
		}
	}
	function actb3_goup(){
		if (!actb3_display) return;
		if (actb3_pos == 1) return;
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_bgColor;
		actb3_pos--;
		if (actb3_pos < actb3_rangeu) actb3_moveup();
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_hColor;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list=0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	function actb3_godown(){
		if (!actb3_display) return;
		if (actb3_pos == actb3_total) return;
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_bgColor;
		actb3_pos++;
		if (actb3_pos > actb3_ranged) actb3_movedown();
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_hColor;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list=0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	function actb3_movedown(){
		actb3_rangeu++;
		actb3_ranged++;
		actb3_remake();
	}
	function actb3_moveup(){
		actb3_rangeu--;
		actb3_ranged--;
		actb3_remake();
	}

	/* Mouse */
	function actb3_mouse_down(){
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_bgColor;
		actb3_pos++;
		actb3_movedown();
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_hColor;
		actb3_curr.focus();
		actb3_mouse_on_list = 0;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list=0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	function actb3_mouse_up(evt){
		if (!evt) evt = event;
		if (evt.stopPropagation){
			evt.stopPropagation();
		}else{
			evt.cancelBubble = true;
		}
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_bgColor;
		actb3_pos--;
		actb3_moveup();
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_hColor;
		actb3_curr.focus();
		actb3_mouse_on_list = 0;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list=0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	function actb3_mouseclick(evt){
		if (!evt) evt = event;
		if (!actb3_display) return;
		actb3_mouse_on_list = 0;
		actb3_pos = this.getAttribute('pos');
		actb3_penter();
	}
	function actb3_table_focus(){
		actb3_mouse_on_list = 1;
	}
	function actb3_table_unfocus(){
		actb3_mouse_on_list = 0;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list = 0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	function actb3_table_highlight(){
		actb3_mouse_on_list = 1;
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_bgColor;
		actb3_pos = this.getAttribute('pos');
		while (actb3_pos < actb3_rangeu) actb3_moveup();
		while (actb3_pos > actb3_ranged) actb3_movedown();
		document.getElementById('tat_tr'+actb3_pos).style.backgroundColor = actb3_self.actb3_hColor;
		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list = 0;actb3_removedisp();},actb3_self.actb3_timeOut);
	}
	/* ---- */

	function actb3_insertword(a){
		if (actb3_self.actb3_delimiter.length > 0){
			str = '';
			l=0;
			for (i=0;i<actb3_delimwords.length;i++){
				if (actb3_cdelimword == i){
					prespace = postspace = '';
					gotbreak = false;
					for (j=0;j<actb3_delimwords[i].length;++j){
						if (actb3_delimwords[i].charAt(j) != ' '){
							gotbreak = true;
							break;
						}
						prespace += ' ';
					}
					for (j=actb3_delimwords[i].length-1;j>=0;--j){
						if (actb3_delimwords[i].charAt(j) != ' ') break;
						postspace += ' ';
					}
					str += prespace;
					str += a;
					l = str.length;
					if (gotbreak) str += postspace;
				}else{
					str += actb3_delimwords[i];
				}
				if (i != actb3_delimwords.length - 1){
					str += actb3_delimchar[i];
				}
			}
			actb3_curr.value = str;
			setCaret(actb3_curr,l);
		}else{
			actb3_curr.value = a;
		}
		actb3_mouse_on_list = 0;
		actb3_removedisp();
	}
	function actb3_penter(){
		if (!actb3_display) return;
		actb3_display = false;
		var word = '';
		var c = 0;
		for (var i=0;i<=actb3_self.actb3_keywords.length;i++){
			if (actb3_bool[i]) c++;
			if (c == actb3_pos){
				word = actb3_self.actb3_keywords[i];
				break;
			}
		}
		actb3_insertword(word);
		l = getCaretStart(actb3_curr);
	}
	function actb3_removedisp(){
		if (actb3_mouse_on_list==0){
			actb3_display = 0;
			if (document.getElementById('tat_table')){ document.body.removeChild(document.getElementById('tat_table')); }
			if (actb3_toid) clearTimeout(actb3_toid);
		}
	}
	function actb3_keypress(e){
		if (actb3_caretmove) stopEvent(e);
		return !actb3_caretmove;
	}
	function actb3_checkkey(evt){
		if (!evt) evt = event;
		a = evt.keyCode;
		caret_pos_start = getCaretStart(actb3_curr);
		actb3_caretmove = 0;
		switch (a){
			case 38:
				actb3_goup();
				actb3_caretmove = 1;
				return false;
				break;
			case 40:
				actb3_godown();
				actb3_caretmove = 1;
				return false;
				break;
			case 13: case 9:
				if (actb3_display){
					actb3_caretmove = 1;
					actb3_penter();
					return false;
				}else{
					return true;
				}
				break;
			default:
				setTimeout(function(){actb3_tocomplete(a)},50);
				break;
		}
	}

	function actb3_tocomplete(kc){
		if (kc == 38 || kc == 40 || kc == 13) return;
		var i;
		if (actb3_display){ 
			var word = 0;
			var c = 0;
			for (var i=0;i<=actb3_self.actb3_keywords.length;i++){
				if (actb3_bool[i]) c++;
				if (c == actb3_pos){
					word = i;
					break;
				}
			}
			actb3_pre = word;
		}else{ actb3_pre = -1};
		
		if (actb3_curr.value == ''){
			actb3_mouse_on_list = 0;
			actb3_removedisp();
			return;
		}
		if (actb3_self.actb3_delimiter.length > 0){
			caret_pos_start = getCaretStart(actb3_curr);
			caret_pos_end = getCaretEnd(actb3_curr);
			
			delim_split = '';
			for (i=0;i<actb3_self.actb3_delimiter.length;i++){
				delim_split += actb3_self.actb3_delimiter[i];
			}
			delim_split = delim_split.addslashes();
			delim_split_rx = new RegExp("(["+delim_split+"])");
			c = 0;
			actb3_delimwords = new Array();
			actb3_delimwords[0] = '';
			for (i=0,j=actb3_curr.value.length;i<actb3_curr.value.length;i++,j--){
				if (actb3_curr.value.substr(i,j).search(delim_split_rx) == 0){
					ma = actb3_curr.value.substr(i,j).match(delim_split_rx);
					actb3_delimchar[c] = ma[1];
					c++;
					actb3_delimwords[c] = '';
				}else{
					actb3_delimwords[c] += actb3_curr.value.charAt(i);
				}
			}

			var l = 0;
			actb3_cdelimword = -1;
			for (i=0;i<actb3_delimwords.length;i++){
				if (caret_pos_end >= l && caret_pos_end <= l + actb3_delimwords[i].length){
					actb3_cdelimword = i;
				}
				l+=actb3_delimwords[i].length + 1;
			}
			var ot = actb3_delimwords[actb3_cdelimword].trim(); 
			var t = actb3_delimwords[actb3_cdelimword].addslashes().trim();
		}else{
			var ot = actb3_curr.value;
			var t = actb3_curr.value.addslashes();
		}
		if (ot.length == 0){
			actb3_mouse_on_list = 0;
			actb3_removedisp();
		}
		if (ot.length < actb3_self.actb3_startcheck) return this;
		if (actb3_self.actb3_firstText){
			var re = new RegExp("^" + t, "i");
		}else{
			var re = new RegExp(t, "i");
		}

		actb3_total = 0;
		actb3_tomake = false;
		actb3_kwcount = 0;
		for (i=0;i<actb3_self.actb3_keywords.length;i++){
			actb3_bool[i] = false;
			if (re.test(actb3_self.actb3_keywords[i])){
				actb3_total++;
				actb3_bool[i] = true;
				actb3_kwcount++;
				if (actb3_pre == i) actb3_tomake = true;
			}
		}

		if (actb3_toid) clearTimeout(actb3_toid);
		if (actb3_self.actb3_timeOut > 0) actb3_toid = setTimeout(function(){actb3_mouse_on_list = 0;actb3_removedisp();},actb3_self.actb3_timeOut);
		actb3_generate();
	}
	return this;
}