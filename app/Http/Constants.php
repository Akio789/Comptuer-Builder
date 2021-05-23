<?php

namespace App\Http;

class Constants
{
    const COMPONENT_TYPES = [
        'RAM' => 'RAM',
        'CPU' => 'CPU',
        'GPU' => 'GPU',
        'SSD' => 'SSD',
        'HDD' => 'HDD',
        'COOLER' => 'COOLER',
        'CABINET' => 'CABINET',
        'POWER_SUPPLY' => 'POWER_SUPPLY',
    ];

    const MOTHERBOARD_SIZES = [
        'Mini itx',
        'micro-atx',
        'atx',
        'e-atx'
    ];

    const SOCKET_TYPES = [
        'LGA2066' => 'LGA2066',
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
            'LGA1155',
            'AM4',
            'AM3+',
            'AM3',
            'AM2+',
            'AM2',
            'FM2',
            'FM1'
        ],
        'cooler' => [
            'LGA2066',
            'LGA2011-v3',
            'LGA2011',
            'LGA1200',
            'LGA1151',
            'LGA1150',
            'LGA1156',
            'LGA1155',
            'AM4',
            'AM3+',
            'AM3',
            'AM2+',
            'AM2',
            'FM2',
            'FM1'
        ],
        'ssd' => ['b-key', 'M2'],
        'hdd' => ['SATA 3'],
        'gpu' => [
            'PCIex1',
            'PCIex4',
            'PCIex8',
            'PCIex16',
            'PCI'
        ],
        'cabinet' => [
            'Mini itx',
            'micro-atx',
            'atx',
            'e-atx'
        ],
        'power_supply' => [
            'ATX',
            'SFX'
        ]
    ];
}
