<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class RateLimiter extends BaseConfig
{
    public $throttles = [
        'login' => [
            'interval' => 3600,
            'limit' => 2,
            'suspended' => 3600,
        ],
    ];
    public $interval = 300;
    public $limit = 5;
    public $suspended = 3600;
    public $authGroup = 'login';
    public $enabled = true;
}