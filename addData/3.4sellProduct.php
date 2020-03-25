<?php
include "../connection.php";
 
$productId = 1;
$saleDate = date('Y-m-d H:i:s');
$saleAmount = '2';

$productPrice =$conn->query("SELECT Product_Price FROM products WHERE Product_ID = $productId")->fetch_object()->Product_Price;
$salePrice = $saleAmount * $productPrice;
$quantityInStorage = $conn->query("SELECT Product_Quantity FROM warehouse WHERE Product_ID = $productId")->fetch_object()->Product_Quantity;

if ($quantityInStorage > $saleAmount){
    $sql = "INSERT INTO sale (Product_ID, Sale_Date, Sale_Amount, Sale_Price)
    VALUES ('$productId', '$saleDate', '$saleAmount', '$salePrice')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New sale created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $sql = "UPDATE warehouse
    SET Product_Quantity = Product_Quantity - $saleAmount
    WHERE Product_ID = $productId ";
    
    if ($conn->query($sql) === TRUE) {
        echo "Warehouse updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 
else {
    echo "Product quantity is insufficient";
}

include "../closeConn.php";
 ?>
