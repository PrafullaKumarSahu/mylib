<?php
    require_once("core/ini.php");
    if($user->isLoggedIn())
    {
        Session::destroy();
        Redirect::to("login/");
    }
    else
    {
        Redirect::to("login/");
    }
?>