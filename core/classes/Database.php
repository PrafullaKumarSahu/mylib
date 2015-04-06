<?php

    /**
     * CLASS: Database
     *
     * Description: This class deals with all database connection
     * across the website. If any class needs to use the database
     * it has to extends this one.
     *
     * @author: Andre Ferraz
     * @copyright: ^
     * @version: 2.0
     */
    class Database
    {
        /**
         * Holds Class Object instance
         *
         * @var Object
         * @access: Private
         * @static
         */
        private static $_instace;

        /**
         * Holds PDO Object
         *
         * @var PDO
         * @access: Private
         */
        private $_pdo;

        /**
         * Used to keep track of how many columns
         * has been found!
         *
         * @var int
         * @access: Private
         */
        private $_count;

        /**
         * Holds data from database
         *
         * @var array
         * @access: Private
         */
        private $_results = array();

        /**
         * Description: Instantiates PDO object
         *
         * @access: Protected
         */
        protected function __construct()
        {
            $host = Config::get("database:host");
            $user = Config::get("database:username");
            $pass = Config::get("database:password");
            $dbna = Config::get("database:dbname");

            try
            {
                $this->_pdo = new PDO("mysql:dbname=".$dbna.";host=".$host.";", $user, $pass);
            }
            catch(PDOException $e)
            {
                Redirect::to(500);
            }
        }

        /**
         * Description: Gets data from the database
         *
         * @access: protected
         * @return boolean
         */
        protected function get($table, $columns, $condition = null)
        {
            if($condition != null)
            {
                $query = $this->_pdo->prepare("SELECT $columns FROM $table WHERE $condition");
                if($query->execute())
                {
                    $this->_count = $query->rowCount();
                    if($this->_count > 0)
                    {
                        $this->_results = $query->fetchAll();
                        return true;
                    }

                    return false;
                }
            }
            return false;
            //@todo condition == null
        }

        /**
         * Description: Very similar to get function, but
         * instead it just checks if data exists without storing
         * any data.
         *
         * @access: protected
         * @return boolean
         */
        protected function query($table, $columns, $condition = null)
        {
            if($condition != null)
            {
                $query = $this->_pdo->prepare("SELECT $columns FROM $table WHERE $condition");
                if($query->execute())
                {
                    $this->_count = $query->rowCount();
                    return(($this->_count > 0)? true : false);
                }
            }
            return false;
            //@todo condition == null
        }

        /**
         * Description: Updates information on the database
         *
         * @access: protected
         */
        protected function update($table, $CV = array(), $condition)
        {
            if($CV !=null)
            {
                $columns = '';
                $x = 1;

                foreach($CV as $key => $value)
                {
                    $columns .= "$key='$value'";
                    if($x < count($CV))
                    {
                        $columns .= ",";
                    }
                    $x++;
                }

                $query = $this->_pdo->prepare("UPDATE $table SET $columns WHERE $condition");
                if($query->execute())
                    return true;
                else
                    return false;
            }

            return false;
        }

        /**
         * Description: Inserts data into database
         *
         * @access: protected
         */
        protected function insert()
        {
            //@todo
        }

        /**
         * Description: Deletes data from the database
         *
         * @access: protected
         */
        protected function delete()
        {
            //@todo
        }

        protected function getResults()
        {
            return $this->_results;
        }

        /**
         * Description: Singleton pattern, prevents multiple
         * instantiations of the same class.
         *
         * NOTE: This is not needed. Only for "show of"
         *
         * @access: public
         * @static
         * @return Object
         */
        public static function instance()
        {
            if(isset(self::$_instace))
                return self::$_instace;
            else
                self::$_instace = new self;
        }
    }
?>