<?php
include "../connection.php";
 
 $sql = " SELECT * FROM sale ORDER BY Product_ID, Sale_Date ";

 if ($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Sale ID</th>";
                echo "<th>Product ID</th>";
                echo "<th>Sale date</th>";
                echo "<th>Number of products sold </th>";
                echo "<th>Total price of sold products</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Sale_ID'] . "</td>";
                echo "<td>" . $row['Product_ID'] . "</td>";
                echo "<td>" . $row['Sale_Date'] . "</td>";
                echo "<td>" . $row['Sale_Amount'] . "</td>";
                echo "<td>" . $row['Sale_Price'] . "</td>";
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