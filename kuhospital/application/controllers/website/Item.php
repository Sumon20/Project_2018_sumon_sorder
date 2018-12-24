<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/item_model'
		]); 
	}
 

	public function index()
	{
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 

		$data['title'] = "Section Item";
		#-------------------------------#
		$data['items'] = $this->item_model->read();
		$data['content'] = $this->load->view('website/pages/item',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = "Add Item";
		#-------------------------------#  
		$this->form_validation->set_rules('name','Menu Name', 'required|max_length[20]'); 
		$this->form_validation->set_rules('title','Title','required|max_length[100]');			
		$this->form_validation->set_rules('description','Description','required'); 
		$this->form_validation->set_rules('position','Position','numeric|max_length[2]'); 
		#-------------------------------#		
		//icon_image upload
		$icon_image = $this->fileupload->do_upload(
			'assets_web/images/icon_image/',
			'icon_image'
		);
		// if icon_image is uploaded then resize the icon_image
		if ($icon_image !== false && $icon_image != null) {
			//if not blog post then resize
			if ($this->input->post('name', true) == 'about' || 
				$this->input->post('name', true) == 'blog') {
				$this->fileupload->do_resize(
					$icon_image, 
					640,
					427
				);
			} else {
				$this->fileupload->do_resize(
					$icon_image, 
					64,
					64
				);
			}

		}
		//if icon_image is not uploaded
		if ($icon_image === false) {
			$this->session->set_flashdata('exception', 'Invalid Icon Image!');
		}		
		#-------------------------------#
		$data['menu_name'] = [ 
			'' 	 		 => 'Select Option', 
			'about' 	 => 'About', 
			'appointment'=> 'Appointment', 
			'blog' 		 => 'Blog',  
			'service' 	 => 'Service',  
		];
		#-------------------------------#
		if ($this->input->post('name') == 'blog') {
			$description = $this->input->post('description', true);
		} else {
			$description = strip_tags($this->input->post('description', true));
		}
		#-------------------------------#
		$data['item'] = (object)$itemData = [
			'id' 			 => $this->input->post('id', true),
			'name' 			 => $this->input->post('name', true),
			'title' 		 => $this->input->post('title', true),
			'description'    => $description,
			'position'       => $this->input->post('position', true),
			'counter'        => 0,
			'icon_image'     => (!empty($icon_image)?$icon_image:$this->input->post('old_image')),
			'status'         => $this->input->post('status', true),
			'date'           => date('Y-m-d')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($itemData['id'])) {
				if ($this->item_model->create($itemData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/item/create');
			} else {
				if ($this->item_model->update($itemData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('website/item/edit/'.$itemData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/item_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null) 
	{
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login');
		$data['title'] = "Item Edit";
		#-------------------------------#
		$data['menu_name'] = [ 
			'' 	 		 => 'Select Option', 
			'about' 	 => 'About', 
			'appointment'=> 'Appointment', 
			'blog' 		 => 'Blog',  
			'department' => 'Department',
			'doctor' 	 => 'Doctor', 
			'service' 	 => 'Service',  
		];
		#-------------------------------#		
		$data['item'] = $this->item_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/item_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login');
		if ($this->item_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('website/item/');
	}

}
