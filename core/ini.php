<?php
    //TODO
    // Basic Configuration
    date_default_timezone_set("Europe/London");
    session_save_path("sessions");

    session_start();

    // Load Classes
    spl_autoload_register(function($class)
    {
        require_once("classes/".$class.".php");
    });

    // Load Functions
    require_once("functions/security.php");
?>