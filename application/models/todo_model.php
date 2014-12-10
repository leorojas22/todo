<?php


	class todo_model extends CI_Model {
		
		public function __construct() {
		
			$this->load->database();
		
		}
		
		
		public function get_todos() {
			
			$this->db->order_by("dateposted", "desc");
			$query = $this->db->get("todo");
			
			return $query->result_array();
		
		}
		
		public function delete_todo($todoID) {			
			
			return $this->db->delete("todo", array("todo_id" => $todoID));
			
		}
		
		public function add_todo($message) {

			$arr = array(
				"message" => $message,
				"dateposted" => time()
			);
			
			$this->db->insert("todo", $arr);
			
		}
		
	}


?>