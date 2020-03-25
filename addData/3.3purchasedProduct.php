<?php
include "../connection.php";
 
$productId = 1;
$purchaseDate = date('Y-m-d H:i:s');
$purchaseAmount = '2';

$sql = "INSERT INTO purchase (Product_ID, Purchase_Date, Purchase_Amount)
VALUES ('$productId', '$purchaseDate', '$purchaseAmount')";

if ($conn->query($sql) === TRUE) {
    echo "New purchase created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "UPDATE warehouse
SET Product_Quantity = Product_Quantity + $purchaseAmount
WHERE Product_ID = $productId ";

if ($conn->query($sql) === TRUE) {
    echo "Warehouse updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

include "../closeConn.php";
 ?>
