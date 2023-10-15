<?php

class CategoriesView {
    public function showCategories($categoriesjoin,$categories) {
        require_once 'templates/categories.phtml';
    }

    public function showCategories1($categoriesjoin,$categories,$categories1){
        require_once 'templates/categories.phtml';
    }

    public function showError() {
        require 'templates/error.phtml';
    }
}