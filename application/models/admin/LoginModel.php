<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LoginModel extends CI_Model {
 
	// public function __construct()
	// {
	//     parent::__construct();
	//     $this->load->database();
	// }

    public function signIn($username, $password)
    {
        $where =  array('username' => $username, 
                        'password' => $password,
                        'status_user' => 1
                        );
        $query = $this->db->get_where("user", $where);
 
        return $query;
    }	
}