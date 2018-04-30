<?php

include 'user.php';
include 'tutor.php';
include 'student.php';
include 'course.php';
include 'appointment.php';

Class TutorDB extends mysqli {
	
	public function __construct() {
		$dbhost = 'localhost';
		$dbuser = 'xxxx';
		$dbpass = 'xxxx';
		$dbname = 'xxxx';
		parent::__construct($dbhost, $dbuser, $dbpass, $dbname);
	}
	
	public function login($mail = null, $pwd = null) {
		if(isset($mail) && isset($pwd)) {
			$sql = "SELECT * FROM tb_user WHERE mail = '%s'";
			$sql = sprintf($sql, $mail);
			$user = $this->query($sql); 
			if(isset($user) && $user->num_rows == 1) {
				$user = $user->fetch_assoc();
				if(password_verify($pwd, $user['pwd'])) {
					$_SESSION['userid'] = $user['id'];
					$_SESSION['usertype'] = $user['usertype'];
					$_SESSION['uname'] = $user['first_name'];
					$_SESSION['timeout'] = time();
					return true;
				}
			}
		}
		$_SESSION['message'] = "Incorrect mail address and password combination.";
		return false;
	}
	
	public function getUserById($id = null) {
		if(isset($id) && is_int($id)) {
			$sql = "SELECT id, name, mail FROM tb_user WHERE id = %s";
			$sql = sprintf($sql, $id);
			$user = $this->query($sql);
			if(isset($user) && $user->num_rows == 1) {
				$user = $user->fetch_assoc();
			}
		}
	}
	
	public function getCourseById($id = null) {
		if(isset($id) && is_int($id)) {
			$sql = "SELECT id, name, mail FROM tb_user WHERE id = %s";
			$sql = sprintf($sql, $id);
			$course = $this->query($sql);
			if(isset($user) && $user->num_rows == 1) {
				$user = $user->fetch_assoc();
			}
		}
	}
	
	public function getAllCourses() {
		$sql = "SELECT id FROM tb_course";
		$courses = $this->query($sql);
		$coursesObjs = array();
		foreach($courses as $course) {
			$coursesObjs[] = new Course($course->id);
		}
		return $coursesObjs;
	}
	
	public function getAvailableReviewsForTutor($id) {
		$sql = "SELECT * FROM tb_appointment WHERE end_time < NOW() AND tutor = $id AND id NOT IN (SELECT appointment FROM tb_rating WHERE rater = $id)";
		$appointmentObjs = array();
		$result = $this->query($sql);
		while ($appointment = $result->fetch_object("Appointment")) {
			$appointmentObjs[] = $appointment;
		}
		return $appointmentObjs;
	}
	
	public function getAvailableReviewsForStudent($id) {
		$sql = "SELECT * FROM tb_appointment WHERE end_time < NOW() AND student = $id AND id NOT IN (SELECT appointment FROM tb_rating WHERE rater = $id)";
		$appointmentObjs = array();
		$result = $this->query($sql);
		while ($appointment = $result->fetch_object("Appointment")) {
			$appointmentObjs[] = $appointment;
		}
		return $appointmentObjs;
	} 
	
	public function getStudentByAppointmentId($id) {
		$sql = "SELECT b.id as id, mail, first_name, surname, street, postal_code, city, mobile, college FROM tb_appointment a LEFT JOIN tb_user b ON b.id = a.student WHERE a.id = $id";
		$student = $this->query($sql)->fetch_object();
		return $student;
	} 
	
	public function getTutorByAppointmentId($id) {
		$sql = "SELECT b.id as id, mail, first_name, surname, street, postal_code, city, mobile, college FROM tb_appointment a LEFT JOIN tb_user b ON b.id = a.tutor WHERE a.id = $id";
		$tutor = new Tutor();
		$tutor = $this->query($sql)->fetch_object();
		return $tutor;
	}
	
	public function getCourses($query = "") {
		$sql = "SELECT * FROM tb_courses WHERE name LIKE '%$query%'";
		$result = $this->query($sql);
		$courses = array();
		while($course = $result->fetch_object("Course")) {
			$courses[] = $course;
		}
		return $courses;
	}
	
	public function getTutorsForCourse($id) {
		$sql = "SELECT DISTINCT u.* FROM tb_tutor_course_approval a LEFT JOIN tb_user u ON a.tutor = u.id WHERE approval = 1 AND course = $id";
		$tutors = array();
		$result = $this->query($sql);
		while($tutor = $result->fetch_object("User")) {
			$tutors[] = $tutor; 
		}
		return $tutors;
	}
	
	public function getRatingsForUser($id) {
		$sql = "SELECT type, ROUND(AVG(rating),1) as average FROM tb_rating WHERE rated = $id GROUP BY type";
		$ratings = array();
		$result = $this->query($sql);
		while($rating = $result->fetch_assoc()) {
			$ratings[] = $rating;
		}
		return $ratings;
	}
}