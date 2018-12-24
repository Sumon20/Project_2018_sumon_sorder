<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			'website/comment_model'
		]);  
	}
 

	public function index()
	{   
		$data['title'] = "Comment";
		#-------------------------------#
		$data['comments'] = $this->comment_model->read();
		$data['content'] = $this->load->view('website/pages/comment',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{   
		$this->form_validation->set_rules('item_id','Post ID', 'required|strip_tags|max_length[11]'); 
		$this->form_validation->set_rules('name','Name', 'required|strip_tags|max_length[50]'); 
		$this->form_validation->set_rules('email','Email', 'required|max_length[100]|strip_tags|valid_email'); 
		$this->form_validation->set_rules('comment','Comment','required|strip_tags|max_length[1000]'); 
		#-------------------------------#		
		if ($this->form_validation->run() === true) {

			$commentData = [
				'item_id' 		 => $this->input->post('item_id', true),
				'name' 			 => $this->input->post('name', true),
				'email' 		 => $this->input->post('email', true),
				'comment'        => htmlspecialchars($this->input->post('comment', true)),
				'add_to_website' => 2,
				'date'           => date('Y-m-d h:i:s')
			];

			if ($this->comment_model->create($commentData)) {
				#set success message
				$data['message'] = "Thank you for your comment!";
			} else {
				#set exception message
				$data['exception'] = "Please try again!";
			}

		} else {
			#set exception message
			$data['exception'] = validation_errors();
		}  
		echo json_encode($data);
	} 


	public function status() 
	{
		$this->form_validation->set_rules('id','Comment ID', 'required|strip_tags|max_length[11]'); 
		$this->form_validation->set_rules('value','Comment Status', 'required|strip_tags|max_length[11]');   
		#-------------------------------#		
		if ($this->form_validation->run() === true) {

			$id = $this->input->post('id', true);
			$value = $this->input->post('value', true);
 
			$this->db->set('add_to_website', $value)
				->where('id', $id)
				->update('ws_comment');

			if ($this->db->affected_rows() > 0) {
				#set success message
				if ($value == 1) {
					$data['message'] = "Comment added successfully!";
				} else {
					$data['message'] = "Comment remove successfully!";
				}
			} else {
				#set exception message
				$data['exception'] = "Please try again!";
			}

		} else {
			#set exception message
			$data['exception'] = validation_errors();
		}  
		echo json_encode($data);
	}

	public function delete($id = null) 
	{
		if ($this->comment_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',"Delete successfully!");
		} else {
			#set exception message
			$this->session->set_flashdata('exception',"Please try again!");
		}
		redirect('website/comment/');
	}
 

}
