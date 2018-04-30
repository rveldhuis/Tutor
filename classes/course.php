<?php

Class Course {
	private $id;
	private $name;
	private $image;
	private $description;
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getImage() {
		return $this->image;
	}
	
	public function getDescription() {
		return $this->description;
	}
}
