<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function backup()
		{
			$this->load->library('zip');
			$path = './'; // . means complete project
			$time = time();
			$this->zip->read_dir($path);
			$result = $this->zip->download('jiji_application '.date("d-m-Y").'.zip');
			return $result;
		}

		public function index()
		{
			$data['title'] = "Login";
			$this->load->view("admin/login",$data);
		}

		public function process_login()
		{

			$this->validation->set_error_delimiters('<span class="text text-danger"><i class="fa fa-times-circle animated flash"></i> ','</span>');
			if($this->validation->run('login_validation'))
			{
				$email = test_input($this->input->post('email'));
				$pass = test_input($this->input->post('password'));
				$res = $this->model->getData('admin','row_array',$args=['select'=>['id','fname','lname','email'],'where'=>['email'=>$email,'password'=>sha1($pass)]]);
				
				if($res!==null) {
					$sessi = array(
						'user_id'	=> $res['id'],
						'email'		=> $res['email'],
						'fname'		=> $res['fname'],
						'lname'		=> $res['lname'],
						'role'		=> 'admin',
					);

					$this->session->set_userdata($sessi);
					return redirect('admin');
				} else {
					$this->session->set_flashdata('data','Invalid email or password');
					$this->session->set_flashdata('class','alert-danger');
					return redirect('admin/login');
				}
			} else{
				$data['title'] = "login";
				$this->load->view("login",$data);
			}
		}


		public function reset_password()
		{

			if($this->session->role=='admin') {
				$data['title'] = "Reset Password";
				$this->load->view('admin/reset_password',$data);
			} else if($this->session->role=='supervisor') {
				$data['title'] = "Reset Password";
				$this->load->view('reset_password',$data);
			}
		}

		public function processResetPassword()
		{
			$uid = get_userId();
			$data['title'] = "Reset Password";

			$oldPass = test_input($this->input->post('opass'));
			$newPass = test_input($this->input->post('npass'));
			$user = $this->model->getData('users','row_array',$args=['select'=>['password'],'where'=>['id'=>$uid]]);
			$dbPass = $user['password'];
			if($dbPass===sha1($oldPass)) {
				$res = $this->model->updateData('users',['password'=>sha1($newPass)],$args=['where'=>['id'=>$uid]]);
				_flash($res,'Password updated successfully','Error in updating password,try again');
				return redirect('reset-password');
			} else {
				_flash(FALSE,'host','Old password do not match, please type correct old password');
				return redirect('reset-password');
			}
		}

		public function forgot()
		{
			$email = test_input($this->input->post('email'));
			$chk = $this->model->getData('users','count_array',$args=['where'=>['email'=>$email]]);
			if($chk==0) {
				echo json_encode('<span class="text-danger">Invalid email address</span>');die;
			} else {
				$str = "";
				$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
				$max = count($characters) - 1;
				for ($i = 0; $i < 5; $i++) {
					$rand = mt_rand(0, $max);
					$str .= $characters[$rand];
				}
				$newPass = $str;
				$arr = array(
					'password'		=> sha1($newPass),
					'pass'				=> $newPass,
				);
				$res = $this->model->updateData('users',$arr,$args=['where'=>['email'=>$email]]);
				echo $res==true ? json_encode('<span class="text-success">Recovered! new password is '.$newPass.'</span>'):json_encode('<span class="text-danger">Error ,try agian</span>');
				die;
			}
		}

		public function logout() {
			$this->session->sess_destroy();
			return redirect('login');
		}

		public function sessi()
		{
			var_dump($_SESSION);
			echo "<pre>";
			$this->load->library('user_agent');
			$u = $this->input->ip_address();
			var_dump($u);
		}
	}
?>
