<?php

class ProductsView {
    public function showProducts($products, $categories) {


    
        require_once './templates/productos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}