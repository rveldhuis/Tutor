<?php
	session_start();
	ob_flush();
	include '../classes/database.php';
	$tutordb = new TutorDB();
	
	//Fetch fields
	$usertype = 1;
	$mail = isset($_POST['mail']) ? $_POST['mail'] : "";
	$first_name = isset($_POST['firstname']) ? $_POST['firstname'] : "";
	$surname = isset($_POST['surname']) ? $_POST['surname'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$passwordc = isset($_POST['passwordc']) ? $_POST['passwordc'] : "";
	$street = isset($_POST['street']) ? $_POST['street'] : "";
	$postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : "";
	$city = isset($_POST['city']) ? $_POST['city'] : "";
	$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
	$college = isset($_POST['college']) ? $_POST['college'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$passwordc = isset($_POST['passwordc']) ? $_POST['passwordc'] : "";
	
	//Server side valiation
	if(strcmp($password,$passwordc) != 0) {
		die('Unequal passwords entered.');
	}
	
	$pwd = password_hash($password, PASSWORD_DEFAULT);
	
	//Inserting into database
	$sql = "INSERT INTO tb_user (mail,pwd,first_name,surname,street,postal_code,city,mobile,usertype,college)
			VALUES ('$mail','$pwd','$first_name','$surname','$street','$postal_code','$city','$mobile',$usertype,'$college')";
	$result = $tutordb->query($sql);
	if($result) {
		$_SESSION['message'] = "Your student account has been created";
	} else {
		$_SESSION['message'] = "Error during account creation";
	}
	header('Location: http:/../Tutor');
