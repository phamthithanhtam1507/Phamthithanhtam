<?php
    require_once "../category/pdo.php";
    class Product extends Connection{
        public function getProdData(){
            $sql = "SELECT * FROM product INNER JOIN category ON product.cateId = category.id";
            $select = $this->prepareSQL($sql);
            $select->execute();
            return $select->fetchAll();
        }
        public function getOneProdData($data){
            $sql = "SELECT * FROM product WHERE prodId = :id";
            $select = $this->prepareSQL($sql);
            $select->execute($data);
            return $select->fetchAll();
        }
        public function createNewProdData($data){
            $sql = "INSERT INTO product VALUES (:prodId, :prodName, :prodPrice, :cateId)";
            $create = $this->prepareSQL($sql);
            $create->execute($data);
        }
        public function updateProdData($data){
            $sql = "UPDATE product SET prodName = :prodName, prodPrice = :prodPrice, cateId = :cateId  WHERE prodId = :id";
            $update = $this->prepareSQL($sql);
            $update->execute($data);
        }
        public function deleteProdData($data){
            $sql = "DELETE FROM product WHERE prodId = :id";
            $update = $this->prepareSQL($sql);
            $update->execute($data);
        }
    }
?>