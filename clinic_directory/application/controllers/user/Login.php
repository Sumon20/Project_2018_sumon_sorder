<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id != NULL) {
            redirect('user/dashboard', 'refresh');
        }

        $this->load->model('user_models/login_model', 'login_mdl');
        $this->load->model('mailer_models/mailer_model', 'mail_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'User Login';
        $data['main_content'] = $this->load->view('directory_views/user/login/user_login_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function check_user_login($id = NULL, $path = NULL) {
        $this->form_validation->set_rules('username_or_email_address', 'username or email address', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $sdata['exception'] = validation_errors();
            $this->session->set_userdata($sdata);
            redirect('user/login', 'refresh');
        } else {
            $result = $this->login_mdl->check_user_login();
            if (!empty($result)) {
                $sdata['user_id'] = $result->user_id;
                $sdata['first_name'] = $result->first_name;
                $sdata['last_name'] = $result->last_name;
                $sdata['package_id'] = $result->package_id;
                $sdata['avatar'] = $result->avatar;
                $this->session->set_userdata($sdata);
                $this->redirect_path($id, $path);
            } else {
                $sdata['exception'] = 'The <b>Username</b> or <b>Password</b> you’ve entered doesn’t match any account !';
                $this->session->set_userdata($sdata);
                redirect('user/login', 'refresh');
            }
        }
    }

    public function redirect_path($id, $path) {
        if (!empty($id) && !empty($path)) {
            if ($path == 'images') {
                redirect('images/image_details/' . $id, 'refresh');
            }
        } else {
            redirect('user/dashboard', 'refresh');
        }
    }

    public function forgot_password() {
        $data = array();
        $data['title'] = 'Forgot Password';
        $data['main_content'] = $this->load->view('directory_views/user/login/forgot_password_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function reset_request() {
        $email_address = $this->input->post('email_address', true);
        $result = $this->login_mdl->user_info($email_address);

        $en_customer_id = $this->encrypt->encode($result['user_id']);
        $en_rep_customer_id = str_replace("/", "%F2", $en_customer_id);

        $setting_info = $this->mail_mdl->get_settings_info();

        if (!empty($result)) {
            /* --------------Start Reset Email------------ */
            $mdata = array();
            $mdata['from_address'] = $setting_info['email_address'];
            $mdata['to_address'] = $email_address;
            $mdata['subject'] = 'Password Reset Request';
            $mdata['message'] = 'Click the following link to change your password.';
            $mdata['user_id'] = $en_rep_customer_id;
            $mdata['full_name'] = $result['first_name'] . " " . $result['last_name'];
            $mdata['site_name'] = $setting_info['site_name'];
            $mdata['web'] = $setting_info['web'];
            $this->mail_mdl->sendEmail($mdata, 'reset_password');
            /* --------------End Reset Email------------ */
            $sdata = array();
            $sdata['success'] = "Password-reset link send to your <b>email </b>. Please check your email.";
            $this->session->set_userdata($sdata);
            redirect('user/login/forgot_password', 'refresh');
        } else {
            $sdata = array();
            $sdata['exception'] = "Email does not exist ! <br> Please input valid email.";
            $this->session->set_userdata($sdata);
            redirect('user/login/forgot_password', 'refresh');
        }
    }

    public function reset_password($user_id) {
        $data = array();
        $data['title'] = 'Reset Password';
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('directory_views/user/login/reset_password_v', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function create_new_password($user_id) {
        $config = array(
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required|min_length[8]|max_length[20]'
            ),
            array(
                'field' => 'confirm_password',
                'label' => 'confirm password',
                'rules' => 'trim|required|matches[password]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $sdata['exception'] = validation_errors();
            $this->session->set_userdata($sdata);
            redirect('user/login/reset_password/' . $user_id, 'refresh');
        } else {
            $de_rep_id = str_replace("%F2", "/", $user_id);
            $u_id = $this->encrypt->decode($de_rep_id);
            $password = md5($this->input->post('password', TRUE));

            $result = $this->login_mdl->change_forgot_password($u_id, $password);

            $user_info = $this->login_mdl->user_info_by_id($u_id);

            if (!empty($result)) {
                $sdata['message'] = 'Password change successfully. You may login now..';
                $this->session->set_userdata($sdata);
                if ($user_info['access_label'] < 5) {
                    redirect('cms', 'refresh');
                } else {
                    redirect('user/login', 'refresh');
                }
            } else {
                $sdata['exception'] = 'Something went wrong ! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/login/reset_password/' . $user_id, 'refresh');
            }
        }
    }

}
