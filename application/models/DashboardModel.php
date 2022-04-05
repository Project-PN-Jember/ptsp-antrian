<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model{
 
    var $table = 'antrian';
    var $column_order = array(null, 'a.no_antrian', 'a.email', 'a.nama', 'a.telp_wa', 'b.nama'); //set column field database for datatable orderable
    var $column_search = array('a.no_antrian', 'a.email', 'a.nama', 'a.telp_wa', 'b.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('a.status' => 'asc', 'a.id' => 'desc'); // default order 
 
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }
 
    private function _get_datatables_query()
    {
        $this->db->select('a.id, a.no_antrian, a.email, a.nama, a.telp_wa, b.nama as pegawai, b.level, a.status');
		$this->db->join('user b', 'b.id = a.user_id', 'left');
        $this->db->from($this->table . ' a')
                ->where('a.user_id', $this->session->userdata('idUser'))
                ->where('a.tanggal', date("Y-m-d", strtotime("tomorrow")));
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function total_antrian()
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->from($this->table);
        $this->db->where('tanggal', $dateNow);
        if ($this->session->userdata('level') != 'admin') {
            $this->db->where('user_id', $this->session->userdata('idUser'));
        }

        return $this->db->count_all_results();
    }
    
    public function now_antrian()
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->select('no_antrian');
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 1);
        if ($this->session->userdata('level') != 'admin') {
            $this->db->where('user_id', $this->session->userdata('idUser'));
        }
        $this->db->order_by('updated_at', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table)->row();

        return $query ? (int)$query->no_antrian : '-';
    }
    
    public function next_antrian()
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->select('no_antrian');
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 0);
        if ($this->session->userdata('level') != 'admin') {
            $this->db->where('user_id', $this->session->userdata('idUser'));
        }
        $this->db->order_by('no_antrian', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get($this->table)->row();
        $result = $query ? $query->no_antrian : "-";
        
        return $result;
    }
    
    public function restOfThe_antrian()
    {
        $dateNow = date("Y-m-d", strtotime("now"));
        
        $this->db->from($this->table);
        $this->db->where('tanggal', $dateNow);
        $this->db->where('status', 0);
        if ($this->session->userdata('level') != 'admin') {
            $this->db->where('user_id', $this->session->userdata('idUser'));
        }

        return $this->db->count_all_results();
    }

    public function updateStatus($id) {
        $data = array('status' => 1, 'created_at' => date('Y-m-d H:i:s'));
        $where = array('id' => $id);

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}