<?php

    $host="localhost";
    $user="root";
    $password="";
    $dbname="dbs1562887";


class Database
{
        
        /**
 * singleton instance
 *
 * @var Database
 */
    protected static $_instance = null;

    /**
     * Returns singleton instance of Database
     *
     * @return Database
     */
    public static function instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Database();
        }

        return self::$_instance;
    }

    /**
     * Hide constructor, protected so only subclasses and self can use
     */
    protected function __construct()
    {
    }

    public function __destruct()
    {
    }

    /**
     * Return a PDO connection using the dsn and credentials provided
     *
     * @param string $dsn The DSN to the database
     * @param string $username Database username
     * @param string $password Database password
     * @return PDO connection to the database
     * @throws PDOException
     * @throws Exception
     */
    public static function getConnexion()
    {
        $host="localhost";
        $user="root";
        $password="";
        $dbname="dbs1562887";
        $port='3306';
        $dsn='mysql:host='.$host."; port=".$port ."; dbname=".$dbname ."; charset=UTF8";
    

        $conn = null;
        try {
            $conn = new \PDO($dsn, $user, $password);

            //Set common attributes
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {

        //TODO: flag to disable errors?
        } catch (Exception $e) {

        //TODO: flag to disable errors?
        }
    }

    /** PHP seems to need these stubbed to ensure true singleton **/
    public function __clone()
    {
        return false;
    }
    public function __wakeup()
    {
        return false;
    }

}
