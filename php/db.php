<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost:1521/orcl';
        $this->db = ''; // No es necesario para Oracle
        $this->user = 'system';
        $this->password = 'Salazar123';
        $this->charset = 'utf8mb4';
    }

    function conectar(){
        try{
            $connection = "oci:dbname=//" . $this->host . ";charset=" . $this->charset; // Añadimos "//" antes del nombre del host
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}


?>
