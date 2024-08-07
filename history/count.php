<?php
include "../connection.php";

$today = date('Y-m-d');

$sql = "SELECT id_history FROM tb_history WHERE DATE(created_at) = '$today'";
$result = $connect->query($sql);
echo json_encode(array(
    "data" => $result->num_rows,
));
