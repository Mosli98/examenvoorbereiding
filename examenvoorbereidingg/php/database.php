<?php

class database
{

    private $host;
    private $database;
    private $username;
    private $password;
    private $charset;
    private $conn;

    function __construct(){

        $this->host = "localhost";
        $this->username = "root";
        $this->password = '';
        $this->database = "excellenttaste";
        $this->charset = "utf8";

        $options = [ 
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            //connect to database with PDO
            $conn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";

            $this->db = new PDO($conn, $this->username, $this->password, $options);
            

        } catch (\PDOException $e) {
            throw new \PDOException("Unable to connect: " . $e->getMessage());
        }
    }

      
        public function select($statement, $named_placeholder){

            $stmt = $this->db->prepare($statement);

            // Excecute the query

            $stmt->execute($named_placeholder);

            $result = $stmt->fetchall(PDO::FETCH_ASSOC);

            return $result;
        } 

        public function insert($statement, $placeholder, $locatie){

            try{
                $this->db->beginTransaction();

                $stmt = $this->db->prepare($statement);

                // Excecute the query

                $stmt-> execute($placeholder);

                $this->db->commit();

                header("location: $locatie");

            } catch(Exception $e){
                $this->db->rollback();
                echo "error message" . $e->getMessage();
            }
        }

        public function edit_or_delete($statement, $placeholder, $location){
            $stmt = $this->db->prepare($statement);
            // Excecute the query
            $stmt->execute($placeholder);
            header("location: $location");
        }
}  
        
?>