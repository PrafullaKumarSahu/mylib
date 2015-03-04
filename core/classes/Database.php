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
    require_once("Config.php");
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
         * @var PDO
         * @access protected
         */
        protected $pdo;


        /**
         * Constructor initialises database connection,
         * and handles any errors thrown by the PDO object.
         *
         * @throws PDOException
         * @access private
         */
        private function __construct()
        {
            $host = parent::get("database/host");
            $dbnm = parent::get("database/dbname");
            $user = parent::get("database/username");
            $pass = parent::get("database/password");

            try
            {
                $this->pdo = new PDO("mysql:dbname=".$dbnm.";host=".$host.";", $user, $pass);
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

        protected function select()
        {

        }

        protected function insert()
        {

        }

        protected function update()
        {

        }

        protected function delete()
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
        public static function getInstance()
        {
            if(!isset(self::$instance))
                self::$instance = new Database();
            else
                return self::getInstance();
        }
    }
?>