<?php

// Register Core
spl_autoload_register(function ($class) {

    if (file_exists(__DIR__ . '/Core/' . $class . '.php')) {

        require_once __DIR__ . '/Core/' . $class . '.php';
        
    }

});

// Register Helpers
spl_autoload_register(function ($class) {

    if (file_exists(__DIR__ . '/Helpers/' . $class . '.php')) {

        require_once __DIR__ . '/Helpers/' . $class . '.php';

    }

});
