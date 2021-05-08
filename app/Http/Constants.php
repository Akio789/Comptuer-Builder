<?php

namespace App\Http;

class Constants
{
    const COMPONENT_TYPES = [
        'RAM' => 'RAM',
        'CPU' => 'CPU',
        'GPU' => 'GPU',
        'SSD' => 'SSD',
        'HDD' => 'HDD'
    ];

    const SOCKET_TYPES = [
        '1200' => '1200',
        '1155' => '1155'
    ];

    const RAM_TYPES = ['DDR3', 'DDR4'];
}
