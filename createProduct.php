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


                <label for="inputName" > Price</label>
                <input  type="text" id="inputName" name="price" class="form-control">
           
              
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
                    $price=$_POST['price'];
                    $descrption=$_POST['descrption'];
                    $image_name = $_FILES["image"]["name"];
                    if (!isset($image_name)) {
                      die('No file uploaded.');
                    }
                    
                    move_uploaded_file(
                      // Temp image location
                      $image=$_FILES["image"]["tmp_name"],
                    
                      // New image location, __DIR__ is the location of the current PHP file
                      __DIR__ . "/assets/images/" . $image_name
                    );
                     if(isset($_POST['isactive'])){
                      $is_active=1; 
                     }
                     else
                     {$is_active=0;
                    }
                       if (isset($_GET['id'])){ 
                        $category_id=$_GET['id'];   
                     $stmt ="INSERT INTO products (category_id,name,descrption,price,img,is_active) VALUES ($category_id,'$name','$descrption','$price','$image_name','$is_active')";
                       }
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