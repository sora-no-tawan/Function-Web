<?php
if(isset($_POST['search']) && isset($_POST['replace']) && isset($_POST['content'])) {

	$new = preg_replace($_POST['search'], $_POST['replace'], $_POST['content']);
	echo htmlentities($new);
}
