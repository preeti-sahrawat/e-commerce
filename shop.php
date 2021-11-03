<?php 
define('page','shop');
define('title','Shopping');
include("include/header.php"); 
include("include/dbconf.php"); 
$msg = "lkjiuh";
?>

<div id="content">
    <div class="container mt-2">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li> <a href="index.php">Home</a></li>
                <li> Shop</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php include("include/sidebar.php"); ?>
            </div>
            <div class="col-md-8 head mx-auto">
                <div class="box mt-4">
                    <?php
                if(!isset($_GET['cat'])){
                    if(!isset($_GET['subcat'])){ ?>
                    <h1>Shop</h1>
                    <p>tlhhhijuc uh ygy nuy g uyvt uhb yv</p>
                    <?php }else{ ?>

                     <?php getsubcatdata($_GET['subcat']) ?>

                    <?php }}else{ ?>

                      <?php getcatdata($_GET['cat']); ?>

                    <?php } ?>
                </div>
                <?php msg("nuyb"); ?>
                <div class="row">
                    <?php
                if(!isset($_GET['cat'])){
                    if(!isset($_GET['subcat'])){ ?>
                    <?php  getproshop(); ?>
                    <?php }else{ ?>

                    <?php getcatpro("category",$_GET['subcat']) ?>

                    <?php }}else{ ?>

                    <?php getcatpro("sub_category",$_GET['cat']) ?>

                    <?php } ?>

                </div>
                <?php
  if(isset($_GET['pageno'])){
      $pageno = $_GET['pageno'];
  }else{
      $pageno = 1;
  }
  $no_of_record_on_page = 6;
  $offset = ($pageno-1) * $no_of_record_on_page;
  $res = mysqli_query($con,"SELECT COUNT(*) FROM products");
  $tot_row = mysqli_fetch_array($res)[0];
  $total_pages = ceil($tot_row / $no_of_record_on_page);
?>

                <ul class="pagination" style="margin-left: 15pc;">
                    <li class="page-item"><a class="page-link" href="?pageno1">First</a></li>
                    <li class="page-item <?php if($pageno<=1){echo 'disabled';} ?>"><a class="page-link"
                            href="<?php if($pageno<=1){echo '#';}else{ echo '?pageno='.($pageno-1); } ?>">Prev</a></li>
                    <li class="page-item <?php if($pageno == $total_pages){echo 'disabled';} ?>"><a class="page-link"
                            href="<?php if($pageno>= $total_pages){ echo '#'; }else{ echo '?pageno='.($pageno+1); }  ?>">Next</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>


<?php include("include/footer.php"); ?>