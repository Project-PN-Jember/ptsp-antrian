<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use LDAP\Result;

class Pemohon extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //buat respon
        $this->load->model('admin/PemohonModel', 'pemohon');
    }

    public function index_get()
    {
        // ini sudah benar
        // $pemohon = $this->db->get('pemohon')->result();
        // $this->response($pemohon, RestController::HTTP_OK);

        $id = $this->get('id');

        if ($id === null) {
            $pemohon = $this->pemohon->getPemohon();
        } else {

            $pemohon = $this->pemohon->getPemohon($id);
        }

        if ($pemohon) {
            $this->response([
                'status' => true,
                'data' => $pemohon
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], 404);
        }

        if ($id === null) {
            // Check if the users data store contains users
            if ($pemohon) {
                // Set the response and exit
                $this->response($pemohon, 200);
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No pemohon were found'
                ], 404);
            }
        } else {
            if (array_key_exists($id, $pemohon)) {
                $this->response($pemohon[$id], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No such user found'
                ], 404);
            }
        }
    }
    public function index_delete()
    {

        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->pemohon->delete_by_id($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], 200);
            } else {

                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_OK);
            }
        }
    }



    // public function users_get()
    // {
    //     // Users from a data store e.g. database
    //     $users = [
    //         ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
    //         ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
    //     ];

    //     $id = $this->get('id');

    //     if ($id === null) {
    //         // Check if the users data store contains users
    //         if ($users) {
    //             // Set the response and exit
    //             $this->response($users, 200);
    //         } else {
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'No users were found'
    //             ], 404);
    //         }
    //     } else {
    //         if (array_key_exists($id, $users)) {
    //             $this->response($users[$id], 200);
    //         } else {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'No such user found'
    //             ], 404);
    //         }
    //     }
    // }
}
