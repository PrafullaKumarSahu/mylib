<?php

    /**
     * CLASS: Redirect
     *
     * Description: Used to redirect user to external and
     * internal pages.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */
    class Redirect
    {
        /**
         * List of blocked websites
         *
         * @var array
         * @access: private
         * @static
         */
        private static $_blocked = array();

        /**
         * Description: Redirect user to specified location.
         * This also redirects to HTTP errors. Seconds can also
         * be used to delay the redirect.
         *
         * @param null $location
         * @param null $seconds
         * @access: public
         * @static
         */
        public static function to($location = null, $seconds = null)
        {
            if($location != null && !self::isBlocked($location))
            {
                if(is_numeric($location))
                {
                    switch($location)
                    {
                        case 403:
                            header("HTTP/1.0 403 Forbidden");
                            include_once("include/errors/403.php");
                            exit();
                            break;

                        case 404:
                            header("HTTP/1.0 404 Not Found");
                            include_once("include/errors/404.php");
                            exit();
                            break;

                        case 500:
                            header("HTTP/1.0 500 Internal Server Error");
                            include_once("include/errors/500.php");
                            exit();
                            break;
                    }
                }

                if($seconds != null && !is_numeric($location))
                {
                    sleep($seconds);
                    header("Location: ".$location);
                    exit();
                }

                header("Location:".$location);
                exit();
            }

        }

        /**
         * Description: Checks if page/website is blocked.
         *
         * @access: private
         * @static
         */
        public static function isBlocked($location)
        {
            //@todo check blocked websites
        }
    }
?>