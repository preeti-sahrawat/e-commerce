<?php
if(!isset($_SESSION['user_shop'])){
       echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
    include("include/dbconf.php");
?>

<center>
    <div class="box" style="margin-left: 21px;">
        <h1>My Profile</h1>
        <p class="text-muted">If u have any queries, please feel free to Contact Us, Our Customer service center in
            working for you 24/7.</p>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <div class="container">
            <div class="team-single">
                <div class="row">
                    <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                        <div class="team-single-img">
                            <img src="customerimg/<?php echo $data['user_image'] ?>" alt="">
                        </div>
                        <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                            <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                                <p> <a href="myacc.php?edit_account"><button type="button" class="btn btn-primary">Update</button></a></p>
                            <div class="margin-20px-top team-single-icons">
                                <ul class="no-margin">
                                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <div class="team-single-text padding-50px-left sm-no-padding-left">
                            <h4 class="font-size38 sm-font-size32 xs-font-size30">
                                <?php echo $data['user_name'].$data['user_lastname'] ?></h4>
                            <p class="no-margin-bottom"><?php echo $_SESSION['user_shop']; ?>.</p>
                            <div class="contact-info-section margin-40px-tb">
                                <ul class="list-style9 no-margin">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-graduation-cap text-orange"></i>
                                                <strong class="margin-10px-left text-orange">City:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_city'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="far fa-gem text-yellow"></i>
                                                <strong class="margin-10px-left text-yellow">Contact.:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_contact'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="far fa-file text-lightred"></i>
                                                <strong class="margin-10px-left text-lightred">Country:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_country'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-map-marker-alt text-green"></i>
                                                <strong class="margin-10px-left text-green">Address:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_address'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong
                                                    class="margin-10px-left xs-margin-four-left text-purple">Gender:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_gender'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-envelope text-pink"></i>
                                                <strong
                                                    class="margin-10px-left xs-margin-four-left text-pink">Pincode:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php $var = $data['user_pincode'] ? : "Not Updated"; echo "$var"; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>

                                        <div class="row">
                                            <div class="col-md-5 col-5">
                                                <i class="fas fa-mobile-alt text-purple"></i>
                                                <strong class="margin-10px-left xs-margin-four-left text-purple">Current
                                                    Ip:</strong>
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p><?php echo getuserip();?></p>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>

                            <h5 class="font-size24 sm-font-size22 xs-font-size20">Account Dashboard</h5>

                            <div class="sm-no-margin">
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-7">Number Of Orders</div>
                                        <div class="col-5 text-right">40%</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                        style="width:40%" class="animated custom-bar progress-bar slideInLeft bg-sky">
                                    </div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-7">Profile Status</div>
                                        <div class="col-5 text-right">50%</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                        style="width:50%"
                                        class="animated custom-bar progress-bar slideInLeft bg-orange"></div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-7">Time Management </div>
                                        <div class="col-5 text-right">60%</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                        style="width:60%" class="animated custom-bar progress-bar slideInLeft bg-green">
                                    </div>
                                </div>
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-7"></div>
                                        <div class="col-5 text-right">80%</div>
                                    </div>
                                </div>
                                <div class="custom-progress progress">
                                    <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                        style="width:80%"
                                        class="animated custom-bar progress-bar slideInLeft bg-yellow"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </div>

</center>