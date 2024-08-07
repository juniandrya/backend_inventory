<?php
include "../connection.php";

$type = $_POST['type'];
$today = date('Y-m-d');

$sql = "SELECT id_history FROM tb_history WHERE type='$type' AND DATE(created_at) = '$today'";
$result = $connect->query($sql);
echo json_encode(array(
    "data" => $result->num_rows,
));
