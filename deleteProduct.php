<?php  
include "includes/connect.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE from products where id = $id";
    if (mysqli_query($conn, $query)) {
        echo " record deleted successfully";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
}

?>