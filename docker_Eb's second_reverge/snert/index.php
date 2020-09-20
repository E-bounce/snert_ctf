<?php
error_reporting(0);
function filter($string){
    return str_replace('*eb*','@@',$string);
}

class Person
{
    public $age;
    public $name;
    public $nothing_here;

    public function __construct($age, $name, $nothing)
    {
        $this->age = $age;
        $this->name = $name;
        $this->nothing_here = $nothing;
    }

    public function __destruct()
    {
        echo "我要用腐朽的声音说出" . $this->age . $this->name . $this->nothing_here."<br>";
    }
}

class I
{
    public $data;
    public $u;

    public function __clone()
    {
        echo "you're clone this object" . $this->data;
    }

    public function __call($name, $params)
    {
        $funcname = $this->u;
        $funcname();
    }

    public function __toString()
    {
        $this->u();
        return "I dreamt\n";
    }
}

class Go
{
    public $G;
    public $O ;

    function __construct()
    {
        $this->G = "hello";
    }

    function __invoke()
    {
        if (preg_replace("/[a-z0-9A-Z]+\((?R)?\)/", "", $this->G) === ";") {
            eval($this->G);
        } else {
            die("no way!");
        }
    }
}
unserialize(filter(serialize(new Person($_GET['age'],$_GET['name'],$_GET['nothing']))));
//flag在上层目录
