<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/setting_model'
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}
 

	public function index()
	{
		$data['title'] = "Website Setting";
		#-------------------------------#
		//check setting table row if not exists then insert a row
		$this->check_setting();
		#-------------------------------#
		$data['setting'] = $this->setting_model->read();
		$data['content'] = $this->load->view('website/pages/setting',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = "Website Setting";
		#-------------------------------# 
		$this->form_validation->set_rules('title','Website Title','required|max_length[100]');
		$this->form_validation->set_rules('description','Description','max_length[255]');
		$this->form_validation->set_rules('meta_tag','Meta Tag','max_length[255]');
		$this->form_validation->set_rules('meta_keyword','Meta Keyword','max_length[255]');
		$this->form_validation->set_rules('email','Email Address','required|max_length[100]|valid_email');
		$this->form_validation->set_rules('phone','Phone No','required|max_length[20]');
		$this->form_validation->set_rules('address','Address','required|max_length[255]'); 
		$this->form_validation->set_rules('twitter_api','Twitter Api','max_length[1000]'); 
		$this->form_validation->set_rules('google_map','Google Map','max_length[1000]'); 
		$this->form_validation->set_rules('copyright_text','Copyright Text','max_length[255]');  
		$this->form_validation->set_rules('facebook','Facebook Url','valid_url|max_length[100]');
		$this->form_validation->set_rules('twitter','Twitter Url','valid_url|max_length[100]');
		$this->form_validation->set_rules('vimeo','Vimeo Url','valid_url|max_length[100]');
		$this->form_validation->set_rules('instagram','Instagram Url','valid_url|max_length[100]');
		$this->form_validation->set_rules('dribbble','Dribbble Url','valid_url|max_length[100]');
		$this->form_validation->set_rules('skype','Skype Url','valid_url|max_length[100]');
		#-------------------------------#
		//logo upload
		$logo = $this->fileupload->do_upload(
			'assets_web/images/icons/',
			'logo'
		);
		// if logo is uploaded then resize the logo
		if ($logo !== false && $logo != null) {
			$this->fileupload->do_resize(
				$logo, 
				285,
				73
			);
		}
		//if logo is not uploaded
		if ($logo === false) {
			$this->session->set_flashdata('exception', 'Invalid logo!');
		}

		//favicon upload
		$favicon = $this->fileupload->do_upload(
			'assets_web/images/icons/',
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
			'id'  		  => $this->input->post('id',true),
			'title' 	  => $this->input->post('title',true),
			'description' => $this->input->post('description',true),
			'meta_tag' 	  => $this->input->post('meta_tag',true),
			'meta_keyword' => $this->input->post('meta_keyword',true),
			'email' 	  => $this->input->post('email',true),
			'address'     => $this->input->post('address',true),
			'phone' 	  => $this->input->post('phone',true),
			'logo' 	      => (!empty($logo)?$logo:$this->input->post('old_logo')),
			'favicon' 	  => (!empty($favicon)?$favicon:$this->input->post('old_favicon')),
			'copyright_text' => $this->input->post('copyright_text',true),
			'twitter_api' => $this->input->post('twitter_api',false),
			'google_map'  => $this->input->post('google_map',false),
			'facebook'    => $this->input->post('facebook',true),
			'twitter'     => $this->input->post('twitter',true),
			'vimeo'       => $this->input->post('vimeo',true),
			'instagram'   => $this->input->post('instagram',true),
			'dribbble'    => $this->input->post('dribbble',true),
			'skype'       => $this->input->post('skype',true),
			'google_plus' => $this->input->post('google_plus',true),
			'status'      => $this->input->post('status',true),
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
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

			redirect('website/setting');

		} else { 
			$data['content'] = $this->load->view('website/pages/setting',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	//check setting table row if not exists then insert a row
	public function check_setting()
	{
		if ($this->db->count_all('ws_setting') == 0) {
			$this->db->insert('ws_setting',[
				'title' => 'Demo Hospital Limited',
				'address' => '123/A, Street, State-12345, Demo',
				'email' => 'demo@hospital.com',
				'phone' => '(732) 803-010-03',
				'copyright_text' => '© 2016 <a title="BdTask" href="http://bdtask.com" target="_blank">bdtask</a>. All rights reserved',
				'status' => 1
			]);
		}
	}


}
