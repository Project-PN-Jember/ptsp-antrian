<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class viewModel extends CI_Model {

    var $table = 'antrian';

    public function total_antrian($id)
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->from($this->table);
        $this->db->where('tanggal', $dateNow);
        $this->db->where('user_id', $id);

        return $this->db->count_all_results();
    }
    
    public function now_antrian($id)
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->select('no_antrian');
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 1);
        $this->db->where('user_id', $id);
        $this->db->order_by('updated_at', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table)->row();

        return $query ? (int)$query->no_antrian : '-';
    }
    
    public function next_antrian($id)
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->select('no_antrian');
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 0);
        $this->db->where('user_id', $id);
        $this->db->order_by('no_antrian', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get($this->table)->row();
        $result = $query ? $query->no_antrian : "-";
        
        return $result;
    }
    
    public function restOfThe_antrian($id)
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->from($this->table);
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 0);
        $this->db->where('user_id', $id);

        return $this->db->count_all_results();
    }

    public function dataCs($id) {
        $this->db->select('id, nama, status, level, foto');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
 
        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    
    public function noAntrian($id) {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->select_max('no_antrian');
        $this->db->where('tanggal', $dateNow);
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->table)->row();
        
        return $query->no_antrian+1;
    }
}