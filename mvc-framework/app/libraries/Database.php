<?php

/**
 * Dit is de database class die alle communicatie met de database verzorgt. 
 */
class Database
{
    // Properties
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $statement;


    // Dit is de constructor van de Database class. We maken verbinding met de MySQL server
    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            //We maken een verbinding met de PDO server door een nieuw PDO object te maken
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            // var_dump($e)
            // echo $e->getMessage();
            echo '<p style="color:red">Er is een database error opgetreden</p>';
        }
    }

    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($$sql);
    }
    public function execution()
    {
        return $this->statement-> execute();
    }

    public function resultSet()
    {
        $this -> execute();
        return $this->statement->fetchALL(PDO::FETCH_OBJ);
    }

}
