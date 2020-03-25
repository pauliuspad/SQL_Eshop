<?php
include "../connection.php";
 
$categoryName = 'CPU';
$categoryDescription = 'Central Procesing Unit';

 $sql = "INSERT INTO category (Category_Name, Category_Description)
 VALUES ('$categoryName', '$categoryDescription')";

 if ($conn->query($sql) === TRUE) {
     echo "New category created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 include "../closeConn.php";
 
 ?>