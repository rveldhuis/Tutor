<?php
	session_start();
	ob_flush();
		
	include 'classes/database.php';
	$tutordb = new TutorDB();
	
	$id = 13;
	$sql = "SELECT * FROM tb_appointment WHERE end_time < NOW() AND tutor = $id AND id NOT IN (SELECT id FROM tb_rating)";
	$appointmentObjs = array();
	$result = $tutordb->query($sql);
	while ($appointment = $result->fetch_object("Appointment")) {
		$appointmentObjs[] = $appointment;
	}
?>