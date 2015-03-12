<?php

/**
 * Class Config
 *
 * Contains all configuration settings for database,
 * language, session data and cookie data.
 *
 * @author Andre Ferraz
 * @copyright 2015 Andre Ferraz
 * @since version 1
 * @TODO
 */
    class Config
    {

        /**
         * @var array
         * @access private
         * @staticvar
         */
        private static $config = array
        (
            "database" => array
            (
                "host" => "localhost",
                "username" => "root",
                "password" => "",
                "dbname" => "test"
            )
        );

        /**
         * @access public
         * @static
         * @param null $path
         * @return array, mixed
         */
        public static function getConf($path = null)
        {
            if($path != null)
            {
                $config = self::$config;
                $path = explode("/", $path); // Split string by string

                foreach($path as $bit)
                {
                    if(isset($config[$bit]))
                    {
                        $config = $config[$bit];
                    }
                }

                return $config;
            }
        }
    }
?>