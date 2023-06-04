<?php
namespace App\Master;

use Exception;

class Model
{
    public function __construct()
    {
        $this->connectDatabase();
    }
    public function connectDatabase(): \PDO
    {
        try {
            $db_name=isset($_ENV['DB_NAME'])?$_ENV['DB_NAME']:'';
            $db_user=isset($_ENV['DB_USER'])?$_ENV['DB_USER']:'';
            $db_pass=isset($_ENV['DB_PASSWORD'])?$_ENV['DB_PASSWORD']:'';
            $db_host=isset($_ENV['DB_HOST'])?$_ENV['DB_HOST']:'';
            $db_port=isset($_ENV['DB_PORT'])?$_ENV['DB_PORT']:'';
            if(empty($db_name)){
                throw new Exception('Please provide Database Name');
            }
            if(empty($db_user)){
                throw new Exception('Please provide Database User');
            }
            // if(empty($db_pass)){
            //     throw new Exception('Please provide Database Password');
            // }
            if(empty($db_host)){
                throw new Exception('Please provide Host');
            }
            if(empty($db_port)){
                throw new Exception('Please provide Port');
            }
            
            return new \PDO("mysql:host=$db_host;dbname=$db_name;port:$db_port", $db_user,$db_pass);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function executeQuery($query)
    {
        $statement = $this->connectDatabase()->query($query);
        $statement->execute();
        return $statement;
    }
    public function fetchAll($query)
    {
        try {
            $statement = $this->executeQuery($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function fetchObj($query)
    {
        try {
            $statement = $this->executeQuery($query);
            return $statement->fetch(\PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            echo $th;
        }
    }
}