<?php
abstract class Connection{
    protected $connection,
    $host,
    $dbname,
    $username,
    $password;
    public function __construct(){
        $this->host = 'localhost';
        $this->dbname = 'test';
        $this->username = 'root';
        $this->password = '';
        $this->connection = $this->connect();
    }
    public function connect(){
        try{
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        }
        catch (Exception $e) {
            die($e->getMessage());     
        }
    }
    public function prepareSQL($sql){
        return $this->connection->prepare($sql);
    }
}
class Category extends Connection{
    public function getData(){
        $sql = "SELECT * FROM category";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getOneData($data){
        $sql = "SELECT * FROM category WHERE id = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }
    public function createNewData($data){
        $sql = "INSERT INTO category (name) VALUES (:name)";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }
    public function updateData($data){
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }
    public function deleteData($data){
        $sql = "DELETE FROM category WHERE id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }
}
?>