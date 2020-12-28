<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Categories extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!isAdmin()) {
				return redirect('admin/login');
			}
		}
		
		public function index() {
			$data['title'] = "Categories";
				$items = $this->model->getData('categories','all_array',$args=[]);
			$data['items'] = $items;
			$this->load->view('admin/categories/index',$data);
		}
		
		public function sub_categories() {
			$data['title'] = "Categories";
				$items = $this->model->getData('sub_cats as s','all_array',$args=['join'=>['table'=>'categories as c','query'=>'s.cat_id=c.id','type'=>'inner'],'select'=>['s.*','c.name as cname']]);
			$data['items'] = $items;
			$data['cats'] = $this->model->getData('categories','all_array',$args=['where'=>['is_active'=>'1']]);
			$this->load->view('admin/categories/sub_cats',$data);
		}
		
	} // end class
?>