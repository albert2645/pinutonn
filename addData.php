<?php
include 'connect.php';
include 'getip.php';

$kod = $_POST['kod'];
$icerik = $_POST['icerik'];
$baslik = $_POST['baslik'];

$query = $db -> prepare("INSERT INTO temel SET
  kod = :kadi,
  baslik = :baslik,
  icerik = :sifre,
  ip = :ip
  ");

  $insert = $query -> execute(array(
    "kadi" => "$kod",
    "baslik" => "$baslik",
    "sifre" => "$icerik",
    "ip" => "$ip",
  ));

$array = array('kod'=>$kod, 'baslik'=>$baslik, 'icerik'=>$icerik,);

if ( $insert ){
    $last_id = $db->lastInsertId();
    print json_encode($array);
}

 ?>
