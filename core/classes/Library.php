<?php

    class Library extends Database
    {
        private $_user, $_uid;
        private $_categories = array();
        private $_subcategories = array();
        private $_books = array();

        public function __construct()
        {
            parent::__construct();
            $this->_user = new User();
            $this->_uid = $this->_user->getData('id');
        }

        public function categories()
        {
            $this->get("category", "*", "user_id='$this->_uid'");
            $this->_categories = $this->getResults();

            return $this->_categories;
        }

        public function subCategories()
        {

        }

        public function books()
        {
            $this->get("books", "*", "user_id='$this->_uid'");
            $this->_books = $this->getResults();

            return $this->_books;
        }

        public function favBooks()
        {
            $this->get("books", "*", "user_id='$this->_uid' AND is_favorite='1'");
            $favorites = $this->getResults();

            return $favorites;
        }
    }
?>