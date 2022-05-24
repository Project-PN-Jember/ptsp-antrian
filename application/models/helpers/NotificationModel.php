<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class NotificationModel extends CI_Model {
 
    var $table = 'notifikasi';

    public function addNotif($param)
    {
        $sql = $this->db->insert_string($this->table, $param);
        $ex  = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function delNotif($id) {
        $data = array('status' => 1);
        $where = array('id' => $id);

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}