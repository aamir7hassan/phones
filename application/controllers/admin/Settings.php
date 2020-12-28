<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Settings extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!isAdmin()) {
				return redirect('admin/login');
			}
		}
		
		public function index() {
			$data['title'] = "Settings";
				$item = $this->model->getData('settings','row_array',$args=[]);
			$data['item'] = $item;
			$this->load->view('admin/settings',$data);
		}
		
		public function process_settings()
		{
			$post = $this->input->post();
			$arr = array(
				'site_name'		=> test_input($post['site_name']),
				'site_email'	=> test_input($post['site_email']),
				'site_phone'	=> test_input($post['site_phone']),
				'smtp_user'		=> test_input($post['smtp_user']),
				'smtp_password'	=> test_input($post['smtp_password']),
				'smtp_port'		=> test_input($post['smtp_port']),
				'smtp_server'	=> test_input($post['smtp_server']),
				'marchent_id'	=> test_input($post['marchent_id']),
				'marchent_key'	=> test_input($post['marchent_key']),
				'credit_card'	=> test_input($post['credit_card']),
				'cvv'			=> test_input($post['cvv']),
				'expire_month'	=> test_input($post['expire_month']),
				'expire_year'	=> test_input($post['expire_year']),
				'last_updated'	=> date('Y-m-d H:i:s'),
			);
			$chk = $this->model->getData('settings','count_array',$args=[]);
			if($chk==0) {
				$res = $this->model->insertData('settings',$arr);
				_flashPop($res,'Settings added successfully','Error in adding settings,try again');
				return redirect('admin/settings');
			} else {
				$res = $this->model->updateData('settings',$arr,$args=[]);
				_flashPop($res,'Settings updated successfully','Error in updating settings,try again');
				return redirect('admin/settings');
			}
		}
		
			
	} // end class
?>