<?php 
include('includes/config.php');
error_reporting(0);
// For adding post  
if(isset($_POST['submit']))
{
$pname=$_POST['productname'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$company=$_POST['company'];
$price=$_POST['price'];
$shiping=$_POST['shipping'];
$discount=$_POST['discount'];
$qty=$_POST['qty'];
$other=$_POST['other'];
$productdesc=$_POST['productdesc'];

$imgfile1=$_FILES["postimage1"]["name"];
$imgfile2=$_FILES["postimage2"]["name"];
$imgfile3=$_FILES["postimage3"]["name"];

$timgfile1=$_FILES["postimage1"]["tmp_name"];
$timgfile2=$_FILES["postimage2"]["tmp_name"];
$timgfile3=$_FILES["postimage3"]["tmp_name"];


// Code for move image into directory
move_uploaded_file($timgfile1,"productimages/".$imgfile1);
move_uploaded_file($timgfile2,"productimages/".$imgfile2);
move_uploaded_file($timgfile3,"productimages/".$imgfile3);

$query=mysqli_query($con,"insert into `products`(`category`, `sub_category`,`product_name`, `product_company`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_discount`, `product_qty`, `product_shipping_charge`, `product_other_charge`, `product_avilablity`) values('$catid','$subcatid','$pname','$company','$imgfile1','$imgfile2','$imgfile3','$price','$productdesc','$discount','$qty','$shiping','$other','yes')");
if($query)
{
$msg="Post successfully added ";
}
else{
$error="Something went wrong . Please try again.";    
} 

}
?>

<?php include('includes/header.php');?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Post </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Add Post </a>
                                    </li>
                                    <li class="active">
                                        Add Post
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <!---Success Message--->
                            <?php if(isset($msg)){ ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                            </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if(isset($error)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                            <?php } ?>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" id="posttitle" name="productname"
                                                placeholder="Enter Product Name" required>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Product Category</label>
                                            <select class="form-control" name="category" id="category"
                                                onChange="getSubCat(this.value);" required>
                                                <option value="">Select Category </option>
                                                <?php
                                                // Feching active categories
                                                $ret=mysqli_query($con,"select id,product_cat_name from  product_category where is_active=1");
                                                while($result=mysqli_fetch_array($ret))
                                                {    
                                                ?>
                                                <option value="<?php echo htmlentities($result['id']);?>">
                                                    <?php echo htmlentities($result['product_cat_name']);?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Product Sub Category</label>
                                            <select class="form-control" name="subcategory" id="subcategory" required>
                                                <option value="">First Select Category </option>
                                            </select>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="inputCity">Product Company</label>
                                                <input type="text" class="form-control" name="company"
                                                    placeholder="Enter Company Name" id="inputCity" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputZip">Product Price</label>
                                                <input type="number" class="form-control" min=0 name="price"
                                                    placeholder="Enter Price" id="inputZip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Enter Shipping Charge</label>
                                                <input type="number" class="form-control" value="0" min=0
                                                    name="shipping" placeholder="Enter shipping" id="shipping" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">Product Discount in %</label>
                                                <input type="number" class="form-control" name="discount"
                                                    placeholder="Enter Discount In %" id="discount" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputZip">Product Qty</label>
                                                <input type="number" class="form-control" min=0 name="qty"
                                                    placeholder="Enter Quantity" id="qty" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Enter Other Charge</label>
                                                <input type="number" class="form-control" value="0" min=0
                                                    name="other" placeholder="Enter other Charge" id="other" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Product Details</b></h4>
                                                    <textarea class="form-control" cols="30" rows="3"
                                                        placeholder="Product Details" name="productdesc"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image1</b></h4>
                                                    <input type="file" class="form-control" id="postimage1"
                                                        name="postimage1" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image2</b></h4>
                                                <input type="file" class="form-control" id="postimage" name="postimage2"
                                                    required>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="card-box">
                                        <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image3</b></h4>
                                        <input type="file" class="form-control" id="postimage" name="postimage3"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save
                                Product</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end p-20 -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->



    </div> <!-- container -->

    </div> <!-- content -->

    <?php include('includes/footer.php');?>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <script>
    var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
    </script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
</body>

</html>