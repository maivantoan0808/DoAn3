<?php 
if(isset($_POST['content'])){

	$content = trim($_POST['content']);
	echo '<p>'.$content.'</p>';
}
?>