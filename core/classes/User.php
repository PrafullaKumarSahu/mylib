<?php

    /**
     * CLASS: USER
     *
     * Description: This class is responsible to handle all user
     * related functionality. Inherits properties from Database.
     *
     * @author: Andre Ferraz
     * @copyright ^
     * @version: 2.0
     */
    class User extends Database
    {
        /**
         * Holds User data
         *
         * @access: private
         * @var array
         */
        private $_data = array();

        /**
         * Temporary holder for user id
         *
         * @access: private
         * @var
         */
        private $_uid;

        /**
         * Description: Instantiates parent constructor.
         * @access: public
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Description: Logs user in, sets login session with the user
         * id. This function is only called once some checks have
         * been made in the login page.
         *
         * @access: public
         * @param $username
         * @param $password
         * @return bool
         */
        public function login($username, $password, $date)
        {
            if($this->isValidUser($username) && $this->isValidPassword($username, $password))
            {
                $this->get("users", "id", "username='$username' AND password='".Security::encrypt($password)."'");
                $this->_uid = $this->getResults();
                $this->_uid = $this->_uid[0]['id'];
                $this->update("users", array
                (
                    "last_login" => $date
                ), "id="."'".$this->_uid."'");

                Session::set(Config::get("sessions:user_session"), $this->_uid);

                return true;
            }
            else
            {
                return false;
            }
        }

        /**
         * Description: Add new user to the database, this function is
         * only called once some checks have been made int he register
         * page.
         *
         * @access: public
         */
        public function register()
        {
            //@todo
        }

        /**
         * Description: Check if a user exists, returns false if can
         * not be found and true if user is found. This function is
         * used for login and register forms.
         *
         * @access: public
         * @param $username
         * @return bool
         */
        public function isValidUser($username)
        {
            return $this->query("users", "username", "username='$username'");
        }

        /**
         * Description: Check if a email exists, returns false if can
         * not be found and true if it is found. This function is
         * used for register forms and for future use in login form.
         *
         * @todo use email for login
         * @access: public
         * @param $username
         * @param $email
         * @return bool
         */
        public function isValidEmail($username, $email)
        {
            return $this->query("users", "email", "username='$username' AND email='$email'");
        }

        /**
         * Description: Check if a password is valid, according to the
         * username provided. If the password matches the username password
         * return true otherwise false. This is used for login form and other
         * relative functionality that requires the user to enter a password.
         *
         * @access: public
         * @param $username
         * @param $password
         * @return bool
         */
        public function isValidPassword($username, $password)
        {
            $password = Security::encrypt($password); // Encrypt Password First.
            return $this->query("users", "password", "username='$username' AND password='$password'");
        }

        /**
         * Description: Checks if the user is loggedin or in other words
         * if user session is set it will return true otherwise false.
         *
         * @access: public
         * @return bool
         */
        public function isLoggedIn()
        {
            return((Session::isAlive(Config::get("sessions:user_session"))) ? true : false);
        }

        /**
         * Description: Checks if the user has has confirmed the email
         * address. If user has not confirmed it returns false otherwise
         * returns true. This function is used for the login form. User
         * must have confirmed the email to be able to login.
         *
         * @access: public
         * @param $username
         * @return bool
         */
        public function isActive($username)
        {
            return $this->query("users", "active", "username='$username' AND active='1'");
        }

        /**
         * Description: This function sets user data and at he same time
         * returns the data, so it can be used all over the website.
         *
         * @access: public
         * @param $row
         * @return mixed
         */
        public function getData($row)
        {
            $id = Session::get(Config::get("sessions:user_session"));
            if(isset($id))
            {
                $this->get("users", "*", "id='$id'");
                $this->_data = $this->getResults();

                switch ($row) {
                    case "date_joined":
                        return date('d-m-Y', strtotime($this->_data[0][$row]));
                        break;
                    default:
                        return $this->_data[0][$row];
                        break;
                }
            }
        }

        /**
         * Description: Generates token and send to email for confirmation
         *
         * @access: Private
         */
        private function sendConfirmation()
        {
            //@todo
        }
    }
?>