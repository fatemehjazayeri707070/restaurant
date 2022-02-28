<?php
session_start();
$_SESSION['message3']=" ";
if (isset($_POST['pay'])) {
    if (!isset($_SESSION['name'])) {
        echo "<script> location.href='login.php'; </script>";
    } else {
        require_once("zarinpal_function.php");
        $MerchantID = "129d3c92-d1d9-4ae8-9671-5b1659662cb2";
        $Amount = $_SESSION['item_total'];
        $Description = "restaurant";
        $Email = "restaurant@gmail.com";
        $Mobile = "09121234567";
        $CallbackURL = "http://127.0.0.1/restaurant/verify.php";
        $ZarinGate = false;
        $SandBox = true;
        $zp = new zarinpal();
        $result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);
        if (isset($result["Status"]) && $result["Status"] == 100) {
            // Success and redirect to pay
            $zp->redirect($result["StartPay"]);
        } else {
            // error
            echo "خطا در ایجاد تراکنش";
            echo "<br /> کد خطا : " . $result["Status"];
            echo "<br /> تفسیر و علت خطا : " . $result["Message"];
        }
        
    }
}
?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            if (!empty($_POST['quantity'])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET['code'] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST['quantity'], 'price' => $productByCode[0]["price"]));
                if (!empty($_SESSION['cart_item'])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION['cart_item']))) {
                        foreach ($_SESSION['cart_item'] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION['cart_item'][$k]['quantity'])) {
                                    $_SESSION['cart_item'][$k]['quantity'] = 0;
                                }
                                $_SESSION['cart_item'][$k]['quantity'] += $_POST['quantity'];
                            }
                        }
                    } else {
                        $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'], $itemArray);
                    }
                } else {
                    $_SESSION['cart_item'] = $itemArray;
                }
            }
            break;
        case "remove":
         
            if (!empty($_SESSION['cart_item'])) {
                  
                foreach ($_SESSION['cart_item'] as $k=>$v) {
                   if($_SESSION['cart_item'][$k]['code']==$_GET['code']){
                    $_SESSION['cart_item'][$k]['quantity'] -= 1; 
                   }
                       
                        if (($_SESSION['cart_item'][$k]['quantity'])==0) {
                            unset($_SESSION['cart_item'][$k]);
                        }
                        if(empty($_SESSION['cart_item'])){
                            unset($_SESSION['cart_item']);
                        }
                    }}  

    
            break;

        case "empty":
            unset($_SESSION['cart_item']);
            break;
    }
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 ltie7"
lang=""> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang=""> <![endif]-->
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


    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="assets/css/minestyle.css">

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
                                    <?php } else { ?>
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
    <section id="ourPakeg" class="ourPakeg">
        <div class="container">
            <div class="row">
                <div class="abouts_content" style="display: inherit;">
                    <div class="col-md-12">
                        <div class="single_abouts_text textcenter wow slideInLeft" data-wow-duration="1s">
                            <div>
                                <center>
                                    <h3> <?php echo $_SESSION['message3']; ?>
                                    </h3>
                                    <h4> <a class="btn btn-primary" id="btnEmpty" href="shop.php?action=empty"> خالی
                                            کردن
                                            سبد </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-primary" href="index.php"> بازگشت به صفحه محصولات و ادامه خرید
                                        </a>
                                    </h4>
                                </center>
                                <br />
                                <?php
                                if (isset($_SESSION['cart_item'])) {
                                    $item_total = 0;
                                ?>
                                <table class="col-lg-12" style="background-color: khaki;">
                                    <tbody>
                                        <tr>
                                            <th style="padding:1rem; margin:1rem;"><strong>نام محصول</strong></th>
                                            <th style="padding:1rem; margin:1rem;"><strong>کد محصول</strong></th>
                                            <th style="padding:1rem; margin:1rem;"><strong>تعداد</strong></th>
                                            <th style="padding:1rem; margin:1rem;"><strong>قیمت</strong></th>
                                            <th style="padding:1rem; margin:1rem;"><strong>حذف کردن از سبد خرید</strong>
                                            </th>
                                        </tr>
                                        <?php
                                        foreach($_SESSION['cart_item'] as $item){
                                         ?>
                                        <tr>
                                            <td style="padding:1rem; margin:1rem;">
                                                <strong><?php echo $item["name"] ?></strong>
                                            </td>
                                            <td style="padding:1rem; margin:1rem;">
                                                <strong><?php echo $item["code"] ?></strong>
                                            </td>
                                            <td style="padding:1rem; margin:1rem;">
                                                <strong><?php echo $item["quantity"] ?></strong>
                                            </td>

                                            <td style="padding:1rem; margin:1rem;">
                                                <strong><?php echo $item["price"] ?></strong>
                                            </td>
                                            <td style="padding:1rem; margin:1rem;"><strong><a
                                                        href="shop.php?action=remove&code=<?php echo $item["code"]; ?>"
                                                        class="btn btn-primary">حذف</a></strong></td>
                                        </tr>
                                        <?php
                                        $item_number=0;
                                        $item_number+=($item["price"]*$item["quantity"]);
                                        if($item_number<2){
$post="1000";
$item_total+=(($item_number)+($post));
                                        }else{
                                            $post="2000";
                                            $item_total+=(($item_number)+($post));
                                        }
                                        $_SESSION['item_total']=$item_total;
                                     }?>
                                        <tr>
                                            <form method="POST" action="shop.php">
                                                <td style="padding:1rem; margin:1rem; float:center" colspan="6">
                                                    <br /><strong>تعداد کل </strong><?php echo $item["quantity"];?>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <strong>قیمت کل + هزینه پست</strong><?php echo $item_total; ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="submit" name="pay" value="پرداخت"
                                                        class="btn btn-primary">

                                                </td>
                                            </form>
                                        </tr>

                                    </tbody>
                                </table>
                                <br />
                                <?php
                                } else {
                                    echo '<div class="col-lg-12 warning"><center><h3> سبد خرید شما خالی است </h3></center></div>';
                                }
                                ?>
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