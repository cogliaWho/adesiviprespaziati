(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
window.onload = function () { 
  	$("#createPage").submit(function(e) {
		SetPageAjax($(this));
	    e.preventDefault(); // avoid to execute the actual submit of the form.
	});

	$("#selectPage").submit(function(e) {
	    GetContentByPageIdAjax($('select[name=idPage]').val());
	    document.getElementById("idPage").value = $('select[name=idPage]').val();
	    e.preventDefault(); // avoid to execute the actual submit of the form.
	});

	$("#createContent").submit(function(e) {
		SetContentPageAjax($(this));
	    e.preventDefault(); // avoid to execute the actual submit of the form.
	});
  	
	function SetContentPageAjax(formElem){
		var url = "../API/SetContentPageAjax.php"; // the script where you handle the form input.
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: formElem.serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	               console.log(data); // show response from the php script.
	           }
	         });
	}

	function SetPageAjax(formElem){
		var url = "../API/SetPageAjax.php"; // the script where you handle the form input.
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: formElem.serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	               console.log(data); // show response from the php script.
	           }
	         });
	}

	function setContentList(contentsJson){
		var contetnList = $("#list_container");
		var listElem = "<tr><th>Content Key</th><th>Content</th></tr><tr>";
		
		for(var i = 0; i < contentsJson.length; i++){
			listElem += "<td>"+contentsJson[i].contentKey+"</td>";
			listElem += "<td>"+contentsJson[i].content+"</td>";
			//listElem += "<td>"+contentsJson[i].contentType+"</td>";
			listElem += "</tr>";
		}

		contetnList.html(listElem);
	}

	function GetContentByPageIdAjax(idPage){
		var url = "../API/GetContentByPageIdAjax.php"; // the script where you handle the form input.
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: { 'idPage' : idPage }, // serializes the form's elements.
	           dataType: "json",
	           success: function(json)
	           {
	               setContentList(json);
	           }
	         });
	}

};
},{}]},{},[1]);
