<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'dashboard_model',
            'setting_model'
        ]);
    }
 
    public function index()
    { 
        if ($this->session->userdata('isLogIn') === true) 
            redirect('dashboard/home'); 
        #-------------------------------#
        $data['title'] = "Login"; 
        #-------------------------------#
        $this->form_validation->set_rules('email','Email Address','required|max_length[50]|valid_email');
        $this->form_validation->set_rules('password','Password','required|max_length[32]|md5');
        $this->form_validation->set_rules('user_role','User role','required');
        #-------------------------------#
        $data['user'] = (object)$postData = [
            'email'     => $this->input->post('email',true),
            'password'  => md5($this->input->post('password',true)),
            'user_role' => $this->input->post('user_role',true),
        ]; 
        #------------- login cheak------------------#
        if ($this->form_validation->run() === true) {
            //check user data
            $check_user = $this->dashboard_model->check_user($postData);

            if ($check_user->num_rows() === 1) {
                //retrive setting data and store to session
                $setting = $this->setting_model->read($postData);

                //store data in session
                $this->session->set_userdata([
                    'isLogIn'   => true,
                    'user_id'   => $check_user->row()->user_id,
                    'email'     => $check_user->row()->email,
                    'fullname'  => $check_user->row()->firstname.' '.$check_user->row()->lastname,
                    'user_role' => $check_user->row()->user_role,
                    'picture'   => $check_user->row()->picture, 
                    'title'     => (!empty($setting->title)?$setting->title:null),
                    'address'   => (!empty($setting->description)?$setting->description:null),
                    'logo'      => (!empty($setting->logo)?$setting->logo:null),
                    'favicon'      => (!empty($setting->favicon)?$setting->favicon:null),
                    'footer_text' => (!empty($setting->footer_text)?$setting->footer_text:null),
                ]);
                //redirect to dashboard home page
                redirect('dashboard/home');//dasboard home call ei page e
            } else {
                #set exception message
                $this->session->set_flashdata('exception',"Incorrect email/password!");
                //redirect to login form
                redirect('login');
            }

        } else {
            $this->load->view('layout/login_wrapper',$data);
        } 
    }  

    public function home()
    {   
        if ($this->session->userdata('isLogIn') == false) 
            redirect('login'); 
        if ($this->session->userdata('user_role') == 2) //for doctor
            redirect('report/assign_to_me'); 
        if ($this->session->userdata('user_role') == 3) //for representative
            redirect('report/assign_by_me'); 

        $data['title'] = "Home";
        #------------------------------#
        $data['notify'] = $this->dashboard_model->notify(); 
        $data['enquires'] = $this->dashboard_model->enquiry();  
        $data['chart'] = $this->dashboard_model->chart();    
        $data['content'] = $this->load->view('home',$data,true);//dassboard data view
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function profile()
    { 
        if ($this->session->userdata('isLogIn') == false) 
            redirect('login'); 
        $data['title'] = "Profile";
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['user']    = $this->dashboard_model->read_by_id($user_id);
        $data['content'] = $this->load->view('profile',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function logout()
    {  
        $this->session->sess_destroy(); 
        redirect('login');
    } 


    
 
}
