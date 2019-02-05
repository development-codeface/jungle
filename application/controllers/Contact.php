<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
     	$this->load->helper(array('form', 'url'));
	
		
	 }
	 
	public function index()
	{
		if(isset($_POST['submit'])) {
			$this -> form_validation -> set_rules('name', 'name', 'trim|required');
			$this -> form_validation -> set_rules('email', 'email', 'trim|required|valid_email');
			$this -> form_validation -> set_rules('phone', 'contact no.', 'trim|required|numeric');
			$this -> form_validation -> set_rules('subject', 'subject', 'trim|required');
			$this -> form_validation -> set_rules('message', 'message', 'trim|required');
			
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			
			if ($this->form_validation->run() == FALSE) {
				$data['validation']=validation_errors();
				
				$this -> load -> view('contact/contact',$data);
			}
			else {
				$contact['name'] 		= $this->input->post('name');
				$contact['email'] 		= $this->input->post('email');
				$contact['phone'] 		= $this->input->post('phone');
				$contact['subject'] 	= $this->input->post('subject');
				$contact['message'] 	= $this->input->post('message');
				
				$this -> db -> insert('tbl_contact', $contact);
				
				$this -> session -> set_flashdata('success',"Thank you! We'll respond to you as quickly as possible.");
				
				redirect('contact');
			}
		}
		else {
			$this->load->view('contact/contact');
		}
	}
	
	
	
	
}
