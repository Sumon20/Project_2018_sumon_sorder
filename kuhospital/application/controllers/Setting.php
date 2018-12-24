<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'setting_model'
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}
 

	public function index()
	{
		$data['title'] = "Application Setting";
		#-------------------------------#
		//check setting table row if not exists then insert a row
		$this->check_setting();
		#-------------------------------#
		$data['setting'] = $this->setting_model->read();
		$data['content'] = $this->load->view('setting',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = "Application Setting";
		#-------------------------------#
		$this->form_validation->set_rules('title','Website Title','required|max_length[50]');
		$this->form_validation->set_rules('description','Description','max_length[255]');
		$this->form_validation->set_rules('meta_tag','Meta Tag','max_length[255]');
		$this->form_validation->set_rules('meta_keyword','Meta Keyword','max_length[255]');
		$this->form_validation->set_rules('email','Email Address','max_length[100]|valid_email');
		$this->form_validation->set_rules('phone','Phone No','max_length[20]');
		$this->form_validation->set_rules('footer_text','Footer Text','max_length[255]'); 
		#-------------------------------#
		//logo upload
		$logo = $this->fileupload->do_upload(
			'assets/images/apps/',
			'logo'
		);
		// if logo is uploaded then resize the logo
		if ($logo !== false && $logo != null) {
			$this->fileupload->do_resize(
				$logo, 
				210,
				48
			);
		}
		//if logo is not uploaded
		if ($logo === false) {
			$this->session->set_flashdata('exception', 'Invalid logo!');
		}


		//favicon upload
		$favicon = $this->fileupload->do_upload(
			'assets/images/icons/',
			'favicon'
		);
		// if favicon is uploaded then resize the favicon
		if ($favicon !== false && $favicon != null) {
			$this->fileupload->do_resize(
				$favicon, 
				32,
				32
			);
		}
		//if favicon is not uploaded
		if ($favicon === false) {
			$this->session->set_flashdata('exception', 'Invalid Favicon!');
		}		
		#-------------------------------#

		$data['setting'] = (object)$postData = [
			'setting_id'  => $this->input->post('setting_id',true),
			'title' 	  => $this->input->post('title',true),
			'description' => $this->input->post('description',true),
			'email' 	  => $this->input->post('email',true),
			'phone' 	  => $this->input->post('phone',true),
			'logo' 	      => (!empty($logo)?$logo:$this->input->post('old_logo')),
			'favicon' 	  => (!empty($favicon)?$favicon:$this->input->post('old_favicon')),
			'footer_text' => $this->input->post('footer_text',true) 
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $setting_id then insert data
			if (empty($postData['setting_id'])) {
				if ($this->setting_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
			} else {
				if ($this->setting_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				} 
			}

			//update session data
			$this->session->set_userdata([
				'title' 	  => $postData['title'],
				'address' 	  => $postData['description'],
				'email' 	  => $postData['email'],
				'phone' 	  => $postData['phone'],
				'logo' 		  => $postData['logo'],
				'favicon' 	  => $postData['favicon'],
				'footer_text' => $postData['footer_text'],
			]);

			redirect('setting');

		} else { 
			$data['content'] = $this->load->view('setting',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	//check setting table row if not exists then insert a row
	public function check_setting()
	{
		if ($this->db->count_all('setting') == 0) {
			$this->db->insert('setting',[
				'title' => 'BD  Hospital',
				'description' => 'Khulna University',
				'footer_text' => '2018&copy;Copyright',
			]);
		}
	}


}
