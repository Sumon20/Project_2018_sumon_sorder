<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'enquiry_model'
		]);
	}
 
	public function index()
	{
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
		#-------------------------------#
		$data['title'] = "Enquiry List";
		$data['enquirys'] = $this->enquiry_model->read();
		$data['content'] = $this->load->view('enquiry',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 



 	public function create()
	{
		$data['title'] = "New Enquiry";
		#-------------------------------#
		$this->form_validation->set_rules('name','Name','required|max_length[50]');
		$this->form_validation->set_rules('email','Email Address','required|max_length[100]|valid_email');
		$this->form_validation->set_rules('phone','Phone Number','max_length[20]');
		$this->form_validation->set_rules('enquiry','Enquiry','required');
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			$postData = [
				'email' 	 => $this->input->post('email',true),
				'phone' 	 => $this->input->post('phone',true),
				'name' 		 => $this->input->post('name',true),
				'enquiry' 	 => $this->input->post('enquiry',true),
				'ip_address' => $this->input->ip_address(),
				'user_agent' => $this->input->user_agent(),
				'created_date' => date('Y-m-d H:i:s'),
				'status'     => 1
			];  
			if ($this->enquiry_model->create($postData)) {
				#set success message
				$data['enquiry_success'] = "Submit successfully!";
			} else {
				#set exception message
				$data['enquiry_exception'] = "Please try again!";
			} 

		} else {
			$data['enquiry_exception'] = validation_errors();
		}  

		echo json_encode($data);
	}

	public function view($enquiry_id = null)
	{  
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
		$data['title'] = "Information";
		#-------------------------------#
		#check enquiry is already checked 
		if ($this->enquiry_model->check_exists($enquiry_id) === false) {
			//update checked and checked_by field
			$this->enquiry_model->update([
				'enquiry_id' => $enquiry_id,
				'checked' 	 => 1,
				'checked_by' => $this->session->userdata('user_id'),
			]);
		}
		#-------------------------------#
		$data['enquiry'] = $this->enquiry_model->read_by_id($enquiry_id);
		$data['content'] = $this->load->view('enquiry_view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function delete($enquiry_id = null) 
	{
		if ($this->enquiry_model->delete($enquiry_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('enquiry');
	}
	
}
