<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* #********************************************#
  #                               #
  #*********************************************#
  #                    #
  #          #
  #        #
  #                                             #
  #                           #
  #        #
  #                                             #
  #*********************************************# */

class Profile extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/profile_model', 'profile_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Profile';
        $data['user_info'] = $this->profile_mdl->get_user_info($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/profile/edit_profile_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function update_profile_details($profile_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $config = array(
            array(
                'field' => 'first_name',
                'label' => 'first name',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|max_length[50]'
            ),
            array(
                'field' => 'mobile_number',
                'label' => 'mobile number',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['first_name'] = $this->input->post('first_name', TRUE);
            $data['last_name'] = $this->input->post('last_name', TRUE);
            $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
            $data['gender'] = $this->input->post('gender', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
                $data['avatar'] = $this->update_picture();
            }

            $insert_id = $this->profile_mdl->update_user_info($user_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Profile update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/profile', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/profile/', 'refresh');
            }
        }
    }

    public function update_picture() {
        $current_picture = $this->input->post('current_picture', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/profile_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; //kb
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['file_ext_tolower'] = TRUE;

            $fdata = array();
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture_name')) {
                $sdata['exception'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user/profile', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file);
                if (!empty($current_picture)) {
                    unlink('assets/uploaded_files/profile_img/' . $current_picture);
                    unlink('assets/uploaded_files/profile_img/resize/' . $current_picture);
                }
                $sdata['avatar'] = $picture_name;
                $this->session->set_userdata($sdata);
                return $picture_name;
            }
        } else {
            return $current_picture;
        }
    }

    public function update_picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 100;
        $config_resize['height'] = 100;
        $config_resize['new_image'] = 'assets/uploaded_files/profile_img/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/profile', 'refresh');
        }
        return TRUE;
    }

    public function change_password() {
        $data = array();
        $data['title'] = 'Change Password';
        $data['user_info'] = $this->profile_mdl->get_user_info($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/profile/change_password_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function update_password() {
        $config = array(
            array(
                'field' => 'current_password',
                'label' => 'current password',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'password',
                'label' => 'new password',
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
            $this->change_password();
        } else {
            $current_password = md5($this->input->post('current_password', TRUE));
            $data['password'] = md5($this->input->post('password', TRUE));
            $data['last_updated'] = date('Y-m-d H:i:s');
            $user_id = $this->session->userdata('user_id');

            $check_password = $this->profile_mdl->check_current_password($user_id, $current_password);

            if (!empty($check_password)) {
                $result = $this->profile_mdl->update_user_info($user_id, $data);
                if (!empty($result)) {
                    $sdata['success'] = 'Password update successfully . ';
                    $this->session->set_userdata($sdata);
                    redirect('user/profile/change_password', 'refresh');
                } else {
                    $sdata['exception'] = 'Something went wrong ! Please try again.';
                    $this->session->set_userdata($sdata);
                    redirect('user/profile/change_password', 'refresh');
                }
            } else {
                $sdata['exception'] = 'Current password does not match !';
                $this->session->set_userdata($sdata);
                redirect('user/profile/change_password', 'refresh');
            }
        }
    }

}
