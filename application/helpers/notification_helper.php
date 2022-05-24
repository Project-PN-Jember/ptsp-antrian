<?php

function helper_notification($judulNotif = "", $date_notif = "", $link = "", $idUser=""){
    $CI =& get_instance();

    $param['judul_notif'] = $judulNotif;
    $param['date_notif'] = $date_notif;
    $param['link'] = $link;
    $param['status'] = 0;
    $param['id_user'] = $idUser;
    $param['created_at'] = date('Y-m-d H:i:s');
 
    //load model notif
    $CI->load->model('helpers/NotificationModel');
 
    //save to database
    $CI->NotificationModel->addNotif($param);
}

function helper_delNotif($id) {
    $CI =& get_instance();

    $param['id'] = $id;

    //load model notif
    $CI->load->model('helpers/NotificationModel');
 
    //save to database
    $CI->NotificationModel->delNotif($param);
}