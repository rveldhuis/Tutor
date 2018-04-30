<?php
	session_start();
	ob_flush();
	include '../classes/database.php';
	$tutordb = new TutorDB();
	
	//Fetch fields
	$studentid = $_SESSION['userid'];
	$appointmentid = $_POST['appointment'];
	
	//Check which fields are needed
	$knowledge = (string)(int)$_POST['knowledge'] === $_POST['knowledge'] ? (int)$_POST['knowledge'] : "";
	$explanation = (string)(int)$_POST['explanation'] === $_POST['explanation'] ? (int)$_POST['explanation'] : "";
	$helpfulness = (string)(int)$_POST['helpfulness'] === $_POST['helpfulness'] ? (int)$_POST['helpfulness'] : "";
	$communication = (string)(int)$_POST['communication'] === $_POST['communication'] ? (int)$_POST['communication'] : "";
	$understandability = (string)(int)$_POST['understandability'] === $_POST['understandability'] ? (int)$_POST['understandability'] : "";
	$general = (string)(int)$_POST['general'] === $_POST['general'] ? (int)$_POST['general'] : "";
	
	//Get appointment from database and check if the appointment id is valid for this student
	$appointment = new Appointment();
	$appointment = $appointment->load($appointmentid);
	$student = $appointment->getStudent();
	
	if(!$studentid === (int) $student->id) {
		$_SESSION['message'] = "Not allowed to rate.";
		header('Location: http:/../Tutor');
		die();
	}
	
	//Inserting into database
	$sql = "";
	$tutorid = $appointment->getTutor()->id;
	if(is_int($knowledge)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$knowledge,'knowledge');";
	}
	
	if(is_int($explanation)) {	
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$explanation,'explanation');";
	}
	
	if(is_int($helpfulness)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$helpfulness,'helpfulness');";
	}
		
	if(is_int($communication)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$communication,'communication');";
	}
	
	if(is_int($understandability)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$understandability,'understandability');";
	}

	if(is_int($general)) {	
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type)
				VALUES ($studentid,$tutorid,$appointmentid,$general,'general');";
	}
	
	if(strlen($sql) > 1) {
		$result = $tutordb->multi_query($sql);	
	} else {
		$_SESSION['message'] = "No rating entered.";
	}
	
	if($result) {
		$_SESSION['message'] = "Tutor rated succesfully";
	}
	header('Location: http:/../Tutor');