<?php

namespace Breeze\Doctrine;

use Doctrine\ODM\MongoDB\DocumentManager;
use Breeze\Doctrine\Connection\Mongo;

return [
    'service_manager' => [
        'factories' => [
            DocumentManager::class => Mongo::class,
        ],
    ],

    'doctrine' => [
        'server'  => 'mongo',
        'drivers' => [
            // Add drivers
        ]
    ]
];
