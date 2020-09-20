<html lang="zh">
<head>
    <meta charset="UTF-8">
    <style>
p{ margin:0 auto}
    </style>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>文件上传</title>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">首页</a>
        </div>
        <ul class="nav navbar-nav navbra-toggle">
            <li class="active"><a href="read.php?file=">查看文件</a></li>
            <li><a href="upload.php">上传文件</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span></a></li>
        </ul>
    </div>
	<!--悄悄告诉你flag在flag.php里-->
</nav>
</body>
</html>
<?php
error_reporting(0);
function no_read_flag(){
    $read=$_GET['file'] ? $_GET['file'] : " ";
    if (is_array($read)){
        die("something error!");
    }
    else{
        if (preg_match("/ftp:|glob:|data:|gopher|file:|php:|https|http|flag|php1|php2|php3|php4|php5|phtml|pht/i",$read)) {
            die(" what do you want to do?");
        }
    }
    return $read;
}
$read=no_read_flag();
$string=file_get_contents($read);
show_source($read);
include_once $read ;
?>