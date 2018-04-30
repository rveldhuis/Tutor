<?php

Class User {
	private $id;
	private $mail;
	private $first_name;
	private $surname;
	private $street;
	private $postal_code;
	private $city;
	private $mobile;
	private $usertype;
	private $college;
	
	
	public function __construct() {
		unset($this->pwd);
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getMail() {
		return $this->mail;
	}
	
	public function getFirstName() {
		return $this->first_name;
	}
	
	public function getSurname() {
		return $this->surname;
	}
	
	public function getStreet() {
		return $this->street;
	}
	
	public function getPostalCode() {
		return $this->postal_code;
	}
	
	public function getCity() {
		return $this->city;
	}
	
	public function getMobile() {
		return $this->mobile;
	}
	
	public function getUserName() {
		return $this->name;
	}
	
	public function getRating() {
		return $this->rating;
	}
	
}