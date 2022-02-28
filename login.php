<?php
session_start();
require "connection.php";
$conn->set_charset("utf8");
$_SESSION['message1']=" ";
if(isset($_POST['login'])){
 $email=$_POST['email'];
 $_SESSION ['email'] = $email;

 $sql="SELECT * FROM user WHERE email='$email'";
 $result = $conn->query($sql);
 if($result->num_rows > 0)
 {
 while($row=$result->fetch_assoc()){
 $pass=$_POST["password"];
 if($pass==$row["password"]){
 $_SESSION['name']= $row["name"];
 echo "<script> location.href='index.php'; </script>";


 }

 else{
    $_SESSION['message1']="خطایی رخ داده است";
 }

 }
 }

 else{
    $_SESSION['message1']="نام کاربری یا رمز عبور اشتباه است";
 }
}
$conn->close();
?>
<!DOCTYPE html>
<html>

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


                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header> <!-- End Header Section -->

    <section id="mobaileapps" class="mobailapps">
        <div class="slider_overlay">
            <div class="container">
                <div class="row">
                    <div class="main_mobail_apps_content wow zoomIn">
                        <div class="col-md-12 col-sm-12 mine1">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="single_widget wow fadeIn" data-wowduration="5s">
                                    <h3>ورود به حساب کاربری</h3>

                                    <h3><?php echo $_SESSION['message1']; ?></h3>

                                    <div class="single_widget_form text-right">
                                        <form action="login.php" method="post" id="formid">


                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="نام کاربری" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="رمز عبور" required="">
                                            </div>
                                            <h5><a href="forgetpassword.php">رمز عبورتان را فراموش کرده اید؟ کلیک
                                                    کنید</a></h5>
                                            <h5><a href="register.php">هنوز ثبت نام نکرده اید؟ کلیک کنید</a></h5>
                                            <input name="login" type="submit" value="ورود" class="btn btn-primary">

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
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