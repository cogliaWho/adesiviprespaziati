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