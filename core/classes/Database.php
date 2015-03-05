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
        private $PDO;


        /**
         * Constructor initialises database connection,
         * and handles any errors thrown by the PDO object.
         *
         * @throws PDOException
         * @access protected
         */
        protected function __construct()
        {
            $host = parent::get("database/host");
            $dbnm = parent::get("database/dbname");
            $user = parent::get("database/username");
            $pass = parent::get("database/password");

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

        protected function query()
        {

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

        protected function delete()
        {

        }

        protected function update()
        {

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