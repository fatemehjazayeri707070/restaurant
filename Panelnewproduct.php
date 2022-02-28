
<?php
session_start();
$_SESSION['error']=" ";
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
<div id="wrapper">

<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0;">

<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" >

<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="paneldashboard.php"> مدیریت پنل</a>
</div>
<div style="color: white; padding: 15px 50px 5px 50px; float: left; font-size: 16px; ">

<a href="panellogin.php" class="btn btn-danger square-btn-adjust"> خروچ</a>

</div>
</nav>
<!-- NAV TOP -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">

<li>

<a href="paneldashboard.php"><i class="fa fa-dashboard fa-3x"></i> داشبورد</a>

</li>
<li>

<a class="active-menu" href="panelnewproduct.php"><i class="fa fa-table fa-3x"></i> محصولات مدیریت</a>

</li>
<li>

<a href="panelsells.php"><i class="fa fa-desktop fa-3x"></i> فروش مدیریت</a>

</li>
<li>

<a href="panelusers.php"><i class="fa fa-qrcode fa-3x"></i> کاربران مدیریت</a>

</li>
</ul>
</div>
</nav>
<!-- NAV SIDE -->
<div id="page-wrapper">
<div id="page-inner">

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading">
مدیریت محصولات
</div>
<div class="panel-body">
<form method="POST" action="panelnewproduct.php"
role="form" enctype="multipart/form-data">
<br/>
<h3 style="color: red;"><?php echo $_SESSION['error']; ?></h3>
<div class="col-md-6 form-group">

<input type="text" name="id" class="form-control" placeholder="ID" />

</div>

<div class="col-md-6 form-group">

<input type="text" name="name" class="form-control" placeholder="نام"/>
</div>
<div class="col-md-6 form-group">
<input type="text" name="code" class="form-control" placeholder="کد"/>
</div>

<div class="col-md-6 form-group">

<input type="text" name="price" class="form-control" placeholder="قیمت"/>
</div>
<div class="col-md-6 form-group">

<input type="file" class="form-control" name="file" />

</div>

<div class="col-md-6 form-group">

<textarea name="description" class="form-control" placeholder="توضیحات"></textarea>

</div>
<div>
<input type="submit" name="add" class="btn btn-primary" value="ثبت"/>
<input type="submit" name="delete" class="btn btn-primary" value="حذف"/>
<input type="submit" name="update" class="btn btn-primary" value="ویرایش"/>

</div>
</form>
</div>
</div>
</div>
</div>
<!-- row -->
<hr/>
<div class="row">
<div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-success">
<div class="panel-heading">
جدول محصولات
</div>

<div class="panel-body">

<div class="table-responsive">

<table class="table table-striped table-bordered table-hover" >

<thead>
<tr>
<th>ID</th>
<th>نام</th>
<th>قیمت</th>
<th>کد</th>
<th>عکس</th>
<th>توضیحات</th>
</tr>
</thead>
<tbody>
<?php

$sql="SELECT * FROM product ORDER BY id DESC";
$result = $conn->query($sql);
if($result -> num_rows >0){
while($row = $result->fetch_assoc()){
?>

<tr class="odd gradeX">
<td><?=$row['id']; ?></td>
<td><?=$row['name']; ?></td>
<td><?=$row['price']; ?></td>
<td ><?=$row['code']; ?></td>
<td><a href="allproduct.php"><?=$row['photo']; ?></a></td>


<td ><?=$row['description']; ?></td>
</tr>  


<?php
}
}else{
echo "0 results";
}
$conn->close();
}
?>
</tbody>
</table>
</div>
</div>
</div>

<!-- End Advanced Tables -->

</div>
</div>
<!-- End row -->
</div>
</div>
<!-- End page inner -->
</div>
<!-- End -->

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
<?php
if(isset($_POST['add'])){
funcadd();
}
else if(isset($_POST['delete'])){
funcdelete();
}
else if(isset($_POST['update'])){
funcupdate();
}
function funcadd(){
require "connection.php";
$conn->set_charset("utf8");
$name = $_POST['name'];
$code = $_POST['code'];
$price = $_POST['price'];
$description = $_POST['description'];
$target_dir = "assets/images/";
$url = $target_dir.basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES['file']['tmp_name'], 'assets/images/'.$_FILES['file']['name']);
if(isset($name) AND isset($code) AND isset($price) AND isset($url) AND isset($description) AND !empty($name)

AND !empty($code) AND !empty($price) AND !empty($url) AND !empty($description) ){
$sql1 = "INSERT INTO product(name, code, description, photo, price)
VALUES ('$name', '$code', '$description', '$url', '$price') ";
if($conn->query($sql1) === TRUE){
echo "<script> location.href='panelnewproduct.php'; </script>";
$_SESSION['error']-"";
} else {echo "Error: ". $sql1 ."<br>". $conn->error;}
$conn->close();
} else {
    $_SESSION['error']="لطفا تمام فیلدها را پر بفرمایید";

}
}
function funcdelete(){
require "connection.php";
$conn->set_charset("utf8");
$ID = $_POST['id'];
if($ID !=null ){
$sql2="DELETE FROM product WHERE id='$ID'";
if(mysqli_query($conn, $sql2)){
echo "<script> location.href='panelnewproduct.php'; </script>";
$_SESSION['error']="";
} else {echo "Error deleting record: ". mysqli_error($conn);}
}
else{
    $_SESSION['error']="لطفا آی دی را وارد نمایید";

}
$conn->close();
}
function funcupdate(){
require "connection.php";
$conn->set_charset("utf8");
$ID = $_POST['id'];
$name = $_POST['name'];
$code = $_POST['code'];
$price = $_POST['price'];
$description = $_POST['description'];
$target_dir = "assets/images/";
$url = $target_dir.basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES['file']['tmp_name'], 'assets/images/'.$_FILES['file']['name']);

if($ID !=null AND $name !=null){
$sql3="UPDATE product SET name='$name', code='$code', price='$price', description='$description', photo='$url'  WHERE id='$ID'";
if($conn->query($sql3) === TRUE){
echo "<script> location.href='panelnewproduct.php'; </script>";
$_SESSION['error']="";}
}
else{
echo "Error updating record:". $conn->error;
}

$conn->close();
}
?>