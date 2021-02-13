<?php

class Member extends CI_Controller{
	
	public function index()
	{
		$this->load->view("registerform");
	}

	public function registration(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("fullname","Ad Soyad","trim|required|min_length[3]"); //3 parametre 1->formdaki name, 2->description, 3->gereklilik parametreleri
		$this->form_validation->set_rules("email","E-posta","trim|valid_email|is_unique[member.email]");
		$this->form_validation->set_rules("phone","Telefon","trim|required");
		$this->form_validation->set_rules("gender","Cinsiyet","trim|required");
		$this->form_validation->set_rules("password","Şifre","trim|required|min_length[6]");
		$this->form_validation->set_rules("repassword","Şifre Doğrulama","trim|required|min_length[6]|matches[password]");
	
		//{field} , %s
		$errormessages = array(
			"required" => "<strong>%s</strong> isimli alanı doldurmak zorundasınız",
			"valid_email" => "lütfen geçerli bir e-posta adresi giriniz",
			"is_unique" => "daha önceden bu alana ait bir hesap bulunmaktadır",
			"matches" => "girmiş olduğunuz bilgiler uyuşmamaktadır"
		);

		$this->form_validation->set_message($errormessages);


		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			//database kayıt
		}

	}

	public function activation()
	{
		
	}

}
