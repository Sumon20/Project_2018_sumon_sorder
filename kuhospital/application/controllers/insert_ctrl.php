<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insert_ctrl extends CI_Controller {

public function __construct() 
{
parent::__construct();
$this->load->model([
    'doctor_model',
    'department_model'
]);
}

function index() {

//Including validation library
$this->load->library('form_validation');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

// //Validating Name Field
// $this->form_validation->set_rules('firstname', 'firstname', 'required|min_length[5]|max_length[15]');
// $this->form_validation->set_rules('lastname', 'lastname', 'required|min_length[5]|max_length[15]');

// //Validating Email Field
// $this->form_validation->set_rules('email', 'email', 'required|valid_email');

// //Validating Mobile no. Field
// $this->form_validation->set_rules('mobile', 'mobile');

// //Validating Address Field
// $this->form_validation->set_rules('address', 'address', 'required|min_length[10]|max_length[50]');
       $data['title'] = "Add Doctor";

        $this->form_validation->set_rules('firstname','First Name','required|max_length[50]');
		$this->form_validation->set_rules('lastname','Last Name','required|max_length[50]');
		$this->form_validation->set_rules('email','Email Address','required|max_length[50]|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|max_length[32]|md5');
        $this->form_validation->set_rules('mobile','Mobile Number','required|max_length[20]');
        $this->form_validation->set_rules('address','Address','required|max_length[255]');



if ($this->form_validation->run() == FALSE) {
$this->load->view('insert_view');
} else {
//Setting values for tabel columns
$data['doctor'] = (object)$postData = [
// 'Student_Name' => $this->input->post('dname'),
// 'Student_Email' => $this->input->post('demail'),
// 'Student_Mobile' => $this->input->post('dmobile'),
// 'Student_Address' => $this->input->post('daddress'),


'firstname'    => $this->input->post('firstname',true),
'lastname' 	   => $this->input->post('lastname',true),
'email' 	   => $this->input->post('email',true),
'password' 	   => md5($this->input->post('password',true)),
'mobile'       => $this->input->post('mobile',true),
'address' 	   => $this->input->post('address',true),
'user_role'    => 2,
'created_by'   => 2,
'status'       => 1,              
]; 

if ($this->form_validation->run() === true) {

    #if empty $user_id then insert data
    
        if ($this->doctor_model->create($postData)) {
            #set success message
            // $this->session->set_flashdata('message',"Save successfully!");
            $data['message'] = 'Data Inserted Successfully';
        } else {
            #set exception message
            $data['message'] = 'Data Not Inserted';
        }

//Transfering data to Model
// $this->insert_model->form_insert($data);

//Loading View
$this->load->view('insert_view', $data);
}
}

}
}

