<?php
  if(!isset($_SESSION['user_shop'])){
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
?>
<center>
    <div class="box" style="margin-left: 21px;">
        <h1>My Orders</h1>
        <p class="text-muted">If u have any queries, please feel free to Contact Us, Our Customer service center in working for you 24/7.</p>
        <table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Invoice No</th>
      <th scope="col">Product Name</th>
      <th scope="col">Order Date</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Status</th>
      <th scope="col">Bill</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $count =0; $query = mysqli_query($con,"SELECT * FROM customer_order WHERE customer_id='$id' AND is_active='1'");
   while ($row = mysqli_fetch_array($query)) { $count++;  
   $pro = mysqli_query($con,"SELECT * FROM products WHERE productid='".$row["product_id"]."'"); 
  $arr = mysqli_fetch_array($pro);
  $name = $arr['product_name'];
  if(strlen($name) > 20){
    $name = substr($name,0,20) . '...';
  }
   ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row['invoice_no'] ?></td>
      <td><a href="details.php?pid=<?php echo $arr['productid'];?>"><?php echo $name; ?></a></td>
      <td><?php echo $row['order_date'] ?></td>
      <td><?php echo $row['payment_method']?></td>
      <td> <?php if($row['order_status'] == 'Pending'){echo "Unpaid";}else{ echo "success";} ?></td>
      <td><a href="yy">Download</a></td>
      <td><a href="track.php?<?php echo $row['invoice_no'] ?>">Track</a></td>
  <?php  } ?>
  
  </tbody>
</table>
    </div>
</center>