<?php

return [
    [
        'id' => env('STRIPE_SOLO_PRODUCT_ID'),
        'name' => 'Solo',
        'description' => 'Affordable option for solo bloggers and site owners.',
        'prices' => [
            [
                'id' => env('STRIPE_SOLO_PRICE_ID'),
                'period' => 'month',
                'amount' => '$10'
            ]
        ],
        'maximum_sites' => 1,
        'highlighted' => false
    ],
    [
        'id' => env('STRIPE_PRO_PRODUCT_ID'),
        'name' => 'Pro',
        'description' => 'For small businesses and bloggers who manage multiple sites.',
        'prices' => [
            [
                'id' => env('STRIPE_PRO_PRICE_ID'),
                'period' => 'month',
                'amount' => '$20'
            ]
        ],
        'maximum_sites' => 6,
        'highlighted' => true
    ],
    [
        'id' => env('STRIPE_AGENCY_PRODUCT_ID'),
        'name' => 'Agency',
        'description' => 'For agencies, enterprises and freelancers who manage multiple client sites.',
        'prices' => [
            [
                'id' => env('STRIPE_AGENCY_PRICE_ID'),
                'period' => 'month',
                'amount' => '$50'
            ]
        ],
        'maximum_sites' => 20,
        'highlighted' => false
    ]
];
