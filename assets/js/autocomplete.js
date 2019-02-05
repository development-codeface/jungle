
function AutoComplete(control_id) {
  //properties
  this.Source = "";
  this.QueryString = "";
  this.Delay = 300;
  this.MinLength = 1;
  this.CssClassBox = "";
  this.CssClassLabel = "";
  this.CssClassProgress = "";
  this.CssClassSelected = "";
  this.SearchCaption = "";
  
  this.Control = document.getElementById(control_id);
}

AutoComplete.Control;
AutoComplete.CssClassBox;
AutoComplete.CssClassLabel;
AutoComplete.CssClassProgress;
AutoComplete.CssClassSelected;
AutoComplete.Result;
AutoComplete.ResultCount = 0;
AutoComplete.Keys;
AutoComplete.KeysCount = 0;
AutoComplete.SearchCaption = "";

AutoComplete.prototype.Execute = function(event) {
	AutoComplete.Control = this.Control;
	AutoComplete.CssClassBox = this.CssClassBox;
	AutoComplete.CssClassLabel = this.CssClassLabel;
	AutoComplete.CssClassProgress = this.CssClassProgress;
	AutoComplete.CssClassSelected = this.CssClassSelected;
	AutoComplete.SearchCaption = this.SearchCaption;
	
	this.Control.addEventListener("onkeyup", this.OnKeyUp(event));
}

AutoComplete.prototype.OnKeyUp = function(e) {
	var keynum;
    if(window.event)
    	keynum = e.keyCode;  // code for IE6, IE5
    else
    	if(e.which)
    		keynum = e.which;  // code for IE7+, Firefox, Chrome, Opera, Safari
    
    if (keynum != 38 && keynum != 40) { //up, down
    	if (this.Control.value.length == 0) {
    		myRender = new Render();
    		myRender.ClearResult();
	    }
    	if (window.searchtext)
    		if (window.searchtext == this.Control.value)
    			return;
    	if (this.Control.value.length < this.MinLength)
    		return;
    	window.searchtext = this.Control.value;
    	this.AjaxCallback();
    }
    else {
    	var myRender = new Render();
    	myRender.RenderSelected(keynum);
    }
}

AutoComplete.prototype.AjaxCallback = function() {
	var xmlhttp;
	if (window.XMLHttpRequest)
		xmlhttp = new XMLHttpRequest();  // code for IE7+, Firefox, Chrome, Opera, Safari
	else
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  // code for IE6, IE5
	  
	var timestamp = new Date().getTime();
	var url = this.Source + "?" + this.QueryString + "=" + decodeURI(this.Control.value) + "&timestamp=" + timestamp;
	
	xmlhttp.open("GET", url, true);
	setTimeout(function() { xmlhttp.send(); }, this.Delay);
	window.timestamp = timestamp;  //register last timestamp
	var myRender = new Render();
	myRender.RenderProgress();
	
	xmlhttp.onreadystatechange = function() {
		if (window.timestamp != timestamp)  {  //serialization
			xmlhttp.abort();
			return;
		}
		/*0: request not initialized
		1: server connection established
		2: request received 
		3: processing request 
		4: request finished and response is ready*/
		
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200 && AutoComplete.Control.value != "") {
			var myResponse = new Response();
			myResponse.ParseJSON(xmlhttp.responseText);
	        AutoComplete.Result = myResponse.JSON_Result;
	        AutoComplete.ResultCount = myResponse.JSON_ResultCount;
	        AutoComplete.Keys = myResponse.JSON_Keys;
	        AutoComplete.KeysCount = myResponse.JSON_KeysCount;
			
	        var myRender = new Render();
			myRender.RenderResult();
	    }
	}
}

function Response() {
	this.JSON_Result = new Array();
	this.JSON_ResultCount = 0;
	this.JSON_Keys = new Array();
	this.JSON_KeysCount = 0;
}

