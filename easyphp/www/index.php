<?php
include("./web4.php");
error_reporting(0);
function is_true_music($string){
    return preg_match("/^d(.*?)b$/i",$string);
}
if(isset($_POST['key'])&&isset($_GET['message'])) {
    if(is_array($_POST['key'])!==true){
        $beats = "d" . $_POST['key'] . "b";
        if (is_true_music($beats)) {
            die("真正的音乐!");
        } else {
            echo "让我看看你是不是真正的音乐\n";
            $false_music = unserialize($_GET['message']);
        }
    }
}
else{
    die("也许你需要仔细找找其他线索");
}