<?php

class ProductsView {
    public function showProducts($products, $categories) {
        require_once './templates/productos.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function showProduct($product) {
        require_once './templates/producto.phtml';
    }
    public function showIndex($products) {
        require_once 'templates/index.phtml';
    }
}