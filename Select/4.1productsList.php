<?php
include "../connection.php";
 
 $sql = " SELECT * FROM products ORDER BY Category_ID, Product_Name ";

 if ($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Product Name</th>";
                echo "<th>Category</th>";
                echo "<th>Product Price</th>";
                echo "<th>Product Description</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Product_ID'] . "</td>";
                echo "<td>" . $row['Product_Name'] . "</td>";
                echo "<td>" . $row['Category_ID'] . "</td>";
                echo "<td>" . $row['Product_Price'] . "</td>";
                echo "<td>" . $row['Product_Description'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 include "../closeConn.php";
 ?>