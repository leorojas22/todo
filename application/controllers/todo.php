<?php


	class Todo extends CI_Controller {
		
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model("todo_model");
			
		}
		

		public function index() {
					
			$this->load->helper(array("url", "asset"));
			
			$header['pageTitle'] = "Main";

			$this->load->view("template/header", $header);
			
			$this->todo_list();
			
			$this->load->view("template/footer");
			
		}
		
		public function todo_list() {

			$data['todos'] = $this->todo_model->get_todos();
			$this->load->view("todo_list", $data);
			
		}
		
		public function delete() {

			if($this->todo_model->delete_todo($this->input->post("todo"))) {
				
				$data['json'] = json_encode(array("result" => "success"));
			}
			else {
				
				$data['json'] = json_encode(array("result" => "fail"));
			}
			
			
			$this->load->view("json", $data);
			
		}
		
		public function post() {

			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("message", "Todo", "required");
			$this->form_validation->set_message("required", "You forgot to enter a %s!");
			
			
			$arrJSON = array();
			
			if($this->form_validation->run() === false) {
				$arrJSON['result'] = "fail";
				$arrJSON['errors'] = validation_errors();
			}
			else {
				
				$this->todo_model->add_todo($this->input->post("message"));
				
				$arrJSON['result'] = "success";
				$arrJSON['data'] = $this->todo_model->get_todos();
				
			}
			
			$data['json'] = json_encode($arrJSON);
			
			$this->load->view("json", $data);
			
		}
		
	}


?>