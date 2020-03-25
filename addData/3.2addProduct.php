<?php
include "../connection.php";
 
 $productName = 'i7-9533';
 $categoryId = 1 ;
 $productPrice = '200';
 $productDescription = '2.3 ghz';
 $productQuantity = '6';

 
 $sql = "INSERT INTO products (Product_Name, Category_ID, Product_Price, Product_Description)
 VALUES ('$productName', $categoryId, '$productPrice', '$productDescription')";

if ($conn->query($sql) === TRUE) {
    echo "New product created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


 $currnetProductId = mysqli_insert_id($conn); 
 $sql = "INSERT INTO warehouse (Product_ID, Product_Quantity)
 VALUES ('$currnetProductId', '$productQuantity')";

if ($conn->query($sql) === TRUE) {
    echo " New warehouse record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

include "../closeConn.php";
?>