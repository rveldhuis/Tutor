<?php
	ob_start();
	session_start();
	include 'classes/database.php';
	$tutordb = new TutorDB();
	
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$tutordb->login($_POST['email'],$_POST['password']);
	}
	header('Location: http:/../Tutor');
?>