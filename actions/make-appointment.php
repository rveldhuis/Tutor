<?php
	session_start();
	ob_flush();
	include '../classes/database.php';
	$tutordb = new TutorDB();
	
	//New fetch
	$from = new DateTime();
	$to = new DateTime();
	$from = $from->setTimestamp(strtotime($_POST['from']))->format('Y-m-d H:i:s');
	$to = $to->setTimestamp(strtotime($_POST['to']))->format('Y-m-d H:i:s');
	$tutor = $_POST['tutor'];
	$student = $_SESSION['userid'];

	//Inserting into database
	$sql = "INSERT INTO tb_appointment (tutor, student, start_time, end_time) VALUES ($tutor,$student,'$from','$to')";
	$result = $tutordb->query($sql);
	
	if($result) {
		$_SESSION['message'] = "Appointment made.";
	} else {
		$_SESSION['message'] = "Error during creation of the appointment.";
	}
	header('Location: http:/../Tutor');