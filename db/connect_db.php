<?php
require_once "config.php";
$mysqli = new mysqli(PORT, USER, PASSWORD, NAME);

if($mysqli -> connect_errno){
    print_r($mysqli -> error_list);
	die("Ошибка Подключения :JGF");
}
