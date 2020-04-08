<?php

$dir = ['/Core/', '/Wrapper/', '/Helpers/', '/License/'];
foreach($dir as $d) {
    spl_autoload_register(function ($class) use ($d) {
    
        if (file_exists(__DIR__ . $d . $class . '.php')) {
    
            require_once __DIR__ . $d . $class . '.php';
            
        }
    
    });
}
