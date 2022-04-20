<?php
function userLogin() {
    $db = \Config\Database::connect();
    return $db->table('users')->where('id_user', session('id_user'))->get()->getRow();
}

function countData($table) {
    $db = \Config\Database::connect();
    return $db->table($table)->countAllResults();
}

if (!function_exists('format_indo')) {
    function format_indo($date){
      date_default_timezone_set('Asia/Jakarta');

      $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      
      $tahun = substr($date,0,4);
      $bulan = substr($date,5,2);
      $tanggal = substr($date,8,2);
      $result = $tanggal."-".$Bulan[(int)$bulan-1]."-".$tahun;
  
      return $result;
    }
  }
  
?>