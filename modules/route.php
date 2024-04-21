<?php
class Route{
    public $path;
    public $func;
    public function __construct($path, $func){
        $this -> path = $path;
        $this -> func = $func;
    }


}