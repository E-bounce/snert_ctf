<?php
    error_reporting(0);
    function upload_file($type){
        global $_FILES;
        $filename=md5($_FILES["file"]["name"]).".".$type;
        if (file_exists("upload/".$filename)){
            unlink("upload/".$filename);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$filename);
        $new_name="upload/".$filename;
        $info=finfo_open(FILEINFO_MIME_TYPE);
        $file_type=finfo_file($info,$new_name);
        finfo_close($info);
        $white_list=array("application/zip","application/x-rar"."application/x-xz");
        if (in_array($file_type,$white_list)){
            echo "<script>alert('ok')</script>";
        }
        else{
            unlink($new_name);
            die("no tricks!");
        }
    }
    function check_file(){
        global $_FILES;
        $white_list=array("zip","rar","tar.xz");
        $point=explode(".",$_FILES['file']['name']);
        $type=end($point);
        if (empty($type)){
            echo "<p>sorry!,you need upload something</p>";
            return false;
        }
        else{
            if (in_array($type,$white_list)){
                return $type;
            }
            else{
                echo "not allowed file type";
                return false;
            }
        }
    }
?>
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
</nav>
<div align = "center">
        <h1>懒得写前端直接嫖的,别在意这些细节</h1>
</div>
<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名:</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="提交">
    <?php
    $ok=check_file();
    if ($ok){
    upload_file($ok);
    }
    ?>
</div>
</body>
</html>
