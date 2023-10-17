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

              
                <label for="inputName"> Name</label>
                <input type="text" id="inputName" name="name" class="form-control">
            
              
                <label for="inputName" > Descrption</label>
                <input  type="text" id="inputName" name="descrption" class="form-control">
           
              
                <label class="mt-4" for="inputName"> image</label>
                <input type="file" name="image" src="submit.png" alt="Submit">
           
              <br>
                <label class="mt-4" for="inputName">is_active</label>
                <input type="checkbox" name="isactive" checked="false" >
            <br>
                <button class="mt-4" type="submit"> submit </button>   
                  
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$descrption=$_POST['descrption'];
$image_file = $_FILES["image"];
if (!isset($image_file)) {
  die('No file uploaded.');
}

// imageeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee problemmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm
move_uploaded_file(
  // Temp image location
  $image=$image_file["tmp_name"],

  // New image location, __DIR__ is the location of the current PHP file
  __DIR__ . "/assets/images/" . $image_file["name"]
);
 if(isset($_POST['isactive'])){
  $is_active=1; 
 }
 else
 {$is_active=0;
}

  $stmt ="INSERT INTO category (name,descrption,img,is_active) VALUES ('$name','$descrption','$image',$is_active)";

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