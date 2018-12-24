<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'patient_model'
		]);

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
		
	}
 
	public function index()
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		$data['title'] = "Patient List";
		$data['patients'] = $this->patient_model->read();
		$data['content'] = $this->load->view('patient',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	//inserting data to the 
	public function create()
	{
		$data['title'] = "Add Patient";
		#-------------------------------#
		$this->form_validation->set_rules('firstname','First Name','required|max_length[50]');
		$this->form_validation->set_rules('lastname','Last Name','required|max_length[50]');
		$this->form_validation->set_rules('phone','Phone Number','max_length[20]');
		$this->form_validation->set_rules('mobile','Mobile Number','required|max_length[20]');
		$this->form_validation->set_rules('blood_group','Blood Group','max_length[10]');
		$this->form_validation->set_rules('sex','Sex','required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth','Date of birth','required|max_length[10]');
		$this->form_validation->set_rules('address','Address','required|max_length[255]');
		$this->form_validation->set_rules('status','Status','required');
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
			$this->session->set_flashdata('exception', 'Invalid picture!');
		}
		#-------------------------------#
		if ($this->input->post('id',true) == null) { //create a patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id',true),
				'patient_id'   => "P".$this->randStrGen(2,7),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'sex' 		   => $this->input->post('sex',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'address' 	   => $this->input->post('address',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'affliate'     => null,
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status',true),
			]; 
		} else { // update patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id',true),
				'firstname'    => $this->input->post('firstname',true),
				'lastname' 	   => $this->input->post('lastname',true),
				'phone'   	   => $this->input->post('phone',true),
				'mobile'       => $this->input->post('mobile',true),
				'blood_group'  => $this->input->post('blood_group',true),
				'sex' 		   => $this->input->post('sex',true),
				'date_of_birth' => $this->input->post('date_of_birth',true),
				'address' 	   => $this->input->post('address',true),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'affliate'     => null, 
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status',true),
			]; 
		}
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				if ($this->patient_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}

				redirect('patient/profile/' . $this->db->insert_id());
			} else {
				if ($this->patient_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
				redirect('patient/edit/'.$postData['id']);
			}

		} else {
			$data['content'] = $this->load->view('patient_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


	public function profile($patient_id = null)
	{ 
		$data['title'] = "Patient Information";
		#-------------------------------#
		$data['profile'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient_profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function edit($patient_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login');

		$data['title'] = "Patient Edit";
		#-------------------------------#
		$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($patient_id = null) 
	{
		if ($this->session->userdata('user_role') != 1) 
		redirect('login'); 

		if ($this->patient_model->delete($patient_id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('patient');
	}



    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function randStrGen($mode = null, $len = null){
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
