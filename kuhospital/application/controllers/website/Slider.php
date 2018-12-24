<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/slider_model'
		]); 
 
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

	public function index()
	{
		$data['title'] = "Slider";
		#-------------------------------#
		$data['sliders'] = $this->slider_model->read();
		$data['content'] = $this->load->view('website/pages/slider',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = "Add Slider";
		#-------------------------------# 
		$this->form_validation->set_rules('title','Title','max_length[100]');
		$this->form_validation->set_rules('subtitle','Sub Title','max_length[100]');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('position','Slide Position','trim|numeric|max_length[2]');
		#-------------------------------#		
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/images/slider/',
			'image'
		); 
		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', 'Invalid Image!');
		} 
		#-------------------------------# 
		$data['slider'] = (object)$secData = [
			'id' 			 => $this->input->post('id',true),
			'title' 		 => $this->input->post('title',true),
			'subtitle' 		 => $this->input->post('subtitle',true),
			'description'    => $this->input->post('description',true),
			'image' => (!empty($image)?$image:$this->input->post('old_image')),
			'position' 		 => $this->input->post('position',true), 
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if(empty($secData['image'])) {
				$this->session->set_flashdata('exception', 'The Image field is required');
				redirect('website/slider/create');
			}



			#if empty $id then insert data
			if (empty($secData['id'])) {
				if ($this->slider_model->create($secData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/slider/create');
			} else {
				if ($this->slider_model->update($secData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/slider/edit/'.$secData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/slider_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null) 
	{
		$data['title'] = "Slider Edit";
		#-------------------------------# 	
		$data['slider'] = $this->slider_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/slider_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{
		if ($this->slider_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('website/slider/');
	}

}

