<?php
    /**
     * CLASS: Config
     *
     * Description: Contains essential configuration
     * for internal functionality.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */

    class Config
    {
        /**
         * Contains config data
         *
         * @var array
         * @access: private
         * @static
         */
        private static $_config = array
        (
            "database" => array
            (
                "username" => "root",
                "password" => '',
                "dbname" => "mylib",
                "host" => "localhost"
            ),

            "sessions" => array
            (
                "user_session" => "user",
                "token_session" => "token"
            ),

            "cookies" => array
            (
                "lang_cookie" => ""
            ),

        );

        /**
         * Description: returns value of keys
         *
         * @access: public
         * @static
         */
        public static function get($key = null)
        {
            if($key != null)
            {
                $_config = self::$_config;
                $key = explode(":", $key); // Splits string by another

                foreach($key as $value)
                {
                    if(isset($_config[$value]))
                    {
                        $_config = $_config[$value];
                    }
                }
            }

            return $_config;
        }
    }
?>