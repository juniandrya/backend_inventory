<?php

include "../connection.php";

$code = $_POST['code'];
$name = $_POST['name'];
$stock = $_POST['stock'];
$unit = $_POST['unit'];
$price = $_POST['price'];

$date = new DateTime();
$createdAt = $date->format('Y-m-d H:i:sP');
$updatedAt = $createdAt;

$sql_check_code = "SELECT * FROM tb_product WHERE code='$code'";
$result_check_code = $connect->query($sql_check_code);
if ($result_check_code->num_rows > 0) {
    echo json_encode(array(
        "success" => false,
        "message" => "code",
    ));
}else{
    $sql = "INSERT INTO tb_product SET
        code='$code',
        name='$name',        
        stock='$stock',
        unit='$unit',
        price='$price',
        created_at='$createdAt',
        updated_at='$updatedAt'
        ";
    $result = $connect->query($sql);
    if($result) {    
        echo json_encode(array("success"=>true));
    } else {
        echo json_encode(array("success"=>false));
    }
}


