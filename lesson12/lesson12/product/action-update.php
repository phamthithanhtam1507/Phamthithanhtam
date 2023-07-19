<?php 
    require_once "pdo.php";
    $product = new Product(null, null, null);
    $data = [
        'prodName' => $_POST['name'],
        'prodPrice' => $_POST['price'],
        'cateId' => $_POST['cateId'],
        'id' => $_GET['id']
    ];
    $product->updateProdData($data);
    header("Location: http://localhost/learn_php/BTVN11/product/index.php");
?>