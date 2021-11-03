<?php 
include("include/functions.php");
?>   
   
   <div class="card mt-4 sidebar-menu user1" style="width: 18rem;">
        <div class="card-header category">
        <i class="icon fa fa-align-justify fa-fw"></i><h5 class="card-title">Product Categories</h5>
        </div>
        <div class="card-body">
            <ul class="nav flex-column category-menu">
                <?php  
                getcategory(); ?>
            </ul>
        </div>
    </div>

    <div class="card mt-4 sidebar-menu user1" style="width: 18rem;">
        <div class="card-header category">
        <i class="icon fa fa-align-justify fa-fw"></i> <h5 class="card-title">Sub Categories</h5>
        </div>
        <div class="card-body">
            <ul class="nav flex-column category-menu">
                <?php getsubcategory(); ?>
            </ul>
        </div>
    </div>
