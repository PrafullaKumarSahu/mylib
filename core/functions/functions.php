<?php

    function isForm($method = "POST")
    {
        switch($method)
        {
            case "POST":
                return (!empty($_POST)) ? true :  false;
                break;
            case "GET":
                return (!empty($_GET)) ? true :  false;
                break;
            default:
                return false;
                break;
        }
    }

    function inputValue($input)
    {
        if(isset($_POST[$input]))
        {
            return($_POST[$input]);
        }
        elseif(isset($_GET[$input]))
        {
            return($_GET[$input]);
        }

        return '';
    }
?>