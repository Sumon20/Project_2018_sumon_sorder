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

class Products extends CC_Controller {

    public function __construct() {
        parent::__construct();

        $user_id = $this->session->userdata('user_id');
        if ($user_id == NULL) {
            redirect('user/login', 'refresh');
        }

        $this->load->model('user_models/products_model', 'products_mdl');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Manage Products';
        $data['products_info'] = $this->products_mdl->get_all_products($this->session->userdata('user_id'));
        $data['user_content'] = $this->load->view('directory_views/user/products/manage_products_v.php', $data, TRUE);
        $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
        $this->load->view('directory_views/user_master_v', $data);
    }

    public function add_product() {
        $data = array();
        $data['listing_info'] = $this->products_mdl->get_all_listing($this->session->userdata('user_id'));
        if (!empty($data['listing_info'])) {
            $data['title'] = 'Add Product';
            $data['count_products'] = $this->products_mdl->count_all_products_by_user_id($this->session->userdata('user_id'));
            $data['user_content'] = $this->load->view('directory_views/user/products/add_product_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
            $sdata['exception'] = 'Please first add your business.';
            $this->session->set_userdata($sdata);
            redirect('user/listing/add_listing', 'refresh');
        }
    }

    public function store_product_details() {
        $config = array(
            array(
                'field' => 'product_name',
                'label' => 'product name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'product_details',
                'label' => 'product details',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        if (empty($_FILES['picture_name']['name'])) {
            $this->form_validation->set_rules('picture_name', 'picture', 'required');
        }
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->add_product();
        } else {
            $data['product_name'] = $this->input->post('product_name', TRUE);
            $data['product_details'] = $this->input->post('product_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['date_added'] = date('Y-m-d H:i:s');
            $data['user_id'] = $this->session->userdata('user_id');
            $data['image_path'] = $this->add_picture();

            $insert_id = $this->products_mdl->store_product_info($data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Product add successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/products', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/products/add_products', 'refresh');
            }
        }
    }

    public function add_picture() {
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_products/';
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
                redirect('user/products/add_product', 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->picture_resize($path, $file);
                return $picture_name;
            }
        } else {
            $sdata['exception'] = 'Picture is required. Please <b>upload a picture</b> and try again !';
            $this->session->set_userdata($sdata);
            redirect('user/products/add_product', 'refresh');
        }
    }

    public function picture_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_products/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/products/add_product', 'refresh');
        }
        return TRUE;
    }

    public function edit_product($product_id = NULL) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['product_info'] = $this->products_mdl->get_product_by_product_id_and_user_id($user_id, $product_id);
        if (!empty($data['product_info'])) {
            $data['title'] = 'Edit Product';
            $data['listing_info'] = $this->products_mdl->get_all_listing($user_id);
            $data['user_content'] = $this->load->view('directory_views/user/products/edit_product_v.php', $data, TRUE);
            $data['main_content'] = $this->load->view('directory_views/user/dashboard_master.php', $data, TRUE);
            $this->load->view('directory_views/user_master_v', $data);
        } else {
//            $sdata['exception'] = 'Content not found !';
//            $this->session->set_userdata($sdata);
            redirect('user/products', 'refresh');
        }
    }

    public function update_product_details($product_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $products_info = $this->products_mdl->get_product_by_product_id_and_user_id($user_id, $product_id);
        if ($product_id == NULL || empty($products_info)) {
            $sdata['exception'] = 'Product not found !';
            $this->session->set_userdata($sdata);
            redirect('user/products', 'refresh');
        }
        $config = array(
            array(
                'field' => 'product_name',
                'label' => 'product name',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'product_details',
                'label' => 'product details',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'listing_id',
                'label' => 'business name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->edit_product($product_id);
        } else {
            $data['product_name'] = $this->input->post('product_name', TRUE);
            $data['product_details'] = $this->input->post('product_details', TRUE);
            $data['listing_id'] = $this->input->post('listing_id', TRUE);
            $data['last_updated'] = date('Y-m-d H:i:s');

            if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
                $data['image_path'] = $this->update_picture($product_id);
            }

            $insert_id = $this->products_mdl->update_product_info($product_id, $data);
            if (!empty($insert_id)) {
                $sdata['success'] = 'Product update successfully. ';
                $this->session->set_userdata($sdata);
                redirect('user/products', 'refresh');
            } else {
                $sdata['exception'] = 'Something went wrong!! Please try again.';
                $this->session->set_userdata($sdata);
                redirect('user/products/edit_product/' . $product_id, 'refresh');
            }
        }
    }

    public function update_picture($product_id) {
        $current_picture = $this->input->post('current_picture', TRUE);
        if (isset($_FILES['picture_name']['name']) && !empty($_FILES['picture_name']['name'])) {
            $config['upload_path'] = 'assets/uploaded_files/company_products/';
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
                redirect('user/products/edit_product/' . $product_id, 'refresh');
            } else {
                $fdata = $this->upload->data();
                $picture_name = $fdata['file_name'];
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['full_path'];
                $file = $data['upload_data']['file_name'];
                $this->update_picture_resize($path, $file, $product_id);
                if (!empty($current_picture)) {
                    unlink('assets/uploaded_files/company_products/' . $current_picture);
                    unlink('assets/uploaded_files/company_products/resize/' . $current_picture);
                }
                return $picture_name;
            }
        } else {
            return $current_picture;
        }
    }

    public function update_picture_resize($path, $file, $product_id) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['create_thumb'] = FALSE;
        $config_resize['maintain_ratio'] = FALSE;
        $config_resize['overwrite'] = FALSE;
        $config_resize['quality'] = "90%";
        $config_resize['width'] = 270;
        $config_resize['height'] = 220;
        $config_resize['new_image'] = 'assets/uploaded_files/company_products/resize/' . $file;

        $this->load->library('image_lib', $config_resize);
        if (!$this->image_lib->resize()) {
            $sdata['exception'] = $this->image_lib->display_errors();
            $this->session->set_userdata($sdata);
            redirect('user/products/edit_product/' . $product_id, 'refresh');
        }
        return TRUE;
    }

    public function remove_product($product_id = NULL) {
        $user_id = $this->session->userdata('user_id');
        $product_info = $this->products_mdl->get_product_by_product_id_and_user_id($user_id, $product_id);
        if (!empty($product_info)) {
            $result = $this->products_mdl->remove_product_by_id($product_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('user/products', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('user/products', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('user/products', 'refresh');
        }
    }

}
