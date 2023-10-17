<?php

class CategoriesView {
    public function showCategories($categories) {
        require_once 'templates/categories.phtml';
    }

    public function showError() {
        require 'templates/error.phtml';
    }
}