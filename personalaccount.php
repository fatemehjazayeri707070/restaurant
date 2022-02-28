<?php
session_start();
$_SESSION['message7']=" ";
$_SESSION['message8']=" ";
if(!isset($_SESSION['name'])){
echo "<script> location.href='login.php';</script>";
} else {
require "connection.php";
$conn->set_charset("utf8");
mb_internal_encoding("utf8");
header("Content-Type: text/html;charset=utf8mb4_persian_ci");
}
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
    <section id="abouts" class="abouts">
        <div class="container">
            <div>
            <div class="row">
                
                <div class="abouts_content">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-8"></div>
                       
                  
                        <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                            <h4>محصولات سفارش داده شده توسط شما</h4>
                            <h6><?php echo $_SESSION['message7']; ?></h6>
                            <table class="col-lg-12 col-md-12 col-xs-12">
                                <tbody>
                                    <tr>
                                        <th><strong>قیمت فاکتور</strong></th>
                                        <th><strong>تاریخ</strong></th>
                                        <th><strong>وضعیت پرداخت</strong></th>
                                    </tr>
                                    <?php
                                    $user=$_SESSION['email'];
                                    $sql="SELECT * FROM sells WHERE name='$user' AND refid!=''";
                                    $result= $conn->query($sql);
                                    if($result->num_rows>0){
                                        while($row=$result->fetch_assoc()){ ?>
                                        
                                    <tr>
                                        <td><?=$row["amount"]?></td>
                                        <td><?=$row["date"]?></td>
                                        <td><?=$row["refid"]?></td>
                                    </tr>
                                    <?php
                                        }
                                    }else {
                                        $_SESSION['message7']="شما هنوز خریدی انجام نداده اید";
                                    }
                                    $conn->close();
                                ?>

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <?php
if(isset($_POST['update'])){
    require "connection.php";
    $conn->set_charset("utf8");
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $user=$_SESSION['email'];
    
   
    if(isset($_POST['address'])){
        
        $sql3="UPDATE user SET address='$address', phone='$phone' WHERE email='$user'";
        $result3=$conn->query($sql3);
        if($result3 === true){
            $_SESSION['message8']="ویرایش با موفقیت انجام شد";
        }
        else{
            $_SESSION['message8']="خطایی رخ داده است";
        }
           
            }
         

        
       

    
    $conn->close();
}
?>
            </div>
            <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="single_abouts_text   slideInRight">
                        <h4>اطلاعات حساب کاربری شما</h4>
                        <h6><?php echo  $_SESSION['message8']; ?></h6>
                        <?php
                        require "connection.php";
                        $conn->set_charset("utf8");
                        $user=$_SESSION['email'];
                        $sql1="SELECT * FROM user WHERE email='$user'";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0){
                            while($row=$result1->fetch_assoc()){ ?>
                        <strong>نام و نام خانوادگی: <?=$row["name"]?></strong>
                        <strong><?=$row["family"]?></strong>
                        <br/>
                        <strong>آدرس ایمیل: <?=$row["email"]?></strong>
                        <br/>
                        <strong>آدرس پستی: <?=$row["address"]?></strong>
                        <br/>
                        <strong>تلفن: <?=$row["phone"]?></strong>

                        <?php
                            }
                        }
                        $conn->close();
                        ?>
                        
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4>جهت ویرایش اطلاعات، تمامی فیلدها را پر بفرمایید</h4>
                    
                    <div class="single_widget_form text-left">
                                <form method="POST" action="personalaccount.php" id="formid">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="آدرس"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="تلفن"
                                            required="">
                                    </div>

        

                                    <input name="update" type="submit" value="ویرایش" class="btn btn-primary">
                                </form>
                            </div>
                </div>
                <div class="col-md-2"></div>
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
