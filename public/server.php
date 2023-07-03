<?php

if (
    php_sapi_name() === 'cli-server'
    && $_SERVER["REQUEST_URI"] !== '/'
    && file_exists(__DIR__ . '/../' . $_SERVER["REQUEST_URI"])
) {
    return false;
}

require __DIR__ . '/index.php';
