<?php

    /**
     * CLASS: FileHandler
     *
     * Description: This function deals with any file related
     * work.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */
    class FileHandler extends Database
    {

        private $_extensions;
        private $_message;
        private $_user;

        public function __construct()
        {
            parent::__construct();
            $this->_user = new User();
            $this->_message = new Message();
        }

        public function upload($file, $extensions = array())
        {
            if(is_array($extensions) && $extensions !=null)
            {
                $file_name = $file['name'];
                $file_tmp = $file['tmp_name'];
                $file_size = $file['size'];
                $file_error = $file['error'];
                $file_type = $file['type'];

                $this->_extensions = $extensions;

                # Get file extension
                $file_ext = explode(".", $file_name);
                $file_ext = strtolower(end($file_ext));

                if (in_array($file_ext, $this->_extensions))
                {
                    $file_destination = "include/users/".$this->_user->getData('token')."/".$file_name;
                    if(move_uploaded_file($file_tmp, $file_destination))
                    {
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
            }

        }

        public function isSize($size)
        {

        }


        public function isExtension($extension)
        {

        }

        public function check()
        {

        }
    }
?>