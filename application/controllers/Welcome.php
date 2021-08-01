<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        $this->load->model('request_model');
    }


	public function index()
	{
		
		$data['all_request'] = $this->request_model->get_request();
		$data['partner1'] = $this->request_model->get_request(array('user'=>'partner1'));
		$data['partner2'] = $this->request_model->get_request(array('user'=>'partner2'));
		$this->load->view('dashboard',$data);
	}
	public function get_requests()
	{
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		//print_r($_POST);
		$where = array();
		if(!empty($from_date)){
			$where['date_time >='] = date('Y-m-d H:i:s',strtotime($from_date));
		}
		if(!empty($to_date)){
			$where['date_time <='] = date('Y-m-d H:i:s',strtotime($to_date));
		}

		$data['all_request'] = $this->request_model->get_request($where);
		$where1 = $where;
		$where2 = $where;
		$where1['user'] =  'partner1';
		$where2['user'] =  'partner2';
		$data['partner1'] = $this->request_model->get_request($where1);
		$data['partner2'] = $this->request_model->get_request($where2);
		$return = array('status'=>1,'data'=>$data);
		echo json_encode($return);
		exit;
		
	}
}
