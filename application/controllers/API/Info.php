<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Info extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get()
	{
        $partner = $this->input->get('partner');
        $partners = array('partnerA','partnerB'); 
        if($partner){    
            if(empty($partner) || !in_array($partner, $partners)){
                $data=array('status'=>0,'data'=>[],'error'=>'invalid user');
                $this->response($data, REST_Controller::HTTP_OK);
                
            }else{
                $this->db->insert("request", ['user' => $partner,'date_time'=>date('Y-m-d H:i:s')]);
                if($this->db->affected_rows()>0){
                    $data['status'] = 1;
                }else{
                    $data['status'] = 0;
                }
                $data['data']=array('');
                $data['msg']='Hello '.$partner;

             
                $this->response($data, REST_Controller::HTTP_OK);
            }
        }else{
            $data=array('status'=>0,'data'=>[],'error'=>'invalid request');
            $this->response($data, REST_Controller::HTTP_OK);
        }
	}
      
    
    
}