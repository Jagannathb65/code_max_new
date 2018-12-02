<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class models extends CI_Controller {

	/**
	@author Jagannath Bewoor
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('data_result');
	}
	public function add_models(){
		$data['manufacturer'] = $this->data_result->get_manufactures();
		$data['dis_manufacturer'] = $this->data_result->select_joindata();
		$this->load->view('models', $data);
	}
	public function temp_image_upload(){
		if($_FILES["file"]["name"] != '')
		{
		 $test = explode('.', $_FILES["file"]["name"]);
		 $ext = end($test);
		 $name = rand(100, 999) . '.' . $ext;
		 $location = './uploads/' . $name;  
		 // echo $location; exit();
		 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
		 echo '<img src="'.base_url('uploads/'.$name).'" height="150" width="225" class="img-thumbnail" />';
		}

	}
	public function insert_model(){
		$data = $this->input->post();
		$response = $this->data_result->add_model($data);
		if(intval($response['insert_id']) > 0){
			$this->add_models();
		}
		else{
			echo 'Not added';
		}
	}
	public function get_details_model(){
		$data = $this->input->post();
		$res = $this->data_result->get_models_details($data);
		$result = '';
		$result .= '<table class="table table-condensed">
			      <thead>
			      <tr>
			        <th>Sl No</th>
			        <th>Model Name</th>
			        <th>Color</th>
			        <th>Manufacture Number</th>
			        <th>Register Number</th>
			        <th>Images</th>
			        <th>Sold</th>
			      </tr>
			      </thead>
			      <tbody>';
				  foreach ($res as $key => $value) {       
			        $delete = "delete_details/".$value->id;
		$result	.= '<tr>
			          <td class="sold_id">'.$value->id.'</td>
			          <td>'.$value->model_name.'</td>
			          <td>'.$value->color.'</td>
			          <td>'.$value->manu_number.'</td>
			          <td>'.$value->regi_number.'</td>
			          <td>'.$value->first_image.'<br>'
			          .$value->second_image.
			          '</td>
			          <td>
			            <a href ='.$delete.'>Sold</a>
			          </td>
			        </tr>';
			          }
			       
		$result	 .= '</tbody>
			    
		</table>';

		echo $result; 
	}

	public function delete_details(){
		$id = $this->uri->segment(3);
		$res = $this->data_result->delete_all_model_details($id);
		redirect('models/add_models');
	}
	
      
}
