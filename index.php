<?php
// This is my CONTROLLER

// Turn on output buffering
ob_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();
//var_dump($_SESSION);

// Require the autoload file
require_once ('vendor/autoload.php');

// Create an instance of the Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function ($f3){
    // Save the data to the "hive"
    $f3->set("username", "yreynoso");
    $f3->set("password", sha1("password1"));
    $f3->set("title", "Working with Template");

    $f3->set("color", "purple");
    $f3->set("radius", 10);

    // Array Variables
    $fruits =array('apple', 'orange', 'banana');
    $f3->set("fruits", $fruits);

    $dessertsOption = array('chocolate'=>'Chocolate Mouse',
        'vanilla'=>'Vanilla Custard',
        'strawberry'=>'Strawberry Shortcake');
    $f3->set("desserts", $dessertsOption);

    $view = new Template();
    echo $view->render('views/info.html');
});

// Run fat-free
$f3->run();

// Send output to the browser
ob_flush();