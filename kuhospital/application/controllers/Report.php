<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'report_model',
			'doctor_model',
			'representative_model',
		]);


		if ($this->session->userdata('isLogIn') == false) 
			redirect('login'); 
		
	}
 
	public function assign_by_all()
	{ 
		
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Appointment Assign by All";
		#-------------------------------#
		$data['date'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true)	
		];
		#-------------------------------#
    	$data['appointments'] = $this->report_model->assign_by_all($getData);
		$data['content'] = $this->load->view('report_assign_by_all',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function assign_by_all_doctor()
	{ 
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Appointment Assign by All Doctor";
		#-------------------------------#
		$data['user'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true),	
			'user_id'	 => $this->input->get('user_id',true)
		];
		#-------------------------------#
    	$data['user_list'] = $this->doctor_model->doctor_list();
    	$data['appointments'] = $this->report_model->assign_by_user($getData);
		$data['content'] = $this->load->view('report_assign_by_all_doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 


 
	public function assign_by_all_representative()
	{ 
		
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 


		$data['title'] = "Appointment Assign by All Representative";
		#-------------------------------#
		$data['user'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true),	
			'user_id'	 => $this->input->get('user_id',true)
		];
		#-------------------------------#
    	$data['user_list'] = $this->representative_model->representative_list();
    	$data['appointments'] = $this->report_model->assign_by_user($getData);
		$data['content'] = $this->load->view('report_assign_by_all_representative',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 


	public function assign_to_all_doctor()
	{ 
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Appointment Assign to All Doctor";
		#-------------------------------#
		$data['user'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true),	
			'user_id'	 => $this->input->get('user_id',true)
		];
		#-------------------------------#
    	$data['user_list'] = $this->doctor_model->doctor_list();
    	$data['appointments'] = $this->report_model->assign_to_user($getData);
		$data['content'] = $this->load->view('report_assign_to_all_doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

 	/*
	* function for display single user information
	*/

	public function assign_by_me()
	{  
		$data['title'] = "Appointment Assign by Me";
		#-------------------------------#
		$data['user'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true),
			'user_id'	 => $this->session->userdata('user_id')
		];
		#-------------------------------#
    	$data['appointments'] = $this->report_model->assign_by_user($getData);
		$data['content'] = $this->load->view('report_assign_by_me',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 
	public function assign_to_me()
	{ 
		if ($this->session->userdata('user_role') != 1
			&& $this->session->userdata('user_role') != 2
		) 
		redirect('login'); 

		$data['title'] = "Appointment Assign to Me";
		#-------------------------------#
		$data['user'] = (object)$getData = [
			'start_date' => $this->input->get('start_date',true),
			'end_date'	 => $this->input->get('end_date',true),
			'user_id'	 => $this->session->userdata('user_id')
		];
		#-------------------------------#
    	$data['user_list'] = $this->doctor_model->doctor_list();
    	$data['appointments'] = $this->report_model->assign_to_user($getData);
		$data['content'] = $this->load->view('report_assign_to_me',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 
}
