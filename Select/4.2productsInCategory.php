
<?php
include "../connection.php";
 
 $sql = " SELECT Category_ID, COUNT(*) FROM products GROUP BY Category_ID ";

 if ($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Category ID</th>";
                echo "<th>Category Name</th>";
                echo "<th>Number of products in Category</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            $categoryID = $row['Category_ID'];
            $categoryName = $conn->query("SELECT Category_Name FROM category WHERE Category_ID = $categoryID")->fetch_object()->Category_Name;
            
                echo "<td>" . $row['Category_ID'] . "</td>";
                echo "<td>" . $categoryName . "</td>";
                echo "<td>" . $row['COUNT(*)'] . "</td>";
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