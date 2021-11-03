<?php
include('includes/config.php');

if(!empty($_POST['catid'])){
   $id = $_POST['catid'];
   $subcat = mysqli_query($con,"SELECT * FROM product_subcategory WHERE category_id = '$id'");
}
?>
<option value="">Subcatrgory</option>
<?php while ($row = mysqli_fetch_array($subcat)) {   ?>
    <option value="<?php echo htmlentities($row['category_id']); ?>"><?php echo htmlentities($row['subcategory_name']); ?></option>
<?php } ?>