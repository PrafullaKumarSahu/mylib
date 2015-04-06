<?php
    /**
     * Description: Contains configuration that will be require
     * all other the website. This includes class objects, functions,
     * sessions, timezone, error reporting .. etc.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */

    # Basic Configuration
    error_reporting(E_ALL);
    date_default_timezone_set("Europe/London");
    $date = new DateTime();
    session_start();

    # Load Functions
    require_once("functions/functions.php");

    # Load Classes
    spl_autoload_register(function($class)
    {
        require_once("classes/" . $class . ".php");
    });

    # Instantiate classes
    $redirect = new Redirect();
    $message = new Message();
    $user = new User();
    $library = new Library();
    $file_handler = new FileHandler();
?>