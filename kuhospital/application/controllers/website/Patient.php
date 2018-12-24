<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/home_model',
			'website/patient_model'
		]);
		
	}
 
	public function create()
	{
		$data['title'] = "Add Patient";
		#-------------------------------#
		$this->form_validation->set_rules('firstname','First Name','required|max_length[50]');
		$this->form_validation->set_rules('lastname','Last Name','required|max_length[50]');
		$this->form_validation->set_rules('phone','Phone Number','max_length[20]');
		$this->form_validation->set_rules('mobile','Mobile Number','required|max_length[20]');
		$this->form_validation->set_rules('email','Email Address','required|max_length[55]');
		$this->form_validation->set_rules('blood_group','Blood Group','max_length[10]');
		$this->form_validation->set_rules('sex','Sex','required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth','Date of birth','required|max_length[10]');
		$this->form_validation->set_rules('address','Address','required|max_length[255]');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/patient/',
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
			$data['image_exception'] = "Invalid picture!"; 
		}
		#-------------------------------#
		$postData = [
			'id'   		   => $this->input->post('id',true),
			'patient_id'   => "P".$this->tokenGenerator(2,7),
			'firstname'    => $this->input->post('firstname',true),
			'lastname' 	   => $this->input->post('lastname',true),
			'phone'   	   => $this->input->post('phone',true),
			'mobile'       => $this->input->post('mobile',true),
			'email'       => $this->input->post('email',true),
			'blood_group'  => $this->input->post('blood_group',true),
			'sex' 		   => $this->input->post('sex',true),
			'date_of_birth' => $this->input->post('date_of_birth',true),
			'address' 	   => $this->input->post('address',true),
			'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
			'affliate'     => null,
			'create_date'  => date('Y-m-d'),
			'created_by'   => $this->session->userdata('user_id'),
			'status'       => 1,
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if ($this->patient_model->create($postData)) {
				#set success message 
				$data['message'] = "Registration successful";
			} else {
				#set exception message
				$data['exception'] = "Please try again..."; 
			} 

			redirect('patient_info/' . $postData['patient_id']);

		} else {
			$data['exception'] = validation_errors();
		} 
		$data['p_status'] = 2;
        $this->session->set_flashdata($data);
        redirect($_SERVER['HTTP_REFERER']."#appointment");
	}


	public function profile($patient_id = null)
	{ 
		$data['title'] = "Patient Information";
		#-------------------------------#
        $data['setting'] = $this->home_model->setting();
		$data['profile'] = $this->patient_model->read($patient_id);
        // if(empty($data['profile'])) show_404();
		$this->load->view('website/patient_wrapper',$data);
	}


    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function tokenGenerator($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }
    /*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
    */
}
