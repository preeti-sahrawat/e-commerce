<?php
include("dbconf.php");

function msg($data){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Well done! </strong>'.$data.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
} 

function getpro(){
  global $con;
  $getpro = "SELECT * FROM products order by 1 LIMIT 12";
  $prorun = mysqli_query($con,$getpro); 
  while ($row = mysqli_fetch_array($prorun)) {
    $name = $row['product_name'];
    if(strlen($name) <= 35)
        $name = $row['product_name']; 
    else
        $name = substr($name,0,45) . '...';
     ?>
    <div class="col-md-3 col-sm-6 single">
        <!-- col-sm-4 col-sm-6 single -->
        <div class="product center responsive">
            <a href="details.php?pid=<?php echo $row['productid'];  ?>">
                <img style="height: 173px;" src="admin/productimages/<?php echo $row['product_img1']; ?>" width="200"
                    height="300" alt="Not Found" class="img-fluid img-thumbnail">
            </a>
            <div class="text">
                <h3><a href="details.php?pid=<?php echo $row['productid'];  ?>"><?php echo $name; ?> </a></h3>
                <p class="price">INR <?php echo $row['product_price'];  ?></p>
                <p class="buttons">
                    <a href="details.php?pid=<?php echo $row['productid'];  ?>" class="btn btn-secondary">View
                        Details</a>
                    <a href="index.php?addcart=<?php echo $row['productid'];  ?>" type="submit" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i>Add TO Cart
                    </a>
                </p>
            </div>
        </div>
</div> <!-- col-sm-4 col-sm-6 single end-->
<?php }
}


function getproshop(){
    global $con;
    $getpro = "SELECT * FROM products order by 1 LIMIT 6";
    $prorun = mysqli_query($con,$getpro); 
    while ($row = mysqli_fetch_array($prorun)) {
      $name = $row['product_name'];
      if(strlen($name) <= 35)
          $name = $row['product_name']; 
      else
          $name = substr($name,0,45) . '...';
       ?>
<div class="col-md-4 col-sm-6 center">
    <div class="product">
        <a href="details.php?pid=<?php echo $row['productid'];  ?>">
            <img style="height: 173px;" src="admin/productimages/<?php echo $row['product_img1']; ?>" width="200"
                height="300" alt="Not Found" class="img-fluid img-thumbnail">
        </a>
        <div class="text">
            <h3><a href="details.php?pid=<?php echo $row['productid'];  ?>"><?php echo $name; ?></a></h3>
            <p class="price">INR <?php echo $row['product_price'];  ?></p>
            <p class="buttons">
                <a href="details.php?pid=<?php echo $row['productid'];  ?>" class="btn btn-secondary">View Details</a>
                <a href="shop.php?addcart=<?php echo $row['productid'];  ?>" class="btn btn-primary"><i
                        class="fa fa-shopping-cart"></i>Add
                    TO Cart</a>
            </p>
        </div>
    </div>
</div>
<?php }
  } 
  
  
function getcategory(){
    global $con;
    $getcat = mysqli_query($con,"SELECT * FROM product_category");
      while($row = mysqli_fetch_array($getcat)){
        $name = $row['product_cat_name'];
        $id = $row['id'];
          echo " <li class='nav-item'>
          <a class='nav-link active' href='shop.php?cat=$id'><i style='padding-right: 30px;' class='icon fa fa-desktop fa-fw'></i>$name</a>
      </li>";
      }
}

function getsubcategory(){
    global $con;
    $getcat = mysqli_query($con,"SELECT * FROM product_subcategory");
      while($row = mysqli_fetch_array($getcat)){
        $subname = $row['subcategory_name'];
        $subid = $row['category_id'];
          echo " <li class='nav-item'>
          <a class='nav-link active' href='shop.php?subcat=$subid'><i style='padding-right: 30px;' class='icon fa fa-desktop fa-fw'></i>$subname</a>
      </li>";
      }
}

function getcatpro($which,$id){
    global $con;
    $getpro = "SELECT * FROM products WHERE $which= '$id' order by 1 LIMIT 6";
    $prorun = mysqli_query($con,$getpro); 
    if(mysqli_num_rows($prorun) >= 1){
    while ($row = mysqli_fetch_array($prorun)) {
      $name = $row['product_name'];
      if(strlen($name) <= 35)
          $name = $row['product_name']; 
      else
          $name = substr($name,0,45) . '...';
       ?>

<div class="col-md-4 col-sm-6 center">
    <div class="product">
        <a href="details.php?pid=<?php echo $row['productid'];  ?>">
            <img style="height: 173px;" src="admin/productimages/<?php echo $row['product_img1']; ?>" width="200"
                height="300" alt="Not Found" class="img-fluid img-thumbnail">
        </a>
        <div class="text">
            <h3><a href="details.php?pid=<?php echo $row['productid'];  ?>"><?php echo $name; ?></a></h3>
            <p class="price">INR <?php echo $row['product_price'];  ?></p>
            <p class="buttons">
                <a href="details.php?pid=<?php echo $row['productid'];  ?>" class="btn btn-secondary">View Details</a>
                <a href="details.php?pid=<?php echo $row['productid'];  ?>" class="btn btn-primary"><i
                        class="fa fa-shopping-cart"></i>Add
                    TO Cart</a>
            </p>
        </div>
    </div>
</div>
<?php }}else{
    echo "<h1>No Result Found</h1>";
}
} 
///////find category data

  function getcatdata($id){
      global $con;
      $getcat = mysqli_query($con,"SELECT * FROM product_category WHERE id='$id'");
        while($row = mysqli_fetch_array($getcat)){
            $id = $row['id'];
            $name = $row['product_cat_name'];
            $desc = $row['product_cat_desc'];
           echo "<h1>$name</h1>
           <p>$desc</p>";
        }
  }

///////find subcategory data
function getsubcatdata($id){
        global $con;
        $getcat = mysqli_query($con,"SELECT * FROM product_subcategory WHERE id='$id'");
          while($row = mysqli_fetch_array($getcat)){
            $name = $row['subcategory_name'];
            $id = $row['id'];
            $desc = $row['product_subcat_desc'];
            echo"<h1>$name</h1>
            <p>$desc</p>"; 
          }   
}
?>