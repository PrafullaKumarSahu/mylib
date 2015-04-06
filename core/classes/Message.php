<?php

    /**
     * CLASS: Messages
     *
     * Description: This class is in charge of printing
     * error and successful messages to the user.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */
    class Message
    {
        private $_message = array();

        /**
         * Description: Adds message to array
         * @access: public
         */

        public function __construct(){}

        public function add($message)
        {
            $this->_message[] = $message;
        }

        /**
         * Description: return first message of array
         * @access: public
         */
        public function get()
        {
            if(!empty($this->_message))
            {
                return $this->_message[0];
            }
        }
    }
?>