
<?php
include "../connection.php";

 $sql = " SELECT * FROM warehouse WHERE Product_Quantity>0 order BY Product_Quantity DESC ";

 if ($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Product ID</th>";
                echo "<th>Product name</th>";
                echo "<th>Number of products in warehouse</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            $productID = $row['Product_ID'];
            $categoryName = $conn->query("SELECT Product_Name FROM products WHERE Product_ID = $productID")->fetch_object()->Product_Name;
            
                echo "<td>" . $row['Product_ID'] . "</td>";
                echo "<td>" . $categoryName . "</td>";
                echo "<td>" . $row['Product_Quantity'] . "</td>";
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