Response.prototype.ParseJSON = function (json_text) {
	if (!json_text)
		return;
	if (json_text == "")
	    return;

	var dim1 = -1;
	var dim2 = -1;
	var start_pos;
	var stop_pos;
	var keys_count_is_set = false;
	for (var i = 0; i < json_text.length; i++) {
		if (json_text.substring(i, i + 2) == '{"') {
			this.JSON_ResultCount++;
	        dim1++;
	        start_pos = i + 2;
	        this.JSON_Result[dim1] = new Array();
	    }
	    var check = false;
	    if (i < json_text.length - 2)
	    	if (json_text.substring(i, i + 3) == '","')
	    		check = true;
	    if (i < json_text.length - 1)
	    	if (json_text.substring(i, i + 2) == '"}')
	    		check = true;
	    if (check) {
	    	dim2++;
	        end_pos = i;
	        this.JSON_Result[dim1][dim2] = json_text.substring(start_pos, end_pos);
	        start_pos = i + 3;
	         
	        if (json_text.substring(i, i + 2) == '"}') {
	        	if (!keys_count_is_set) {
	        		this.JSON_KeysCount = dim2 + 1;
	        		keys_count_is_set = true;
	        	}
	        	dim2 = -1;
	        }
	    }
	}

	for (var i = 0; i < this.JSON_ResultCount; i++)
		for (var j = 0; j < this.JSON_KeysCount; j++) {
			var pos = this.JSON_Result[i][j].indexOf(":");
			if (i == 0)
				this.JSON_Keys[j] = this.JSON_Result[i][j].substring(0, pos - 1);
	        this.JSON_Result[i][j] = this.JSON_Result[i][j].substring(pos + 2, this.JSON_Result[i][j].length);
	        this.JSON_Result[i][j] = this.DecodeUTF8(this.JSON_Result[i][j]);
	        this.JSON_Result[i][j] = this.UnEscape(this.JSON_Result[i][j]);
    }
}

Response.prototype.DecodeUTF8 = function(utf8_text) {
	var r = /\\u([\d\w]{4})/gi;
    utf8_text = utf8_text.replace(r, function (match, grp) {
      return String.fromCharCode(parseInt(grp, 16)); });
    return unescape(utf8_text);	  
}

Response.prototype.UnEscape = function(text) {
	return text.replace(/\\/gi, '');
}

function Render() {
}

Render.prototype.RenderResult = function() {
    this.ClearResult();
    if (AutoComplete.ResultCount == 0)
    	return;
    
	var mainDiv = AutoComplete.Control.parentNode;
	var myUl = document.createElement("UL");
	myUl.removeAttribute("class");
	myUl.removeAttribute("style");
	myUl.setAttribute(this.GetBoxStyle()[0], this.GetBoxStyle()[1]);
	mainDiv.appendChild(myUl);
	for (var i = 0; i < AutoComplete.ResultCount; i++) {
		var myLi = document.createElement("LI");
		for (var j = 0; j < AutoComplete.KeysCount; j++) {
			myLi.removeAttribute("class");
			myLi.removeAttribute("style");
			myLi.setAttribute(this.GetLabelStyle()[0], this.GetLabelStyle()[1]);
			myLi.innerHTML += AutoComplete.Result[i][j];
		}
		myUl.appendChild(myLi);
	}
}

Render.prototype.RenderProgress = function() {
	this.ClearResult();	
	var mainDiv = AutoComplete.Control.parentNode;
	var myUl = document.createElement("UL");
	myUl.removeAttribute("class");
	myUl.removeAttribute("style");
	myUl.setAttribute(this.GetBoxStyle()[0], this.GetBoxStyle()[1]);
	mainDiv.appendChild(myUl);
    var myLi = document.createElement("LI");
    myLi.removeAttribute("class");
    myLi.removeAttribute("style");
	myLi.setAttribute(this.GetProgressStyle()[0], this.GetProgressStyle()[1]);
	myLi.innerHTML = AutoComplete.SearchCaption;
	myUl.appendChild(myLi);
}

