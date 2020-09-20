<?php
include("./flag_web4.php");
class Easy_user{
    public $item="hello";
    public $message="user";
    public function say_hi(){
        sprintf("hello %s",$this->message);
    }
    public function __wakeup()
    {
        $this->say_hi();
    }
}
class Easy_jump{
    public $n=array();
    public $str;
    public function __toString()
    {
        $this->str->message;
        return "something_wrong!";
    }
}
class Easy_flag{
    public $string;
    public $params=array();
    function read($string){
        echo file_get_contents($string);
    }
    function get($name){
        $this->string=$this->params[$name];
        return $this->read($this->string);
    }
    function __get($name)
    {
        return $this->get($name);
    }
}