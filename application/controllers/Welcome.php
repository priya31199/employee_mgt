<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$data['myJson'] = json_decode(file_get_contents("application/controllers/sample.json"));
		
		$this->load->view('employee_list',$data);
	}

	public function add_employee()
	{	
		$data['myJson'] = json_decode(file_get_contents("application/controllers/sample.json"));
		
		$this->load->view('welcome_message',$data);
	}

	public function save()
	{
		$current_data = file_get_contents('application/controllers/sample.json');
        $array_data = json_decode($current_data, true); 

        $get_last_id = array_keys($array_data);
		$last_id = array_slice($get_last_id, -1, 1, true);
		$final_last_id = implode(', ', $last_id);
		$extra = array(  
			         'id'     =>     $final_last_id + 2,  
                     'name'               =>     $_POST['name'],  
                     'mobile_number'     =>     $_POST["mobile_number"]  
                );  
		$array_data[] = $extra;
		$final_data = json_encode($array_data);  
		if($final_data){
			file_put_contents('application/controllers/sample.json', json_encode($array_data));
			redirect(base_url());
		}else{
			redirect(base_url());
		}
	}

	public function delete()
	{

		$id = $this->uri->segment(3);
		$current_data = file_get_contents('application/controllers/sample.json');
        $json_arr = json_decode($current_data, true);  
		$arr_index = array();
		foreach ($json_arr as $key => $value)
		{	
			if ($value['id'] == $id) {
        		$arr_index[] = $key;
    		}
		}

		foreach ($arr_index as $i)
		{
		    unset($json_arr[$i]);
		}

		$final_json_arr = array_values($json_arr);
		
			if(file_put_contents('application/controllers/sample.json', json_encode($final_json_arr))){
					redirect(base_url());
			}else{
					redirect(base_url());
				}
	}

	
	
}
