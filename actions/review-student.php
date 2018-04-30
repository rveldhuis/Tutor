<?php
	session_start();
	ob_flush();
	include '../classes/database.php';
	$tutordb = new TutorDB();
	
	//Fetch fields
	$tutorid = $_SESSION['userid'];
	$appointmentid = $_POST['appointment'];
	
	//Check which fields are needed
	$listening = (string)(int)$_POST['listening'] === $_POST['listening'] ? (int)$_POST['listening'] : "";
	$execution = (string)(int)$_POST['execution'] === $_POST['execution'] ? (int)$_POST['execution'] : "";
	$communication = (string)(int)$_POST['communication'] === $_POST['communication'] ? (int)$_POST['communication'] : "";
	$understandability = (string)(int)$_POST['understandability'] === $_POST['understandability'] ? (int)$_POST['understandability'] : "";

	//Get appointment from database and check if the appointment id is valid for this tutor
	$appointment = new Appointment();
	$appointment = $appointment->load($appointmentid);
	$tutor = $appointment->getTutor();
	
	if(!$tutorid === (int) $tutor->id) {
		$_SESSION['message'] = "Not allowed to rate.";
		header('Location: http:/../Tutor');
		die();
	}
	
	//Inserting into database
	$sql = "";
	$studentid = $appointment->getStudent()->id;
	if(is_int($listening)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type) VALUES ($tutorid,$studentid,$appointmentid,$listening,'listening');";
	}
	
	if(is_int($execution)) {	
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type) VALUES ($tutorid,$studentid,$appointmentid,$execution,'execution');";
	}
	
	if(is_int($communication)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type) VALUES ($tutorid,$studentid,$appointmentid,$communication,'communication');";
	}
		
	if(is_int($understandability)) {
		$sql .= "INSERT INTO tb_rating (rater,rated,appointment,rating,type) VALUES ($tutorid,$studentid,$appointmentid,$understandability,'understandability');";
	}
	
	if(strlen($sql) > 1) {
		$result = $tutordb->multi_query($sql);	
	} else {
		$_SESSION['message'] = "No rating entered.";
	}
	
	if($result) {
		$_SESSION['message'] = "Student rated succesfully";
	}
	header('Location: http:/../Tutor');