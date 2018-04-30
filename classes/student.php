<?php

Class Student extends User {
	//attr: name, surname, address, postal code, city, mobile, mail, college, password
	//rating: listing, execution, communication, understandability
	private $college;
	
	public function getRating() {
		
	}
	
	public function getCollege() {
		return $this->college;
	}
}