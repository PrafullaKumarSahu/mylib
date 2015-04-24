<?php

    class Library extends Database
    {
        private $_user, $_uid;
        private $_categories = array();
        private $_subcategories = array();
        private $_subcategory = array();
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

        public function createCategory($name, $description, $date)
        {
            return $this->insert("category", array
            (
                "user_id" => $this->_uid,
                "name" => $name,
                "description" => $description,
                "date_create" => $date
            ));
        }

        public function subCategories()
        {
            $this->get("category", "*", "user_id='$this->_uid'");
            $this->_subcategories = $this->getResults();

            return $this->_subcategories;
        }

        public function getSubCategory()
        {
            $this->get("sub_category", "*", "user_id='$this->_uid'");
            $this->_subcategory = $this->getResults();

            return $this->_subcategory;
        }

        public function deleteSubCategory($id)
        {
            return $this->delete("sub_category", "id=".$id);
        }

        public function deleteCategory($id)
        {
            return $this->delete("category", "id=".$id);
        }

        public function createSubCategories($parent, $name, $description, $date)
        {
            return $this->insert("sub_category", array
            (
                "user_id" => $this->_uid,
                "category_id" => $parent,
                "name" => $name,
                "description" => $description,
                "date_created" => $date
            ));
        }

        public function books()
        {
            $this->get("books", "*", "user_id='$this->_uid'");
            $this->_books = $this->getResults();

            return $this->_books;
        }

        public function getBooks($userid)
        {
            $this->get("books", "*", "user_id='$userid'");
            return $this->getResults();
        }

        public function favBooks()
        {
            $this->get("books", "*", "user_id='$this->_uid' AND is_favorite='1'");
            $favorites = $this->getResults();

            return $favorites;
        }
    }
?>