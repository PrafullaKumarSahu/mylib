<?php
    // Used for development
    error_reporting(E_ALL);

    // Set Time Zone
    date_default_timezone_set("Europe/London");

    // Load all classes
    spl_autoload_register(function($class)
    {
        require_once("classes/".$class.".php");
    });
?>