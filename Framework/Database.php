

<?php

  class Database{

    public $conn;


    //Cosntructor for database class cu param config
    public function __construct($config){

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}"; //string for connectiom

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];    


        try{
            $this->conn = new PDO($dsn , $config['username'] , $config['password'] , $options);
        }   catch(PDOException $e) {
            
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }



    }

    public function query($query ,$params = []){

      try{
        $sth = $this->conn->prepare($query);

        //bind params
        foreach($params as $param => $value){
            $sth->bindValue(':'. $param , $value);//string | value
        }

        $sth->execute();

        return $sth;

      }catch(PDOException $e){

        throw new Exception("Query failed to execute : {$e->getMessage()}");

      }


    }


    //query the database


  }




?>