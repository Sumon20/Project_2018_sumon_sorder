<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CC_Controller {
   

    public function __construct() {
        parent::__construct();
        $this->load->model('directory_models/subscribers_model', 'subscribers_mdl');
    }

    public function add_subscriber() {
        $config = array(
            array(
                'field' => 'email_address',
                'label' => 'email address',
                'rules' => 'trim|required|valid_email|max_length[100]|is_unique[dir_subscribers.email_address]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $data['email_address'] = $this->input->post('email_address', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');

            $inser_id = $this->subscribers_mdl->store_subscriber($data);
            if (!empty($inser_id)) {
                redirect('home', 'refresh');
            } else {
                redirect('home', 'refresh');
            }
        }
    }

}
