<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('test_input'))
	{
		function test_input($data) {
		  	$data = trim($data);
		  	$data = stripslashes($data);
		  	$data = htmlspecialchars($data);
		  	return $data;
		}
	}

	if(!function_exists('isAdmin'))
	{
		function isAdmin() {
			$ci =& get_instance(); //get main CodeIgniter object
			if($ci->session->has_userdata('role') && $ci->session->userdata('role')=='admin') {
				return true;
			}
		}
	}

	if(!function_exists('isSupervisor'))
	{
		function isSupervisor() {
			$ci =& get_instance(); //get main CodeIgniter object
			if($ci->session->has_userdata('role') && $ci->session->userdata('role')=='supervisor') {
				return true;
			}
		}
	}

	if(!function_exists('get_userId'))
	{
		function get_userId() {
			$ci =& get_instance(); //get main CodeIgniter object
			if($ci->session->has_userdata('user_id')) {
				return $ci->session->userdata('user_id');
			}
		}
	}
	
	if(!function_exists('get_all'))
	{
		function get_all($tbl,$where) {
			$ci =& get_instance(); //get main CodeIgniter object
			$res = $ci->model->getData($tbl,'count_array',$args=[$where]);
			return $res;
		}
	}

	if(!function_exists('_flash'))
	{
		function _flash($success,$successMsg,$failureMsg)
		{
			$ci =& get_instance();
			if($success) {
				$ci->session->set_flashdata('data',$successMsg);
				$ci->session->set_flashdata('class','alert-success');
			} else {
				$ci->session->set_flashdata('data',$failureMsg);
				$ci->session->set_flashdata('class','alert-danger');
			}
		}
	}

	if(!function_exists('_flashPop'))
	{
		function _flashPop($success,$successMsg,$failureMsg)
		{
			$ci =& get_instance();
			if($success) {
				$ci->session->set_flashdata('data',$successMsg);
				$ci->session->set_flashdata('class','success');
			} else {
				$ci->session->set_flashdata('data',$failureMsg);
				$ci->session->set_flashdata('class','error');
			}
		}
	}

?>
