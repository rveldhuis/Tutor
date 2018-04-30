<?php
//subject, date, time, location, contact information (telephone number).

Class Appointment {
	private $id;
	private $student;
	private $tutor;
	private $start_time;
	private $end_time;
	private $course;
	private $location;
	
	public function load($id) {
		if(isset($id) && !isset($this->id)) {
			$tutordb = new TutorDB();
			$sql = "SELECT * FROM tb_appointment WHERE id = $id";
			$result = $tutordb->query($sql)->fetch_object("Appointment");
			return $result;
		}
		return $this;
	}
	
	public function loadStudent() {
		if(!$this->student instanceof Student) {
			$tutordb = new TutorDB();
			$student = $tutordb->getStudentByAppointmentId($this->id);
			$this->student = $student;
		}	
		return $this;
	}
	
	public function loadTutor() {
		if(!$this->tutor instanceof Tutor) {
			$tutordb = new TutorDB();
			$tutor = $tutordb->getTutorByAppointmentId($this->id);
			$this->tutor = $tutor;
		}	
		return $this->student;
	}
	
	public function getTutor() {
		if(!$this->tutor instanceof Student) {
			$this->loadTutor();
		}
		return $this->tutor;
	}
	
	public function getStudent() {
		if(!$this->student instanceof Student) {
			$this->loadStudent();
		}
		return $this->student;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getRawEndTime() {
		return $this->end_time;
	}
	
	public function getRawStartTime() {
		return $this->start_time;
	}
	
	public function getEndTime() {
		$timeString = $this->getRawEndTime();
		$date = new DateTime();
		$date->setTimestamp(strtotime($timeString));
		return $date->format('d-m-Y H:i');
	}
	
	public function getStartTime() {
		$timeString = $this->getRawStartTime();
		$date = new DateTime();
		$date->setTimestamp(strtotime($timeString));
		return $date->format('d-m-Y H:i');
	}
	
	public function getLocation() {
		return $this->location;
	}		
} 
