<?php

/**
 * Autoloader function for the project
 */
spl_autoload_register(static function ($className) {
    include __DIR__ . '/' . str_replace('\\', "/", $className) . '.php';
});