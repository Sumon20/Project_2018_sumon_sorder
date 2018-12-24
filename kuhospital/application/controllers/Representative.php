<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Representative extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'representative_model'
		]);
		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 		
	}
 
	public function index()
	{ 		  
		if ($this->session->userdata('user_role') != 1) 
			redirect('login'); 

		$data['title'] = "Representative List";
		#-------------------------------#
		$data['representatives'] = $this->representative_model->read();
		$data['content'] = $this->load->view('representative',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		if ($this->session->userdata('user_role') != 1
			&& $this->session->userdata('user_role') != 3) 
			redirect('login'); 

		$data['title'] = "Add Representative";
		#-------------------------------#
		$this->form_validation->set_rules('firstname','First Name','required|max_length[50]');
		$this->form_validation->set_rules('lastname','Last Name','required|max_length[50]');
		if ($this->input->post('user_id',true) == null) {
			$this->form_validation->set_rules('email','Email Address','required|max_length[50]|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password','Password','required|max_length[32]|md5');
		}
		$this->form_validation->set_rules('phone','Phone Number','max_length[20]');
		$this->form_validation->set_rules('mobile','Mobile Number','required|max_length[20]');
		$this->form_validation->set_rules('blood_group','Blood Group','max_length[10]');
		$this->form_validation->set_rules('sex','Sex','required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth','Date of birth','max_length[10]');
		$this->form_validation->set_rules('address','Address','required|max_length[255]');
		$this->form_validation->set_rules('status','Status','required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/representative/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 
				200,
				150
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', 'Invalid picture!');
		}
		#-------------------------------#
		//when create a user
		if ($this->input->post('user_id',true) == null) {
			$data['representative'] = (object)$postData = [
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'email' 	   => $this->input->post('email',true),
				'password' 	   => md5($this->input->post('password',true)),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'sex' 		   => $this->input->post('sex',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'address' 	   => $this->input->post('address',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'user_role'    => 3,
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status',true),
			]; 
		} else { //update a user
			$data['representative'] = (object)$postData = [ 
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'sex' 		   => $this->input->post('sex',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'address' 	   => $this->input->post('address',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),  
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status',true),
			]; 
		} 

		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $user_id then insert data
			if (empty($postData['user_id'])) {
				if ($this->representative_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!"); 
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				} 

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id') && !empty($picture)) {
					$this->session->set_userdata('picture',$picture);
				}
				
				redirect('representative/create');
			} else {
				if ($this->representative_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id') && !empty($picture)) {
					$this->session->set_userdata('picture',$picture);
				}

				redirect('representative/edit/'.$postData['user_id']);
			} 

		} else {
			$data['content'] = $this->load->view('representative_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}
 

	public function edit($user_id = null) 
	{
		if ($this->session->userdata('user_role') != 1
			&& $this->session->userdata('user_role') != 3) 
			redirect('login');

		$data['title'] = "Representative Edit";
		#-------------------------------#
		$data['representative'] = $this->representative_model->read_by_id($user_id);
		#-------------------------------#
		if (($data['representative']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 1)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('representative_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($user_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 	

		if ($this->representative_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('representative');
	}

}