Render.prototype.RenderSelected = function(keynum) {
	var mainDiv = AutoComplete.Control.parentNode;
    var myLi = mainDiv.getElementsByTagName("LI");
    if (myLi.length == 0)
    	return;
    
	if (window.selected == null)
		window.selected = -1;
	var selected = window.selected;
	if (keynum == 38) {  //up
		selected -= 1;
		if (selected < 0)
			selected = myLi.length - 1;
	}
	if (keynum == 40) {  //down
		selected += 1;
		if (selected >= myLi.length)
			selected = 0;
	}
    
    for (var i = 0; i < myLi.length; i++) {
    	myLi[i].removeAttribute("class");
    	myLi[i].removeAttribute("style");
    	myLi[i].setAttribute(this.GetLabelStyle()[0], this.GetLabelStyle()[1]);
    }
    myLi[selected].removeAttribute("class");
    myLi[selected].removeAttribute("style");
    myLi[selected].setAttribute(this.GetSelectedStyle()[0], this.GetSelectedStyle()[1]);
	window.selected = selected;
	AutoComplete.Control.value = AutoComplete.Result[selected][0];
}

Render.prototype.ClearResult = function() {
	window.name = "";
	var mainDiv = AutoComplete.Control.parentNode;
    var myUl = mainDiv.getElementsByTagName("UL");
    for (var i = 0; i < myUl.length; i++)
    	mainDiv.removeChild(myUl[i]);
}

Render.prototype.GetBoxStyle = function() {
	var result = new Array();
	if (AutoComplete.CssClassBox == "") {
		//default style
		result[0] = "style";
		result[1] = "position: absolute;" +
                    "left: 0px;" +
                    "margin: 0px 0px 0px 0px;" +
                    "width: 200px;" +
                    "background-color: #212427;" +
                    "-moz-border-radius: 7px;" +
                    "-webkit-border-radius: 7px;" +
                    "border-radius: 7px;" +
                    "border: 2px solid #000;" +
                    "color: #fff;" +
                    "margin-left: 0;" +
                    "padding-left: 0em;" +
                    "list-style-image: none;";
	}
	else {
		result[0] = "class";
	    result[1] = AutoComplete.CssClassBox;
	}
	return result;
}

Render.prototype.GetLabelStyle = function() {
	var result = new Array();
	if (AutoComplete.CssClassLabel == "") {
		//default style
		result[0] = "style";
		result[1] = "font-family: Helvetica;" +
                    "margin: 0px 0px 3px 0px;" +
                    "padding: 3px;" +
                    "cursor: pointer;" +
                    "font-size: 14px;" +
                    "font-weight: bold;" +
                    "list-style-image: none;";
	}
	else {
		result[0] = "class";
		result[1]= AutoComplete.CssClassLabel;
	}
	return result;
}

Render.prototype.GetProgressStyle = function() {
	var result = new Array();
	if (AutoComplete.CssClassProgress == "") {
		//default style
		result[0] = "style";
		result[1] = "font-family: Helvetica;" +
                    "margin: 0px 0px 3px 0px;" +
                    "padding: 3px;" +
                    "cursor: pointer;" +
                    "font-size: 14px;" +
                    "font-weight: bold;" +
                    "list-style-image: none;";
	}
	else {
		result[0] = "class";
		result[1] = AutoComplete.CssClassProgress;
	}
	return result;
}

Render.prototype.GetSelectedStyle = function() {
	var result = new Array();
	if (AutoComplete.CssClassSelected == "") {
		//default style
		result[0] = "style";
		result[1] = "font-family: Helvetica;" +
                    "margin: 0px 0px 3px 0px;" +
                    "color: black;" +
                    "padding: 3px;" +
                    "cursor: pointer;" +
                    "font-size: 14px;" +
                    "font-weight: bold;" +
                    "list-style-image: none;" +
                    "background-color: #FF8C00;";
	}
	else {
		result[0] = "class";
		result[1] = AutoComplete.CssClassSelected;
	}
	return result;
}