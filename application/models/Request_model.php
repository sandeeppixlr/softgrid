<?php
class Request_model extends CI_Model {

        

        public function get_request($where=array())
        {
            $query = $this->db->get_where('request',$where);
            /*if($where){
                $query = $this->db->where($where);
            }*/
            return $query->result_array();
        }

        

}