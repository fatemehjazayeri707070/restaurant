<?php session_start();
if (isset($_POST['submit'])) {
    echo "<script> location.href='product.php'; </script>";
    $_SESSION['des'] = $_POST['hidden'];
} ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>رستوران ایتالیایی ارسال رایگان</title>
    <meta name="description" content=" رستوران ایتالیایی کیفیت خوشمزه ارسال رایگان">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="رستوران ایتالیایی کیفیت خوشمزه ارسال رایگان food restaurant pizza">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


    <!--For Plugins external css-->
    <link rel="stylesheet" href="assets/css/animate/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/minestyle.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    <header id="home" class="navbar-fixed-top">
        <div class="header_top_menu clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                        <div class="call_us_text">
                            <a href=""><i class="fa fa-clock-o"></i> Order Foods 24/7</a>
                            <a href=""><i class="fa fa-phone"></i>061 9876 5432</a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="head_top_social text-right">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                            <a href=""><i class="fa fa-pinterest-p"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                            <a href=""><i class="fa fa-phone"></i></a>
                            <a href=""><i class="fa fa-camera"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- End navbar-collapse-->

        <div class="main_menu_bg">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand our_logo" href="#"><img src="assets/images/logo.png"
                                        alt="" /></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php">صفحه نخست</a></li>
                                    <li><a href="search.php">جستجو</a></li>
                                    <li><a href="allproduct.php">فروشگاه</a></li>
                                    <li><a href="shop.php">سبد خرید</a></li>
                                    <li><a href="pictures.php">گالری تصاویر</a></li>
                                    <?php if (!isset($_SESSION['name'])) { ?>
                                    <li><a href="login.php">ورود/عضویت</a></li>
                                    <?php } else{ ?>
                                    <li><a href="personalaccount.php">حساب کاربری</a></li>
                                    <li><a href="logout.php">خروج</a></li>
                                    <li><a><?php echo $_SESSION['name']; ?><span> عزیز خوش آمدی!</span></a></li>
                                    <?php } ?>

                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header> <!-- End Header Section -->
    
    <section id="portfolio" class="portfolio padding-top-60 padding-bottom-40">
        <div class="container">
            <div class="row">
                <div class="portfolio_content text-center  fadeIn" style="display:inherit;">
                    <div class="col-md-12">
                        <div class="head_title text-center">
                            <h4>تجربه</h4>
                            <h3>لذت بخش</h3>
                        </div>
                        <?php require "connection.php";
                        $conn->set_charset("utf8");
                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <form action="index.php" method="post">
                                    <div class="main_portfolio_content">
                                        <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text"> <img src="<?= $row['photo']; ?>" alt="" />
                                            <div class="portfolio_images_overlay text-center">
                                                <h6><?= $row['name']; ?></h6>
                                                <p class="product_price"><?= $row['price']; ?></p> <input name="hidden" type="hidden" value="<?php echo $hidden = $row["id"]; ?>" /> <input type="submit" name="submit" class="btn btn-primary" value=" کلیک کنید " />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        <?php }
                        } else {
                            echo "<h3> در حال حاضر موردی برای نمایش وجود ندارد </h3>";
                        }
                        $conn->close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <footer id="footer" class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright wow zoomIn" data-wow-duration="3s">
                        <p>Made with <i class="fa fa-heart"></i> by <a href="http://bootstrapthemes.co">Bootstrap
                                Themes</a>2016. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="scrollup"> <a href="#"><i class="fa fa-chevron-up"></i></a> </div>
    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
    <script src="assets/js/wow/wow.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>