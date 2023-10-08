<?php

class UserView {
    public function showLogin() {
        require_once 'templates/login-register.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}