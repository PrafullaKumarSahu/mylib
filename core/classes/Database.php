<?php
/**
 * Class Database
 *
 * Deals with everything to do with database,
 * including queries and database configuration.
 *
 * @author Andre Ferraz
 * @copyright 2015 Andre Ferraz
 * @since Version 1.0
 * @TODO
 */

    class Database extends Config
    {
        /**
         * Object Instance
         *
         * @var Object
         * @staticvar
         * @access private
         */
        private static $instance;

        /**
         * The active PDO connection
         *
         * @var PDO object
         * @access protected
         */
        private $PDO, $results;


        /**
         * Constructor initialises database connection,
         * and handles any errors thrown by the PDO object.
         *
         * @throws PDOException
         * @access protected
         */
        protected function __construct()
        {
            $host = parent::getConf("database/host");
            $dbnm = parent::getConf("database/dbname");
            $user = parent::getConf("database/username");
            $pass = parent::getConf("database/password");

            try
            {
                $this->PDO = new PDO("mysql:dbname=".$dbnm.";host=".$host.";", $user, $pass);
            } catch(PDOException $e)
            {
                $error_code = $e->getCode();
                switch($error_code)
                {
                    default:
                        print("An error has been found!");
                        break;
                }
            }
        }

        /**
         * This function is used to insert information
         * into the database.
         *
         * @param String $table
         * @param array $CV
         * @access protected
         * @return bool
         */
        protected function insert($table, $CV = array())
        {
            if(count($CV))
            {
                // Join array elements with a string
                $columns = implode(", ", array_keys($CV));
                $values = '';
                $x = 1;

                // Put array key values into variables
                foreach($CV as $value)
                {
                    $values .= "'".$value."'";
                    if($x < count($CV))
                    {
                        $values .= ', ';
                    }

                    $x++;
                }

                $sql = $this->PDO->prepare("INSERT INTO $table ($columns) VALUES({$values})");

                // Check execution is successful
                if($sql->execute())
                    return true;
                else
                    return false;
            }

            return false;
        }

        /**
         * @param $table
         * @param array $CV
         * @param null $condition
         */
        protected function update($table, $CV = array(), $condition = null)
        {
            // TODO
        }

        /**
         * This function is used to get data from the database,
         * it will first check the parameters against a few conditions,
         * if the condition pass then it will set the variable $results,
         * to the data retrieved on the database and will return true. If the query does not
         * match any data, the function will return false;
         *
         * @param $table
         * @param null $columns
         * @param null $condition
         * @access protected
         * @return bool
         */
        protected function get($table, $columns = null, $condition = null)
        {
            // If columns is not null, do some checks
            if($columns != null)
            {
                // If condition is not null
                if($condition != null)
                {
                    $q = $this->PDO->prepare("SELECT $columns FROM $table WHERE $condition");
                    if($q->execute())
                    {
                        $this->results = $q->fetchAll(PDO::FETCH_OBJ);
                        return true;
                    }
                        return false;
                }
                else
                {
                    // If condition is null
                    $q = $this->PDO->prepare("SELECT $columns FROM $table");
                    if($q->execute())
                    {
                        $this->results = $q->fetchAll(PDO::FETCH_OBJ);
                        return true;
                    }
                    return false;
                }
            }
            // If columns is null, do some checks
            else
            {
                // Condition is not null
                if($condition != null)
                {
                    $q = $this->PDO->prepare("SELECT * FROM $table WHERE $condition");
                    if($q->execute())
                    {
                        $this->results = $q->fetchAll(PDO::FETCH_OBJ);
                        return true;
                    }
                    return false;
                }
                // Condition is null
                else
                {
                    $q = $this->PDO->prepare("SELECT * FROM $table");
                    if($q->execute())
                    {
                        $this->results = $q->fetchAll(PDO::FETCH_OBJ);
                        return true;
                    }
                    return false;
                }
            }
        }

        /**
         * This function is used to delete data from the database
         *
         * @param $table
         * @param null $condition
         * @access protected
         * @return bool
         */
        protected function delete($table, $condition = null)
        {
            if($condition != null) {
                $q = $this->PDO->prepare("DELETE FROM $table WHERE $condition");

                if ($q->execute())
                {
                    $this->results = $q->fetchAll(PDO::FETCH_OBJ);
                    return true;
                } else
                {
                    return false;
                }

            } else
            {
                $q = $this->PDO->prepare("DELETE FROM $table");
                if($q->execute())
                    return true;
                else
                    return false;
            }
        }

        /**
         * This function is used to retrieve the data stored
         * on the variable $results
         *
         * @access public
         * @return FETCHED PDO
         */
        public function getResults()
        {
            return $this->results;
        }

        /**
         * Singleton Function
         *
         * Checks if instance variable has been set if not,
         * its assigned to a instance of the class. This
         * will also prevent multiple instances of the class to
         * be instantiated.
         *
         * @static
         * @access public
         * @return mixed
         */
        public function getInstance()
        {
            if(!isset(self::$instance))
                self::$instance = new Database();
            else
                return self::$instance;
        }
    }