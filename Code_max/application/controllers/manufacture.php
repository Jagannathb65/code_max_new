<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manufacture extends CI_Controller {

	/**
	@author Jagannath Bewoor
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('data_result');
	}
	public function index()
	{
		$data['manufacturer'] = $this->data_result->get_manufactures();
		$this->load->view('manufacturer', $data);
	}
	public function add_new()
	{
		$data = $this->input->post('manufacture');
		$response = $this->data_result->add_manufacturer($data);
		if(intval($response['insert_id']) > 0){
			$this->index();
		}
		else{
			echo 'Not added';
		}

	}
	public function update_manufacture(){
		$data = $this->input->post();
		$response = $this->data_result->update_manufacture($data);
		if($response == '1'){
			echo "true";
		}
		else{
			echo "false";
		}
	}
	public function delete_manufacture(){
		$data = $this->input->post();
		$response = $this->data_result->delete_manufacture($data);
		if($response == '1'){
			echo true;
		}
		else{
			echo 'false';
		}
	}
}
