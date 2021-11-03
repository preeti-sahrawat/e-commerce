<div id="footer" class="mt-4">
    <div class="container mt-3">
        <div class="row mt-2">
            <div class="col-md-3 col-sm-6">
                <h4>pages</h4>
                <ul>
                    <li><a href="shopingcart.php">Shoping Cart</a></li>
                    <li><a href="shopingcart.php">Contact</a></li>
                    <li><a href="shopingcart.php">Shop</a></li>
                    <li><a href="shopingcart.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">Checkout</a></li>
                </ul>
                <hr class="d-none">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Top Product Category</h4>
                <ul>
                    <?php  
                    $getcat = mysqli_query($con,"SELECT * FROM product_category");
                      while($row = mysqli_fetch_array($getcat)){
                        $name = $row['product_cat_name'];
                        $id = $row['id'];
                          echo "<li><a href='shop.php?$id'>$name</a></li>";
                      }
                    ?>
                </ul>
                <hr class="d-none">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Where TO Find Us</h4>
                <p>
                    <strong>hhhhh.com</strong>
                    <br>Pdm University
                    <br>Delhi
                    <br>India
                    <br>+98418418481
                </p>
                <a href="#">Go TO Contact Us</a>
                <hr class="d-none">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Get The news</h4>
                <p class="text-muted">ihugtyg5fgt67fyug uyf7tfgy8g6 7uyb yf 7 yg f56f yg5 r f7 g</p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-light" value="Click Me">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay In Touch</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    &copy; 2020 Tarun Aggarwal
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">

                    Template By Tarun Aggarwal
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
