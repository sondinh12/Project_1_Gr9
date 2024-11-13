<?php

class ProductsController{
    public function list() {
       $products=(new Product)->all();
       require_once __DIR__ . '/../views/products.php';

    }
}

?>