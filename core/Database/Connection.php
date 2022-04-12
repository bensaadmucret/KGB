<?php declare(strict_types=1);


namespace Core\Database;

use Core\DotEnv;


/**
 * Represent the Connection
 */
class Connection
{

    /**
     * Connection
     * @var type
     */
    private static $conn;

    /**
     * Connect to the database and return an instance of \PDO object
     * @return \PDO
     * @throws \Exception
     */
    public function connect()
    {
        

       (new DotEnv(__DIR__ . DS .'.env'))->load();

        $conStr = sprintf(
            "mysql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            getenv('Host'),
            getenv('Port'),
            getenv('Database'),
            getenv('Username'),
            getenv('Password')
           
        );
      
        try {
            $pdo = new \PDO($conStr);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("Error connecting to the database: " . $e->getMessage());
        }     
        

        return $pdo;
    }

    /**
     * return an instance of the Connection object
     * @return type
     */
    public static function get()
    {
        if (null === static::$conn) {
            static::$conn = new static();
        }

        return static::$conn;
    }

    public function __construct()
    {
    }
    public function __clone()
    {
    }
    public function __wakeup()
    {
    }
    public function close()
    {
        if (null !== static::$conn) {
            static::$conn = null;
        }
    }
}
