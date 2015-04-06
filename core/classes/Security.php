<?php

    /**
     * CLASS: Security
     *
     * Description: Contains functions to secure application against
     * vulnerabilities. These include XSS, CSRF & Password Encryption
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */
    class Security
    {
        /**
         * Stores token value
         * @var string
         */
        private $_token;

        /**
         * Description: Generates new token through generate
         * function. Stores it into a session. The purpose of
         * generating a token is to prevent CSRF. Token ill be
         * user in every POST and GET form in the website.
         *
         * Further more: This token will also prevent the same form
         * from being submitted twice.
         *
         * @access: public
         * @static
         */
        public static function doToken()
        {
            $token = md5(uniqid());
            Session::set(Config::get("sessions:token_session"), $token);
            return $token;
        }

        /**
         * Description: Checks if token in form matches the
         * once stored.
         *
         * @access: public
         * @static
         */
        public static function isToken($token)
        {
            return (Session::get(Config::get("sessions:token_session")) == $token) ? true : false;
        }

        /**
         * Description: Secure your application against Cross Site
         * Scripting (XSS) vulnerabilities.
         * @access: public
         * @static
         */
        public static function encoder()
        {

        }

        /**
         * Description: Encrypts password with sha1 and md5.
         *
         * @param $password
         * @return string
         */
        public static function encrypt($password)
        {
            $password = md5(sha1($password . sha1($password, "@ndr!3@6b")));
            return $password;
        }


        /**
         * Description: Algorithms to generate tokens
         *
         * @access: private
         * @static
         */
        private function generate()
        {
            //@todo
        }
    }
?>