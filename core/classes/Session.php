<?php

    /**
     * CLASS: SESSION
     *
     * Description: This class deals with all things related
     * to Sessions.
     *
     * @author: Andre Ferraz
     * @copyright ^
     * @version: 2.0
     */
    class Session
    {
        /**
         * Description: Creates new Sessions
         *
         * @access public
         * @static
         */
        public static function set($name, $value)
        {
            $_SESSION[$name] = $value;
        }

        /**
         * Description: Returns Session Value
         *
         * @access public
         * @static
         */
        public static function get($name)
        {
            if(isset($_SESSION[$name]))
            {
                return $_SESSION[$name];
            }
        }

        /**
         * Description: Checks if a session exists
         *
         * @access public
         * @static
         */
        public static function isAlive($name)
        {
            return((isset($_SESSION[$name])) ? true : false);
        }

        /**
         * Description: Destroys sessions
         *
         * @access public
         * @static
         */
        public static function destroy()
        {
            session_unset();
            session_destroy();
        }
    }
?>