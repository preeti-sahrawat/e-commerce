<?php 
define('page','home');
define('title','index');
include("include/header.php");
include("include/dbconf.php");
include("include/functions.php");
?>
<div class="container slider mt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <?php
              $getslider = "SELECT * FROM slider";
              $runslide = mysqli_query($con,$getslider);
              while ($row = mysqli_fetch_array($runslide)) { ?>

            <div class="carousel-item <?php echo $row['slider_name']; ?>">
                <img height=300 width=1100 src="images/sliders/<?php echo $row['slider_image']; ?>" alt="">
            </div>

            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="advantages">
        <div class="container mt-5">
            <div class="same-height row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <h3><a href="#">money back</a></h3>
                        <p>hrloihj hyvt jnhby jnhby nju</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="icon fa fa-truck"></i>
                        </div>
                        <h3><a href="#">free shipping</a></h3>
                        <p>hrloihj hyvt jnhby jnhby nju</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-gift"></i>
                        </div>
                        <h3><a href="#">Special Sale</a></h3>
                        <p>hrloihj hyvt jnhby jnhby nju</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>Latest IN This Week</h2>
            </div>
        </div>
    </div>
</div> <!-- hot end -->
<div id="content" class="container">
    <div class="row"> 
        <?php
       getpro();
      ?>
        <hr>
    </div>
</div>
<!-- footer -->
<?php
include("include/footer.php")
?>

</body>

</html>