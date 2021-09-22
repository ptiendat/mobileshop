<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<?php include_once("../connect.php"); ?>
<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
        	<div id="logo" class="col-lg-3 col-md-3 col-sm-12">
            	<h1><a href="index.php"><img class="img-fluid" src="images/logo.png"></a></h1>
            </div>
            <!-- search_box -->
            <?php
                include_once("module/search/search_box.php");
                // cart_notify
                include_once("module/cart/cart_notifi.php");
            ?>

        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<!-- menu -->
            <?php
                include_once("module/category/menu.php");
            ?>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<!--	Slider	-->
                <?php
                include_once("module/slide/slide.php");
                ?>
                <!--	End Slider	-->
                <!-- master page -->
                <?php
                    if(isset($_GET['page_layout'])){
                        switch($_GET['page_layout']){
                            case "cart":
                                include_once("module/cart/cart.php");
                                break;
                            case "product":
                                include_once("module/product/product.php");
                                break;
                            case "category":
                                include_once("module/category/category.php");
                                break;
                            case "search":
                                include_once("module/search/search.php");
                                break;
                            case "success":
                                include_once("module/success/success.php");
                                break;
                        }
                    }else{
                        include_once("module/product/product_featured.php");
                        include_once("module/product/product_new.php");
                    }
                ?>
                <!--	Feature Product	-->

                <!--	End Feature Product	-->


                <!--	Latest Product	-->

                <!--	End Latest Product	-->
                
            </div>
            
            <?php include_once("module/sidebar/sidebar.php"); ?>
        </div>
    </div>
</div>
<!--	End Body	-->

<?php
include_once("module/footer/footer_top.php");
include_once("module/footer/footer_bot.php");
?>

<!--	Footer	-->

<!--	End Footer	-->
</body>
</html>
