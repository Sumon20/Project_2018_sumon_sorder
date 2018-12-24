<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'schedule_model',
			'doctor_model'
		]);
		
		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');

	}
 
	public function index()
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Schedule List";
		$data['schedules'] = $this->schedule_model->read();
		$data['content'] = $this->load->view('schedule',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

 	public function create()
	{ 
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 
	
		$data['title'] = "Add Schedule";  
		#-------------------------------#
		$this->form_validation->set_rules('doctor_id','Doctor Name','required|max_length[11]');
		$this->form_validation->set_rules('start_time','Start Time','required|max_length[8]');
		$this->form_validation->set_rules('end_time','End Time','required|max_length[8]');
		$this->form_validation->set_rules('available_days[]','Available Days','required|min_length[1]');
		$this->form_validation->set_rules('per_patient_time','Per Patient Time','required|min_length[1]');
		$this->form_validation->set_rules('serial_visibility_type','Serial Visibility Type','max_length[5]');
		$this->form_validation->set_rules('status','Status','required');
		#-------------------------------# 
		$data['schedule'] = (object)$postData = [
			'schedule_id' 	 => $this->input->post('schedule_id',true),
			'doctor_id' 	 => $this->input->post('doctor_id',true),
			'available_days' => $this->input->post('available_days',true),
			'start_time' 	 => $this->input->post('start_time',true),
			'end_time' 	 	 => $this->input->post('end_time',true),
			'per_patient_time' => $this->input->post('per_patient_time',true),
			'serial_visibility_type' => $this->input->post('serial_visibility_type',true),
			'status'         => $this->input->post('status',true)
		];  
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $schedule_id then insert data
			if (empty($postData['schedule_id'])) {
				
				if ($this->schedule_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('schedule/create');
			} else {
				if ($this->schedule_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('schedule/edit/'.$postData['schedule_id']);
			}

		} else {
			$data['doctor_list'] = $this->doctor_model->doctor_list();
			$data['content'] = $this->load->view('schedule_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit($schedule_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Schedule Edit";
		#-------------------------------#
		$data['schedule'] = $this->schedule_model->read_by_id($schedule_id);
		$data['doctor_list'] = $this->doctor_model->doctor_list();
		$data['content'] = $this->load->view('schedule_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function delete($schedule_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login');

		if ($this->schedule_model->delete($schedule_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('schedule');
	}


	/*
	* function for single user
	*/

 
	public function list_by_doctor()
	{
		if ($this->session->userdata('user_role') != 2) 
		redirect('login');

		$data['title'] = "Schedule List";
		$data['schedules'] = $this->schedule_model->read_by_doctor(
			$this->session->userdata('user_id')
		);
		$data['content'] = $this->load->view('schedule_list_by_doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

 	public function create_by_doctor()
	{ 
		if ($this->session->userdata('user_role') != 2) 
		redirect('login');

		$data['title'] = "Add Schedule";  
		#-------------------------------#
		$this->form_validation->set_rules('start_time','Start Time','required|max_length[8]');
		$this->form_validation->set_rules('end_time','End Time','required|max_length[8]');
		$this->form_validation->set_rules('available_days[]','Available Days','required|min_length[1]');
		$this->form_validation->set_rules('per_patient_time','Per Patient Time','required|min_length[1]');
		$this->form_validation->set_rules('serial_visibility_type','Serial Visibility Type','max_length[5]');
		$this->form_validation->set_rules('status','Status','required');
		#-------------------------------# 
		$data['schedule'] = (object)$postData = [
			'schedule_id' 	 => $this->input->post('schedule_id',true),
			'doctor_id' 	 => $this->session->userdata('user_id'),
			'available_days' => $this->input->post('available_days',true),
			'start_time' 	 => $this->input->post('start_time',true),
			'end_time' 	 	 => $this->input->post('end_time',true),
			'per_patient_time' => $this->input->post('per_patient_time',true),
			'serial_visibility_type' => $this->input->post('serial_visibility_type',true),
			'status'         => $this->input->post('status',true)
		];  
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $schedule_id then insert data
			if (empty($postData['schedule_id'])) {
				
				if ($this->schedule_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('schedule/create_by_doctor');
			} else {
				if ($this->schedule_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('schedule/edit_by_doctor/'.$postData['schedule_id']);
			}

		} else {
			$data['content'] = $this->load->view('schedule_form_by_doctor',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


	public function edit_by_doctor($schedule_id = null) 
	{

		if ($this->session->userdata('user_role') != 2) 
		redirect('login');

		$data['title'] = "Schedule Edit";
		#-------------------------------#
		$doctor_id = $this->session->userdata('user_id');
		$data['schedule'] = $this->schedule_model->read_by_doctor_id($schedule_id, $doctor_id);
		$data['content'] = $this->load->view('schedule_form_by_doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function delete_by_doctor($schedule_id = null) 
	{
		if ($this->session->userdata('user_role') != 2) 
		redirect('login');

		$doctor_id = $this->session->userdata('user_id');
		if ($this->schedule_model->delete($schedule_id, $user_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('schedule/list_by_doctor');
	}


}
