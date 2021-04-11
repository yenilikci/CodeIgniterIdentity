<?php

class Homepage extends CI_Controller
{
	public function index(){
		//session içerisinde user var mı? yoksa signin sayfasına yönlendir
		$member = $this->session->userdata("member");
		if (!$member) {
			redirect(base_url("member/signinform"));
		}else{
			$viewData["member"] = $member;
			$this->load->view("homepage",$viewData);
		}
	}
}
