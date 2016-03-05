<?php
if(isset($_POST['search']) && isset($_POST['replace']) && isset($_POST['content'])) {
	$new = preg_replace($_POST['search'], $_POST['replace'], $_POST['content']);
	echo htmlentities($new);
}
?>

<html>
<head>
<title>preg_replace() RCE</title>
</head>
<body>
	<form class="preg" action="" method="post">
		<div class="from-group">
		<lable for="search">Search</lable>
		<input type="text" class="form-control" name="search" id="search">
		</div>
		<div class="from-group">
		<lable for="sreplace">Replace</lable>
		<input type="text" class="form-control" name="replace" id="replace">
		</div>
		<div class="from-group">
		<lable for="content">Content</lable>
		<input type="text" class="form-control" name="content" id="content">
		</div>
		<button class="btn" type="submit">Working</button>
	</form>
</body>
</html>
