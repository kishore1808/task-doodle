<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Home_model');
     }
	public function index(){
		$this->load->view('login');
	}

	public function checkLogin(){
		$this->Home_model->checkLogin();	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Home');
	}

    public function productList()
	{

	$data['productList'] = $this->Home_model->productList();	
	$data['userList'] = $this->Home_model->userList();	
	$data['page'] = "home";
	pages('productList',$data);

	}

	public function userProductList()
	{

		$data['productList'] = $this->Home_model->productList();	
	$data['page'] = "home";
	pages('userProductList',$data);

	}

	public function addUpdateProduct()
	{
		$this->Home_model->addUpdateProduct(); 
		redirect('Home/productList');
	}
	public function changeStatus()
	{
		$this->Home_model->changeStatus(); 
	}	

	public function deletePro()
	{
		$this->Home_model->deletePro(); 
	}

	public function fetchReport()
	{

		$this->Home_model->fetchReport(); 
	}
	public function userReports()
	{
	$data['page'] = "report";

	$data['userList'] = $this->Home_model->userList();	

		pages('userReports',$data);
	}
}
