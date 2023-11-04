<?php  
session_start();

include "includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php";?>

<body  class="hold-transition sidebar-mini layout-fixed">
<?php include "includes/topbody.php"; ?> 
<form class="form-group mb-4" action="" method="post" enctype="multipart/form-data" >

<?php 
     $user_id=$_SESSION['user_id'];
     $query="SELECT products.name,products.img,products.price,orders.amount,orders.id,users.name,orders.status
     FROM orders
     INNER JOIN products ON products.id = orders.product_id
     INNER JOIN users ON orders.user_id = users.id
     where users.id = $user_id;
      ";
     $result = mysqli_query($conn, $query);
     
     
                     if (mysqli_num_rows($result) > 0) 
                     // output data of each row
                      $row = mysqli_fetch_assoc($result);

?>
                <label for="inputName"> Name</label>
                <input type="text" id="inputName"  value="<?php echo $row['name']; ?>" name="name" class="form-control">
            
              
                <label for="inputName" >Number</label>
                <input  type="text" id="inputName" value="<?php echo $row['amount'];?>" name="amount" class="form-control">
                
                <label for="inputName" >Status</label>
                <input  type="text" id="inputName" value="<?php echo $row['status'];?>" name="status" class="form-control">
           
              
           
                 
            <br>
                <button class="mt-4" type="submit"> submit </button>   
                  
</form>

<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$name=$_POST['name'];
$number=$_POST['amount'];
$status=$_POST['status'];

  $stmt ="INSERT INTO orders (status,amount) VALUES ('$status',$amount)";

                      // Bind the form data to the statement
                      if (mysqli_query($conn, $stmt)) {
                          echo "New record created successfully";
                        } else {
                          echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                        }
                      
};



?>
<?php include "includes/bottombody.php"; ?>
<?php include "includes/footer.php";?>

</body>
</html>