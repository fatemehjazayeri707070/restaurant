<?php
session_start();
require "connection.php";
$conn->set_charset("utf8");
$_SESSION['message9']=" ";
if(isset($_POST['login'])){
$email=$_POST['username'];
$_SESSION ['email'] = $email;
$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc()){
$pass=$_POST['password'];
if($pass==$row["password"]){
$_SESSION['login']= $row["email"];
echo "<script> location.href = 'Paneldashboard.php'; </script>";

}
else{
    $_SESSION['message9']="خطایی رخ داده است";

}
}
}
else{
    $_SESSION['message9']="نام کاربری یای رمز عبور اشتباه است";

}
}

$conn->close();
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
<section id="mobaileapps" class="mobailapps" style="height: 100vh;">
        <div class="slider_overlay" style="height: 100vh;">
        <div class="alert-warning alert"><?php echo  $_SESSION['message9']; ?></div>
            <div class="container padding-top-40">
                <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<div class="panel panel-default">
    <div class="panel-heading">
        <strong> ورود به پنل مدیریت </strong>
    </div>
    <div class="panel-body">
        <form method="POST" action="Panellogin.php" role="form">
            <br />
            <div class="form-group input-group">

                <span class="input-group-addon"><i class="fa fa-tag"></i></span>

                <input name="username" type="email" class="form-control" placeholder="نام کاربری"
                    required />

            </div>

            <div class="form-group input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input name="password" type="password" class="form-control" placeholder="رمز عبور"
                    required />
            </div>

            <input type="submit" name="login" class="btn btn-primary" value="ورود" />

        </form>
    </div>
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