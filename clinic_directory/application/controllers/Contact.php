<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CC_Controller {
  

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/search_model', 'search_mdl');
        $this->load->model('mailer_models/mailer_model', 'mail_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Contact US';
        $data['main_content'] = $this->load->view('directory_views/contact/contact_us_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function send() {
        $config = array(
            array(
                'field' => 'full_name',
                'label' => 'name',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'email_address',
                'label' => 'email address',
                'rules' => 'trim|required|valid_email|max_length[100]'
            ),
            array(
                'field' => 'subject',
                'label' => 'subject',
                'rules' => 'trim|required|max_length[250]'
            ),
            array(
                'field' => 'message',
                'label' => 'message',
                'rules' => 'trim|required|max_length[2500]'
            ),
            array(
                'field' => 'security_code',
                'label' => 'ans',
                'rules' => 'trim'
            ),
            array(
                'field' => 'confirm_security_code',
                'label' => 'result',
                'rules' => 'trim|required|matches[security_code]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['full_name'] = $this->input->post('full_name', TRUE);
            $data['email_address'] = $this->input->post('email_address', TRUE);
            $data['subject'] = $this->input->post('subject', TRUE);
            $data['message'] = $this->input->post('message', TRUE);
            $setting_info = $this->mail_mdl->get_settings_info();
//            echo '<pre>';
//            print_r($setting_info);
//            exit();
            
            /* --------------Start Send Contact Email------------ */
            $mdata = array();
            $mdata['from_address'] = $data['email_address'];
            $mdata['to_address'] = $setting_info['email_address'];
            $mdata['subject'] = $data['subject'];
            $mdata['message'] = $data['message'];
            $mdata['full_name'] = $data['full_name'];
            $mdata['site_name'] = $setting_info['site_name'];
            $mdata['web'] = $setting_info['web'];
            $this->mail_mdl->sendEmail($mdata, 'basic_email');
            /* --------------End Send Contact Email------------ */
            $sdata = array();
            $sdata['success'] = "Email send successfully. Thank you.";
            $this->session->set_userdata($sdata);
            redirect('contact', 'refresh');
        }
    }

}
