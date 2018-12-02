<?php
/*
@author Jagannath Bewoor
*/
class data_result extends CI_Model{

	public function get_manufactures(){
		$this->db->select('*');
		$query = $this->db->get('manufacturer');
		return $query->result();		
	}

	public function add_manufacturer($data){
		$data1 = array('name' => $data);
		$this->db->insert('manufacturer',$data1);
		$num_inserts = $this->db->affected_rows();
		if (intval($num_inserts) > 0) {
			$data = array('status' => 'SUCCESS', 'insert_id' => $this->db->insert_id());
		} else {
			redirect(base_url());
		}
		return $data;
	}

	public function update_manufacture($data){
		$this->db->set('name',$data['name']);
		$this->db->where('id',$data['id']);
		$status = $this->db->update('manufacturer');
		return $status;
	}
	
	public function delete_manufacture($data){
		$this->db->where('id',$data['delete']);
		$status = $this->db->delete('manufacturer');
		return $status;
	}

	public function add_model($data){
		$data1 = array('model_name' => $data['model_name'],
						'choose_manu' => $data['choose_manu'],
						'color' => $data['color'],
						'manu_number' => $data['manu_number'],
						'regi_number' => $data['regi_number'],
						'first_image' => $data['first_image'],
						'second_image' => $data['second_image']
		
		);
		$this->db->insert('models',$data1);
		$num_inserts = $this->db->affected_rows();
		if (intval($num_inserts) > 0) {
			$data = array('status' => 'SUCCESS', 'insert_id' => $this->db->insert_id());
		} else {
			redirect(base_url());
		}
		return $data;	
	}
	public function select_joindata(){
		$query = "SELECT manufacturer.name,models.choose_manu,models.`model_name`, COUNT(models.choose_manu) AS Total FROM models LEFT JOIN manufacturer ON models.choose_manu = manufacturer.id GROUP BY models.choose_manu,models.model_name";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function get_models_details($data){
		$this->db->select('*');
		$this->db->where($data);
		$query = $this->db->get('models');
		// echo $this->db->last_query(); exit();
		return $query->result();		
	}

	public function delete_all_model_details($id){
		$this->db->where('id',$id);
		$status = $this->db->delete('models');
		return $status;
	}
}
?>