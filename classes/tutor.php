<?php

Class Tutor extends User {
	
	public function __construct() {
		parent::__construct();
		unset($this->college);
	}
	
	public function getRating() {
		
	}
	
	public function getCourses() {
		
	}
}