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
        'LGA2066',
        'LGA2011-v3' => 'LGA2011-v3',
        'LGA2011' => 'LGA2011',
        'LGA1200' => 'LGA1200',
        'LGA1151' => 'LGA1151',
        'LGA1150' => 'LGA1150',
        'LGA1156' => 'LGA1156',
        'AM4' => 'AM4',
        'AM3+' => 'AM3+',
        'AM3' => 'AM3',
        'AM2+' => 'AM2+',
        'AM2' => 'AM2',
        'FM2' => 'FM2',
        'FM1' => 'FM1'
    ];

    const SOCKETS = [
        'ram' => ['DDR3', 'DDR4'],
        'cpu' => [
            'LGA2066',
            'LGA2011-v3',
            'LGA2011',
            'LGA1200',
            'LGA1151',
            'LGA1150',
            'LGA1156',
            'AM4',
            'AM3+',
            'AM3',
            'AM2+',
            'AM2',
            'FM2',
            'FM1'
        ],
        'hdd' => ['PATA', 'SATA']
    ];

    const CAPACITY_PLACEHOLDERS = [
        'ram' => [
            'type' => 'number',
            'placeholder' => '8 GB'
        ]
    ];
}
