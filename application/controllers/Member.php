<?php

class Member extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model("MemberModel");
	}

	public function index()
	{
		$this->load->view("registerform");
	}

	public function registration(){
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

			$viewData["error"] = validation_errors();
			$this->load->view("registerform",$viewData);
		}
		else
		{
			$activation_code = md5(uniqid());
			//database kayıt
			$data = array(
				"email" => $this->input->post("email"),
				"full_name" => $this->input->post("fullname"),
				"gender" => $this->input->post("gender"),
				"phone" => $this->input->post("phone"),
				"password" => md5($this->input->post("password")),
				"createdAt" => date("Y-m-d H:i:s"),
				"activationCode" => $activation_code
			);

			$insert = $this->MemberModel->insert($data);
			if($insert){
				$config = array(
					"protocol" => "smtp",
					"smtp_host" => "ssl://smtp.gmail.com",
					"smtp_port" => "465",
					"smtp_user" => "mailadresimiz",
					"smtp_pass" => "sifremiz",
					"starttls" => true,
					"charset" => "utf-8",
					"mailtype" => "html",
					"wordwrap" => true,
					"newline" => "\r\n",
				);

				$link = base_url("member/activation/$activation_code");

				$message = "Merhabalar, {$this->input->post("full_name")}, <br> üyeliğinizin aktifleşmesi için sadece bir adım kaldı
				Üyeliğinizin aktifleştirmek için lütfen <a href='$link'>tıklayınız</a>";

				//kullanıcıya aktivasyon işlemi için email 
				$this->load->library("email",$config);
				$this->email->from("mailadresimiz","melih");
				$this->email->to($this->input->post("email"));
				$this->email->subject("Üyelik Aktivasyonu");
				$this->email->message($message);
				$send = $this->email->send();
				if($send){
					$this->load->view("thanks");
				}else{
					$viewData["error"] = "Üyelik sırasında bir problem oluştu lütfen tekrar deneyiniz";
					$this->load->view("registerform",$viewData);
				}
			}else
			{
				//error page
				$viewData["error"] = "Üyelik sırasında bir problem oluştu lütfen tekrar deneyiniz";
				$this->load->view("registerform",$viewData);
			}
		}

	}

	public function activation($activationCode)
	{
		//activationCode ile kaydı bul
		//bu kaydın isActive = 1
		//activationCode = ""
		//success page... error page...
		$where = array(
			"activationCode" => $activationCode,
		);
		$row = $this->MemberModel->get($where);
		if($row)
		{
			$data = array(
				"isActive" => 1,
				"activationCode" => ""
			);
			$update = $this->MemberModel->update($where,$data);
			if($update)
			{
				$this->load->view("success");
			}else{
				$this->load->view("error");
			}
		}else{
			$this->load->view("error");
		}
		

	}

	//Üyelik işlemleri 2
	public function signinform()
	{
		$this->load->view("signin");
	}

	public function signin(){
		//form validation
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email","E-posta","required|trim|valid_email");
		$this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]");

		$error_messages = array(
			"required" => "<strong>%s</strong> isimli alanı doldurmak zorundasınız",
			"valid_email" => "lütfen geçerli bir e-posta adresi giriniz",
			"min_length" => "Lütfen şifrenizi eksiksiz olarak giriniz"
		);

		$this->form_validation->set_message($error_messages);

		if ($this->form_validation->run() == FALSE)
		{
			//hata mesajı göster
			$viewData["error"] = validation_errors();
			$this->load->view("signin",$viewData);
		}else{
			//db kontrolü
			$where = array(
				"email" => $this->input->post("email"),
				"password" => md5($this->input->post("password"))
			);
			$member = $this->MemberModel->get($where);

			if ($member)
			{
				//homepage
				print_r($member);
			}else{
				//hata mesajı göster
				$viewData["error"] = "Girmiş olduğunuz bilgilere ait bir kullanıcı bulunamadı!";
				$this->load->view("signin",$viewData);
			}
		}

	}

}
