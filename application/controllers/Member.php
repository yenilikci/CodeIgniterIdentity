<?php

class Member extends CI_Controller{
	
	public function index()
	{
		$this->load->view("registerform");
	}

	public function registration()
	{
		echo "register";
	}

	public function activation()
	{

	}

}
