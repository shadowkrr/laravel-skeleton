<?php

return [

    'permission' => 0777,

    'rotate' => 30,

    'file' => [
        \Monolog\Logger::DEBUG     => 'laravel',
        \Monolog\Logger::INFO      => 'laravel',
        \Monolog\Logger::NOTICE    => 'laravel',
        \Monolog\Logger::WARNING   => 'warning',
        \Monolog\Logger::ERROR     => 'error',
        \Monolog\Logger::CRITICAL  => 'error',
        \Monolog\Logger::ALERT     => 'error',
        \Monolog\Logger::EMERGENCY => 'error',
    ],
];
