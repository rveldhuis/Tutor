<?php
	session_start();
	ob_flush();
	include '../classes/database.php';
	$tutordb = new TutorDB();
	
	//Fetch fields
	$usertype = 2;
	$mail = isset($_POST['mail']) ? $_POST['mail'] : "";
	$first_name = isset($_POST['firstname']) ? $_POST['firstname'] : "";
	$surname = isset($_POST['surname']) ? $_POST['surname'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$passwordc = isset($_POST['passwordc']) ? $_POST['passwordc'] : "";
	$street = isset($_POST['street']) ? $_POST['street'] : "";
	$postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : "";
	$city = isset($_POST['city']) ? $_POST['city'] : "";
	$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : "";
	$college = "";
	$resume = isset($_POST['resume']) ? $_POST['resume'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$passwordc = isset($_POST['passwordc']) ? $_POST['passwordc'] : "";
	
	//Server side valiation
	if(strcmp($password,$passwordc) != 0 || strlen($password) < 3) {
		die('The passwords you provided are too short or unequal .');
	}
	
	$pwd = password_hash($password, PASSWORD_DEFAULT);
	
	//Inserting into database
	$sql = "INSERT INTO tb_user (mail,pwd,first_name,surname,street,postal_code,city,mobile,usertype,college)
			VALUES ('$mail','$pwd','$first_name','$surname','$street','$postal_code','$city','$mobile',$usertype,'$college')";
	$result = $tutordb->query($sql);
	if($result) {
		$_SESSION['message'] = "Your tutor account has been created. You can now log in to add courses to this account. These courses will be available to students once they are approved.";
	} else {
		$_SESSION['message'] = "Error during account creation";
	}
	header('Location: http:/../Tutor');
