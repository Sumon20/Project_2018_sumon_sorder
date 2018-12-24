<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'doctor_model',
			'department_model'
		]);

		if ($this->session->userdata('isLogIn') == false)
		redirect('login'); 	
	}

 
	public function index()
	{ 
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Doctor List";
		$data['doctors'] = $this->doctor_model->read();
		$data['content'] = $this->load->view('doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 


	public function create()
	{
		if ($this->session->userdata('user_role') != 1
			&& $this->session->userdata('user_role') != 2) 
			redirect('login'); 
	
		$data['title'] = "Add Doctor";
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
			'assets/images/doctor/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 
				293,
				350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', 'Invalid picture!');
		}
		#-------------------------------# 
		//when create a user
		if ($this->input->post('user_id',true) == null) {//user id jodi na thake tahole data insert
			$data['doctor'] = (object)$postData = [
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'email' 	   => $this->input->post('email',true),
				'password' 	   => md5($this->input->post('password',true)),
				'user_role'    => 2,
				'designation'  => $this->input->post('designation',true),
				'department_id' => $this->input->post('department_id',true),
				'address' 	   => $this->input->post('address',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'short_biography' => $this->input->post('short_biography',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'specialist'   => $this->input->post('specialist',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'sex' 		   => $this->input->post('sex',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'city_id'  => $this->input->post('city_id',true),
				'lat'  => $this->input->post('lat',true),
				'lng'  => $this->input->post('lng',true),
				'degree'  	   => $this->input->post('degree',true),
				'created_by'   => $this->session->userdata('user_id'),
				'create_date'  => date('Y-m-d'),
				'status'       => $this->input->post('status',true),
				
			]; 
		} else { //update a user 
			$data['doctor'] = (object)$postData = [
				'user_id'      => $this->input->post('user_id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'designation'  => $this->input->post('designation',true),
				'department_id' => $this->input->post('department_id',true),
				'address' 	   => $this->input->post('address',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'short_biography' => $this->input->post('short_biography',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'specialist'   => $this->input->post('specialist',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'sex' 		   => $this->input->post('sex',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'city_id'  => $this->input->post('city_id',true),
				'lat'  => $this->input->post('lat',true),
				'lng'  => $this->input->post('lng',true),
				'degree'  	   => $this->input->post('degree',true),
				'created_by'   => $this->session->userdata('user_id'),
				'create_date'  => date('Y-m-d'),
				'status'       => $this->input->post('status',true),
			]; 
		}

       //sending in listing e data patano
		$data['listing'] = (object)$listingdata = [
			
			'company_name'    => $this->input->post('firstname',true),
			'category_id'     => 15,
			'verification_status' => 1,
            'is_featured' => 1,
            'user_id' => 7,
			'email' 	   => $this->input->post('email',true),
			'publication_status' => 1,
			'deletion_status' => 0,
			'city_id'  => $this->input->post('city_id',true),
			'lat' => $this->input->post('lat', true),
            'lng' => $this->input->post('lng', true),
			
            			
			'designation'  => $this->input->post('designation',true),
			
			'address' 	   => $this->input->post('address',true),
			'phone'   	   => $this->input->post('phone',true),
			'mobile'       => $this->input->post('mobile',true),
			'short_biography' => $this->input->post('short_biography',true),
			
			'specialist'   => $this->input->post('specialist',true),
			
			
			'degree'  	   => $this->input->post('degree',true),
			
			
			

			
		]; 
		







		#-------------------------------#
		if ($this->form_validation->run() === true) {

			$this->doctor_model->store_company_info($listingdata);

			// if (!empty($insert_id)) {
            //     $sdata['success'] = 'Congratulation!! Information data add successfully. ';
            //     $this->session->set_userdata($sdata);
               
            // } else {
            //     $sdata['exception'] = 'Something went wrong!! Please try again.';
            //     $this->session->set_userdata($sdata);
               
            // }

			#if empty $user_id then insert data
			if (empty($postData['user_id'])) {
				if ($this->doctor_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]); 
				}

				redirect('doctor/create');
			} else {
				if ($this->doctor_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {					
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]); 
				}
				
				redirect('doctor/edit/'.$postData['user_id']);
			}

		} else {
			$data['department_list'] = $this->department_model->department_list(); 
			$data['content'] = $this->load->view('doctor_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}
 

	public function profile($user_id = null)
	{ 		
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Doctor Profile";
		#-------------------------------#
		$data['user'] = $this->doctor_model->read_by_id($user_id);
		$data['content'] = $this->load->view('doctor_profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function profileview($user_id = null)
	{
		
		
		$data['title'] = "Doctor Profile";
		#-------------------------------#
		$data['user'] = $this->doctor_model->read_by_id($user_id);
		$data['content'] = $this->load->view('doctor_profile',$data,true);
		$this->load->view('layout/main_doctorview',$data);

		
	}


	public function edit($user_id = null) 
	{
		
		$user_role = $this->session->userdata('user_role');
		if ($user_role != 1
			&& $user_role != 2) 
			redirect('login'); 
	
		if ($user_role == 1 && $this->session->userdata('user_id') == $user_id)
			$data['title'] = "Edit Profile";  
		elseif ($user_role == 2)
			$data['title'] = "Edit Profile";
		else
			$data['title'] = "Edit Doctor";
		#-------------------------------#
		$data['department_list'] = $this->department_model->department_list(); 
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);
		#-------------------------------#
		if (($data['doctor']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 1)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('doctor_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($user_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		if ($this->doctor_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('doctor');
	}

}
