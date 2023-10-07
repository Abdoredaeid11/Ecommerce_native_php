<?php include "includes/connect.php";?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ;?>
<body>
<div class="card-body">
<form class="form-group mb-4" action="" method="post"  >

              
                <label for="inputName"> Name</label>
                <input type="text" id="inputName" name="name" class="form-control">
            
              
                <label for="inputName"> Email</label>
                <input type="text" id="inputName" name="email" class="form-control">
           
              
                <label for="inputName"> Password</label>
                <input type="password" id="inputName" name="password" class="form-control">
           
              
                <label for="inputName"> Address</label>
                <input type="text" id="inputName" name="address" class="form-control">
           
                <button type="submit"> submit </button>   
                  
</form>


<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];
$hash_password=password_hash($password,PASSWORD_BCRYPT);

  $stmt ="INSERT INTO users (name,email,password,address) VALUES ('$name','$email','$hash_password','$address')";

                      // Bind the form data to the statement
                      if (mysqli_query($conn, $stmt)) {
                          echo "New record created successfully";
                        } else {
                          echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                        }
                      
};

?>
 </div>

    <?php  include "includes/footer.php"; ?>
</body>
</html>