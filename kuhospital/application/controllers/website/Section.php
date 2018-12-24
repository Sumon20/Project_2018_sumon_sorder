<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/section_model'
		]); 

		
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}
 

	public function index()
	{
		$data['title'] = "Section";
		#-------------------------------#
		$data['sections'] = $this->section_model->read();
		$data['content'] = $this->load->view('website/pages/section',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = "Add Section";
		#-------------------------------# 
		if($this->input->post('id') == null) {
			$is_unique =  '|is_unique[ws_section.name]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('name','Section Name', 'required'.$is_unique);
		#-------------------------------#
		$this->form_validation->set_rules('title','Title','max_length[100]');
		$this->form_validation->set_rules('description','Description','trim');
		#-------------------------------#
		$data['section_slag'] = [ 
			'' 	 		 => 'Select Option', 
			'about' 	 => 'About', 
			'appointment'=> 'Appointment', 
			'blog' 		 => 'Blog',  
			'department' => 'Department', 
			'doctor' 	 => 'Doctor',   
			'service' 	 => 'Service',  
		];
		#-------------------------------#		
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets_web/images/uploads/',
			'featured_image'
		); 
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', 'Invalid Featured Image!');
		}
		#-------------------------------# 
		$data['section'] = (object)$secData = [
			'id' 			 => $this->input->post('id'),
			'name' 			 => $this->input->post('name'),
			'title' 		 => $this->input->post('title'),
			'description'    => $this->input->post('description'),
			'featured_image' => (!empty($picture)?$picture:$this->input->post('old_image')),
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($secData['id'])) {
				if ($this->section_model->create($secData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/section/create');
			} else {
				if ($this->section_model->update($secData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/section/edit/'.$secData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/section_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null) 
	{
		$data['title'] = "Section Edit";
		#-------------------------------#
		$data['section_slag'] = [ 
			'' 	 		 => 'Select Option', 
			'about' 	 => 'About', 
			'appointment'=> 'Appointment', 
			'blog' 		 => 'Blog',  
			'department' => 'Department', 
			'doctor' 	 => 'Doctor',   
			'service' 	 => 'Service',  
		];
		#-------------------------------#		
		$data['section'] = $this->section_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/section_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($id = null) 
	{
		if ($this->section_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('website/section/');
	}



}
