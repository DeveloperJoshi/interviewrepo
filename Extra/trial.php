<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'invoicegen');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$field_array = $_POST['field_name'];
$other_array = $_POST['price_name'];
$third_array = $_POST['third_name'];
$invoiceNUmber = $_POST['invoiceNumber'];
// $field_array= json_encode($field_array);
// $other_array= json_encode($other_array);
// print_r($field_array);
// echo "<br />";
// print_r($other_array);
// echo "<br />";
// print_r($third_array);
foreach($field_array as $f){
    $INSERT = "INSERT INTO invoicetrail  (quantity,invoiceNumber) VALUE ($f,$invoiceNUmber)";   
    $query = mysqli_query($con,$INSERT);
}
foreach($other_array as $price){
    $INSERT = "INSERT INTO  itemprice (ItemPrice,invoiceNumberID) VALUE ($price,$invoiceNUmber)";   
    $query = mysqli_query($con,$INSERT);
}

foreach($third_array as $total){
    $INSERT = "INSERT INTO  itemtotalprice (itemTotalPrice,total_invoiceNumber) VALUE ($total,$invoiceNUmber)";   
    $query = mysqli_query($con,$INSERT);
}






?>