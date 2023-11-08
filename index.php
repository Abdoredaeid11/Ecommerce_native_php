<?php session_start();
include "includes/connect.php"; ?>

<!DOCTYPE html>

<html>
<?php include "includes/head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="login.php" class="nav-link">Login</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="register.php" class="nav-link">Regiser</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    
    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?>
</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home Page </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php  ">  </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-hereeeeeeeeee -->
    <div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="assets/images/1.png" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <?php 
		  $sql = "SELECT * FROM category ORDER BY id LIMIT 10; ";
		  $result = mysqli_query($conn, $sql);
		  while($row = mysqli_fetch_assoc($result)) {
			echo"
		   <div class='item '>
		  <div class='container'>
			<a href='register.html'><img style='width:100%' src='assets/images/{$row['img']}' alt=''/></a>
				<div class='carousel-caption'>
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>

		  ";}
		  ?>
		  
			
		   
		   
		   
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
	  
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->

<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
			<?php
			$query="SELECT * FROM products LIMIT 4; ";
			$result = mysqli_query($conn, $query);


                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while($row = mysqli_fetch_assoc($result)) {
			echo"
				<li class='span3'>
				  <div class='thumbnail'>
				  <i class='tag'></i>
					<a href='product_details.html'><img src='assets/images/{$row['img']}' alt=''></a>
					<div class='caption'>
					  <h5>{$row['name']}</h5>

					  <h4>
					  <form class='m-0' action='' method='post'>
					  <input type='text' name='id' hidden value='{$row['id']}'>
					<input type='text' name='number' hidden value='{$row['number']}'>

					<input style='width: 7em' type='number' value='Add to Order' name='amount' required >

					  <button class='btn' tybe='submit' =''>Add to Card<i class='icon-shopping-cart'></i></button>					   
					  <span class='pull-right ml-3'>{$row['price']}$</span></h4>

						  </form>
					   </div>
				  </div>
				</li>
				";}}?>
				
			  </ul>
			  </div>
			   <div class="item">
			  <ul class="thumbnails">
			  <?php
			$query="select * from products order by id desc limit 4 ";
			$result = mysqli_query($conn, $query);


                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while($row = mysqli_fetch_assoc($result)) {
			echo"
			<li class='span3'>
			<div class='thumbnail'>
			<i class='tag'></i>
			  <a href='product_details.html'><img src='assets/images/{$row['img']}' alt=''></a>
			  <div class='caption'>
				<h5>{$row['name']}</h5>

				<h4>
				<form class='m-0' action='' method='post'>
				<input type='text' name='id' hidden value='{$row['id']}'>
				<input type='text' name='number' hidden value='{$row['number']}'>

				<input style='width: 7em' type='number' value='Add to Order' name='amount' value='1' required >

				<button class='btn' tybe='submit' =''>Add to Card<i class='icon-shopping-cart'></i></button>					   
				<span class='pull-right ml-3'>{$row['price']}$</span></h4>				</form>
			  </div>
			</div>
		  </li>
				";}}?>

			  </ul>
			  </div>
			
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>

		<?php if($_SERVER['REQUEST_METHOD']=='POST'){
					$product_id=$_POST['id'];
					$user_id=$_SESSION['user_id'];
					$number=$_POST['number'];
					if(isset($_POST['amount'])){
					$amount=$_POST['amount'];
					if($amount>$number||$amount<0){echo "<div class='alert alert-danger'>
						<strong>Alert!</strong> cant order this number of product.
						</div>";}
						else{
					$stmt="INSERT INTO orders (user_id,product_id,amount) VALUES ($user_id,$product_id,$amount)";
					mysqli_query($conn, $stmt);}
		} }
		?>

		<?php 
		   if(isset($_GET['id'])){
			$id=$_GET['id'];

	 $query="SELECT * FROM products where category_id = $id ";
	 $result = mysqli_query($conn, $query);


	  if (mysqli_num_rows($result) > 0) {
	  // output data of each row
		while($row = mysqli_fetch_assoc($result)) {{ 



		}}}}
	   
	   ?>

<a href="myOrders.php" class="mb-4"><button type="button"  class="btn btn-outline-warning">my orders</button></a>
 
		<h4>Latest Products </h4>
			  <ul class="thumbnails">
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html"><img src="assets/themes/images/products/6.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html"><img src="assets/themes/images/products/7.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					 <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.html"><img src="assets/themes/images/products/8.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						Lorem Ipsum is simply dummy text. 
					  </p>
					   <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>
				
			  </ul>	

		</div>
		</div>
	</div>
</div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">

          
            <!-- small box -->
          </div>


   
  
  </tbody>

                        
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
         
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include "includes/footer.php"; ?>
</body>
</html>
