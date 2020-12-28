<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!isAdmin()) {
			return redirect('admin/login');
		}
	}
	
	public function index()
	{
		$data['title'] = "All Services";
		$this->load->view('admin/services/index',$data);
	} // end index
	
	public function view($perma) {
		$query = "select a.name as aname,a.*,u.fname,u.lname,c.name from ads as a INNER JOIN users AS u ON a.user_id=u.id INNER JOIN categories AS c ON a.cat_id=c.id where a.permalink='".$perma."'";
		$res = $this->model->query($query,'row_array');
		if($res==null) {
			$data['item']="";
		} else { 
			$id = $res['id'];
			$cat_id = $res['cat_id'];
			$images = $this->model->getData('ads_images','all_array',$args=['where'=>['ads_id'=>$id]]);
			$views = $this->model->getData('views','row_array',$args=['where'=>['ads_id'=>$id],'select'=>['view_count']]);
			$data['views'] = $views;
			$data['images'] = $images;
			$data['item'] = $res;
		}
		$this->load->view('admin/services/view',$data);
	}
	
	public function ajax() {
		if($this->input->post('req')=='get_all_services') {
			// database col names
			$columns = array(
				0 => 'a.id',
				1 => 'a.name',  // ads name
				2 => 'u.fname',
				3 => 'u.lname',
				4 => 'c.name',
				5 => 'a.region',
			);
			$limit = $this->input->post('length');
			$start = $this->input->post('start');
			$order = $columns[$this->input->post('order')[0]['column']];
			$dir = $this->input->post('order')[0]['dir'];
			$q1 = "select * from ads";
			$items =  $this->model->query($q1,"all_array");
			$totalData = count($items);
			$totalFiltered = $totalData;
			if(empty($this->input->post('search')['value'])) {
				$q2 = "select a.name as aname,a.permalink,a.id as id,a.price,a.region,a.date_created,a.is_active,a.date_created,a.sale_status,u.fname,u.lname,c.name from ads as a INNER JOIN users AS u ON a.user_id=u.id INNER JOIN categories AS c ON a.cat_id=c.id order by $order $dir limit $start,$limit";
				$posts = $this->model->query($q2,'all_array');
			} else {
				$search = $this->input->post('search')['value'];
				$q3 = "select a.name as aname,a.permalink,a.id as id,a.price,a.region,a.date_created,a.is_active,a.date_created,a.sale_status,u.fname,u.lname,c.name from ads as a INNER JOIN users AS u ON a.user_id=u.id INNER JOIN categories AS c ON a.cat_id=c.id where ( u.fname like '%".$search."%' || u.lname like '%".$search."%' || a.name like '%".$search."%' || c.name like '%".$search."%' || a.price like '%".$search."%' || a.region like '%".$search."%')  order by $order $dir limit $start,$limit";
				$posts = $this->model->query($q3,'all_array');
				$totalFiltered = count($posts);
			}
			$data = array();
			if(!empty($posts)) {
				foreach($posts as $key=>$val) {
					$id = $val['id'];
					$st = $val['sale_status'];
					$permalink = $val['permalink'];
					if($st=="0") 
						$status = "<span class='text-center text-success'><b>Listed</b></span>";
					elseif($st=="1") 
						$status = "<span class='text-center text-warning'><b>Sold</b></span>";
					elseif($st=="2") 
						$status = "<span class='text-center text-primary'><b>In Transit</b></span>";
					else
						$status="";
					
					$action = "<a href='".base_url('admin/services/view/'.$permalink)."' title='View details' class='text-info detail' data-toggle='tooltip' data-placement='top' data-detail='".$id."' ><span class='fa fa-th iconss'></span></a><a href='#' data-toggle='tooltip' data-placement='top' title='Delete' class='text-danger' ><span class='fa fa-trash iconss'></span></a>";
					// $indata['id'] = '<input type="checkbox" name="staff[]" id="staff" value="'.$id.'" />';
					
					$indata['name']     	= $val['aname'];
					$indata['sname']    	= $val['fname']." ".$val['lname'];
					$indata['category']		= $val['name'];
					$indata['price']		= number_format($val['price']);
					$indata['region']  		= $val['region'];
					$indata['added']		= date('M d, Y',strtotime($val['date_created']));
					$indata['status'] 		= $status;
					$indata['action']		= $action;
					$data[] = $indata;
				}
			} // end empty posts
			$json_data = array(
				"draw"            => intval($this->input->post('draw')),
				"recordsTotal"    => intval($totalData),
				"recordsFiltered" => intval($totalFiltered),
				"data"            => $data
			);
			echo json_encode($json_data);
		} // end get_all_services
	}
		
} // end class