<?php

function arr_bulan(){
	$bulan = [1 => "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	return $bulan;
}

function tgl_indo($date) {
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';
 
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
 
    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
    }
 
    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 7 : {
                $hari = 'Minggu';
            }break;
        case 1 : {
                $hari = 'Senin';
            }break;
        case 2 : {
                $hari = 'Selasa';
            }break;
        case 3 : {
                $hari = 'Rabu';
            }break;
        case 4 : {
                $hari = 'Kamis';
            }break;
        case 5 : {
                $hari = "Jum'at";
            }break;
        case 6 : {
                $hari = 'Sabtu';
            }break;
        default: {
                $hari = 'UnKnown';
            }break;
    }
 
    $tanggalIndonesia = $hari.", ".$tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}

function alert_bs_4($message,$type='success'){
        $ci = get_instance();
        $message_txt = '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                  '.$message.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        $ci->session->set_flashdata('msg', $message_txt);
}

function check_session_login(){
        $ci = get_instance();
        if(!$ci->session->logged_in){
                alert_bs_4('sesi telah habis, silahkan login kembali','danger');
                redirect('login');
        }
}

function debug_json($data){
        echo json_encode($data, JSON_PRETTY_PRINT);exit();
}