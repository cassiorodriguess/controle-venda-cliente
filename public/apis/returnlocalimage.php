<?php 

$img = $_POST['image'];
$img = str_replace('data:image/png;base64,','', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$date = rand(1,9999999999).date("Ymd");
$file = "../images/$date.png";
$success = file_put_contents($file, $data);
echo json_encode($date.'.png');
?>