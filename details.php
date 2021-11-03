<?php 
define('page','home');
define('title','Get Details');
include("include/header.php"); 
include("include/dbconf.php");
if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $getdata = "SELECT * FROM products WHERE productid='$id' LIMIT 1";
    $rec = mysqli_query($con,$getdata); 
    $arr = mysqli_fetch_array($rec);
    $pname = $arr['product_name'];
}
?>

<div id="content">
    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <ul class="breadcrumb">
                <li> <a href="index.php">Home</a></li>
                <li> Shop</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php include("include/sidebar.php"); ?>
            </div>
            <div class="col-md-9 mt-4">
                <div class="row" id="productmain">
                    <div class="col-sm-6">
                        <div id="mainimage">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="admin/productimages/<?php echo $arr['product_img1']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail"></div>
                                    <div class="carousel-item">
                                        <img src="admin/productimages/<?php echo $arr['product_img2']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail"></div>
                                    <div class="carousel-item">
                                        <img src="admin/productimages/<?php echo $arr['product_img3']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail"></div>
                                    
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h5 class="text-center"><?php  echo $pname; ?></h5>
                            <div class="row list">
                                <div class="col-sm-3 list1">
                                    <div class="serchboc">
                                        <span class="">BRAND:</span>
                                    </div>
                                </div>
                                <div class="col-sm-9 list1">
                                    <div class="con">
                                        <span class="lable"><?php echo $arr['product_company']; ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 list1">
                                    <div class="serchboc">
                                        <span class="">SHIpingCHARGE:</span>
                                    </div>
                                </div>
                                <div class="col-sm-9 list1">
                                    <div class="con">
                                        <span class="lable"><?php echo $arr['product_shipping_charge']; ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 list1">
                                    <div class="serchboc">
                                        <span class="">AVAILABILITY:</span>
                                    </div>
                                </div> 
                                <div class="col-sm-9 list1">
                                    <div class="con">
                                        <span class="lable">In Stock</span>
                                    </div>
                                </div>
                            </div>
                            <form action="details.php?addcart=<?php echo $arr['productid'];  ?>" method="post" class="row">
                                <div class="col-sm-5 list1">
                                    <div class="serchboc">
                                        <span class="lable">Product qty:</span>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input min=0 max=100 name="qty" class="form-control" value="1" type="number">
                                </div>
                                <div class="col-sm-5 list1">
                                    <div class="serchboc">
                                        <span class="lable">Product Size:</span>
                                    </div>
                                </div>
                                <div class="col-md-7 form-group">
                                    <select id="" name="size" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">1</option>
                                        <option value="3">1</option>
                                        <option value="4">1</option>
                                        <option value="5">1</option>
                                    </select>
                                </div>
                                <p class="mx-auto price">INR <?php echo $arr['product_price']; ?>
                                <span class="price-sticky"><?php echo $arr['product_discount']; ?>%</span>
                            </p>
                                <p class="butt mx-auto">
                                    <button type="submit" name="addcart" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i>Add TO Cart
                                    </button>
                                    <button class="btn btn-secondary">ChekOut</button>
                                </p>
                            </form>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col order-last">
                                    <a href="#" class="thumb">
                                    <img src="admin/productimages/<?php echo $arr['product_img3']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail">
                                    </a>
                                </div>
                                <div class="col ">
                                    <a href="#" class="thumb">
                                    <img src="admin/productimages/<?php echo $arr['product_img2']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail">
                                    </a>
                                </div>
                                <div class="col order-first">
                                    <a href="#" class="thumb">
                                    <img src="admin/productimages/<?php echo $arr['product_img1']; ?>"
                                            alt="Not Found" class="img-fluid img-thumbnail">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="box" id="details">
                    <h4>Product Details</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut obcaecati impedit ducimus eius amet
                        optio odio. Eius dolor velit ut corrupti sint tenetur, aperiam et facilis temporibus aliquid?
                        Tenetur, quae?Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit voluptate
                        accusantium
                        sapiente rem officiis nulla quo maxime ab facere magni incidunt pariatur consequatur quas, quasi
                        fugiat corporis quia? Soluta, ducimus!Loremlo Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Voluptate aspernatur quam ipsa debitis dolor itaque, sint architecto perferendis facere
                        praesentium consequatur nostrum officiis ex officia, libero labore! Voluptatibus, aperiam</p>
                    <ul>
                        <li>product</li>
                        <li>product</li>
                        <li>product</li>
                        <li>product</li>
                        <li>product</li>
                        <li>product</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You Also Like These Products</h3>
                        </div>
                    </div>
                    <div class="col-md-3 single">
                        <!-- col-sm-4 col-sm-6 single -->
                        <div class="product center responsive">
                            <a href="details.php">
                                <img src="images/productimages/1/micromax3.jpeg" width="180" height="300"
                                    alt="Not Found" class="img-fluid">
                            </a>
                            <div class="text">
                                <h3><a href="details.php">nh bytgf hu v hjbvgt hbuvy hbty hb y jnbh ytv yutv jhgfv hugvy
                                        j
                                        hbuy vu bhu v uhb ut in 8yg uvtyf ybty g ybty byt f ubyt </a></h3>
                                <p class="price">INR 299</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-secondary">View Details</a>
                                    <a href="details.php" class="btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i>Add TO Cart
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div> <!-- col-sm-4 col-sm-6 single end-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("include/footer.php"); ?>