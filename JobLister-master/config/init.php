<?php
// Start session
session_start();

// Config file
require_once 'config.php';

// Include helper file
require_once 'helpers/system_helper.php';

// Autoloader
spl_autoload_register(function ($class_name) {
    require_once 'lib/' .$class_name. '.php';
});
