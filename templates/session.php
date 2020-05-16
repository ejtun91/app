<?php

if(!isset($_SESSION)){
    session_start();
}


require_once __DIR__ . '/../src/main_controller.php';

$session = new USER();

?>