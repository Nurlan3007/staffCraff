<?php
class router{
    public $uri;
    public $routes = [];
    public $mysqli;
    public function __construct($uri, $mysqli){
        $this -> uri = parse_url($uri, PHP_URL_PATH);
        $this -> mysqli = $mysqli;
    }
    public function get($path, $func){
        $route = new Route($path, $func);
        $this ->routes["GET"][] = $route;
    }
    public function post($path, $func){
        $route = new Route($path, $func);
        $this -> routes["POST"][] = $route;
    }
    public function run(){
        foreach ($this->routes[$_SERVER["REQUEST_METHOD"]] as $key => $route) {
            if ($this->uri == $route->path) {
                call_user_func($route->func, $this->mysqli);
            }
        }
    }
}


