<?php
session_start();
if(!isset($_SESSION['login'])){
    echo "برای مشاهده این صفحه باید وارد شوید";

}
else{
require "connection.php";
$conn->set_charset("utf8");
mb_internal_encoding("utf8");
header("Content-Type: text/html;charset=utf8mb4_persian_ci");

?>
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

<section id="slider" class="slider" style="height: 100vh;">
        <div class="slider_overlay" style="height: 100vh;">
            <div class="container">
                <div class="row">
				<div id="wrapper">

<nav class="navbar navbar-default " role="navigation" style="margin-bottom: 0;">

	<div class="navbar-header">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="paneldashboard.php"> مدیریت پنل </a>

	</div>
	<div style="color: white; padding: 15px 50px 5px 50px; float: left; font-size: 16px; ">

		<a href="Panelloginkamva.php" class="btn btn-danger square-btn-adjust">خروج </a>

	</div>
</nav>
<!-- NAV TOP -->
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li>

				<img src="assets/images/logo1.png" class="user-image img-responsive" />

			</li>
			<li>

				<a class="active-menu" href="paneldashboard.php"><i class="fa fa-dashboard fa-3x"></i>
					داشبورد</a>

			</li>
			<li>

				<a href="panelnewproduct.php"><i class="fa fa-table fa-3x"></i> مدیریت محصولات</a>

			</li>
			<li>

				<a href="panelsells.php"><i class="fa fa-desktop fa-3x"></i>مدیریت فروش</a>

			</li>
			<li>

				<a href="panelusers.php"><i class="fa fa-qrcode fa-3x"></i>مدیریت کاربران</a>

			</li>
		</ul>
	</div>
</nav>
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

    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>


    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
    <script src="assets/js/wow/wow.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php } ?>