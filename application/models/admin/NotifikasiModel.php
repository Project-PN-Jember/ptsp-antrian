<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends CI_Model{
 
    var $table = 'notifikasi';
    var $column_order = array(null, 'a.judul_notif', 'a.date_notif', 'a.link'); //set column field database for datatable orderable
    var $column_search = array('a.judul_notif', 'a.date_notif', 'a.link'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('a.id' => 'desc'); // default order 
 
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }
 
    private function _get_datatables_query()
    {
        // $this->db->select('a.id, a.judul_notif, a.date_notif, a.link');
		// $this->db->join('user b', 'b.id = a.user_id', 'left');
        // if ($this->session->userdata('level') != 'admin') {
        //     $this->db->where('b.id', $this->session->userdata('idUser'));
        // }
        $this->db->where('a.id_user', $this->session->userdata('idUser'));
        $this->db->where('date_notif <=', date('Y-m-d H:i:s'));
        $this->db->from($this->table . ' a');
 
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
    
    public function show() {
        $this->db->where('status', 0);
        $this->db->where('date_notif <=', date('Y-m-d H:i:s'));
        $this->db->limit(3);
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->table)->result();
    }
    
    public function count_notif_all()
    {
        $this->db->where('status', 0);
        $this->db->where('date_notif <=', date('Y-m-d H:i:s'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function updateStatus($id) {
        $data = array('status' => 1);
        $where = array('id' => $id);

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}