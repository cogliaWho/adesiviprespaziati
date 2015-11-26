<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<title><?php echo SITE_TITLE; ?></title>
		<meta name="description" itemprop="description" content="adesivi prespaziati">
		<meta name="keywords" itemprop="keywords" content="adesivi prespaziati">
		<link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
	</head>
	<body>
		<h2>Create New Page</h2>
		<form id="createPage">
			<label>Page FileName: (*)</label>
			<input type="text" name="pageName">
			<br>
			<label>URL Mask: (*)</label>
			<input type="text" name="urlMask">
			<br>
			<label>Page Category:</label>
			<input type="text" name="category">
			<br>
			<label>Page Title:</label>
			<input type="text" name="title">
			<br>
			<label>Is published?:</label>
			<select id="published" name="published">
			   <option value="0" selected>No</option>
			   <option value="1">Yes</option>
			</select>
			<br>
	  		<input type="submit" value="Submit">
		</form>

		<h2>Select a Page to modify</h2>
		<form id="selectPage">
			<select id="idPageSelect" form="selectPage" name="idPage">
				<?php 
					get_pages();
				?>
			</select>
			<input type="submit" value="Submit">
		</form>
		<h2>Create a content</h2>
		<section>
			<form id="createContent">
				<label>Content Key: (*)</label>
				<input type="text" name="contentKey">
				<br>
				<label>Contnet: (*)</label>
				<textarea name="content"></textarea>
				<br>
				<label>Content Type: (*)</label>
				<input type="text" name="contentType">
				<br>
				<input id="idPage" name="idPage" type="hidden" value="1"><br>
				<input type="submit" value="Submit">
			</form>
		</section>
		<h2>Content list</h2>
		<section>
			<table id="list_container" class="list_container">
			</table>
		</section>
	</body>
	<script async="" type="text/javascript" src="../js/jquery.js"></script>
	<script async="" type="text/javascript" src="../js/admin.js"></script>
</html>