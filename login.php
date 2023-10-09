<?php include "includes/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ;?>
<body>
<div class="card-body">
<form class="form-group" action="" method="post">

           
            
              
                <label for="inputName"> Email</label>
                <input type="text" id="inputName" name="email" class="form-control">
           
              
                <label for="inputName"> Password</label>
                <input type="password" id="inputName" name="password" class="form-control">
           
              
   
           
                <button type="submit"> submit  </button> 
                  
</form>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$email=$_POST['email'];
$password=$_POST['password'];

$sql = "SELECT * FROM users WHERE email ='$email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {

$hashed_password = $row['password'];

if (password_verify($password, $hashed_password)) {

  $_SESSION['username'] = $row['name'];
  $_SESSION['user_id'] = $row['id'];

  header('Location:index.php');
} else {
  echo 'Invalid username or password.';
}
}
}
?>
 </div>

    <?php  include "includes/footer.php"; ?>
</body>
</html>