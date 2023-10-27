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

<?php if(isset($_GET['id'])){
                        $id=$_GET['id'];
                    }
                    $query="SELECT * FROM products";
                    $result = mysqli_query($conn, $query);
     
     
                     if (mysqli_num_rows($result) > 0) 
                     // output data of each row
                      $row = mysqli_fetch_assoc($result);
                      $is_active=($row['is_active']==1) ? 'checked':'';

?>
                <label for="inputName"> Name</label>
                <input type="text" id="inputName"  value="<?php echo $row['name']; ?>" name="name" class="form-control">
            
              
                <label for="inputName" > Descrption</label>
                <input  type="text" id="inputName" value="<?php echo $row['descrption'];?>" name="descrption" class="form-control">
                
                <label for="inputName" > Price</label>
                <input  type="text" id="inputName" value="<?php echo $row['price'];?>" name="price" class="form-control">
           
                <img style="width:20%" src="assets/images/<?php echo $row['img'];?>" alt=''/>
                <label class="mt-4" for="inputName"> image</label>
                <input type="file" src="submit.png" alt="Submit">
           
              <br>
                <label class="mt-4" for="inputName">is_active</label>
                <input type="checkbox" name="isactive" value="1"  <?php echo ($row['is_active']==1) ? 'checked': '' ; ?>>
            <br>
                <button class="mt-4" type="submit"> submit </button>   
                  
</form>

<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$name=$_POST['name'];
$descrption=$_POST['descrption'];
$is_active=$_POST['isactive'];

  $stmt ="INSERT INTO category (name,descrption,img,is_active) VALUES ('$name','$descrption','image',$is_active)";

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