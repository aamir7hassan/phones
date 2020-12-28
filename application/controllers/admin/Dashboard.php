<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!isAdmin()) {
			return redirect('admin/login');
		}
	}
	
	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->view('admin/index',$data);
	}
	
	public function account() {
		$data['title'] = "Admin account";
		$data['item'] = $this->model->getData('admin','row_array',$args=[]);
		$this->load->view('admin/account',$data);
	}
	
	public function process_account() {
		$post = $this->input->post();
		$arr = array(
			'fname'			=> test_input($post['fname']),
			'lname'			=> test_input($post['lname']),
			'email'			=> test_input($post['email']),
			'phone_no'		=> test_input($post['phone']),
			'last_updated'	=> date('Y-m-d H:i:s'),
		);
		$res = $this->model->updateData('admin',$arr);
		_flashpop($res,'Account updated successfully','Error in updating account, try again');
		return redirect('admin/account');
	} // end process_account
	
	public function reset_password() {
		$data['title'] = "Reset password";
		$this->load->view('admin/reset_password',$data);
	}  // end reset_password
	
	public function process_reset_password() {
		$post = $this->input->post();
		$pass = test_input($post['pass']);
		$cpass = test_input($post['cpass']);
		if($pass===$cpass) {
			$res = $this->model->updateData('admin',['password'=>sha1($pass)],$args=[]);
			_flashpop($res,'Password updated successfully','Error in updating password, try again');
		} else {
			_flashpop(false,'Account updated successfully','Passwords do not match, try again');
		}
		return redirect('admin/reset-password');
	}
	
} // end class