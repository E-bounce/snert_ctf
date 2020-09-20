<?php
error_reporting(0);
class output{
    public $flag;
    public function __construct()
    {
        $this->flag="hello_world";
    }
}
function is_ok($arr){
    ob_start();
    if (md5($arr['first']) > 787878 * 787878 && isset($arr['first'])) {
        if ((intval($arr['second']) < 700) && ($arr['second'] == 700)) {
            if (($arr['third'] > 0) && (intval($arr['third'] + $arr['second'])<0)){
                require "./flag.php";
                echo $flag;
                return true;
            }else{
                die('hello me from another side');
            }
        }else{
            die("it's me");
        }
    }
    else{
        die("hello");
    }
}
function get_value()
{
    foreach ($_REQUEST as $a => $b) {
        if(is_array($b)!==true){
            if (preg_match("|^[a-z0-9_A-Z]*?$|i",$b)) {
                echo "no_no_no_no_no";
                return false;
            }
        }
        else{
            echo "no,that's not the point";
            return false;
        }
    }
    return is_ok($_GET);
}
show_source(__FILE__);
if(get_value()){
    if ($_GET['string']){
        $k=unserialize($_GET['string']);
        echo $k->flag;
    }
    else{
        $hello=new output();
        echo $hello->flag;
    }
    ob_clean();
}