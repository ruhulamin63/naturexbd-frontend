<?php


return [
    'store_id' => 'khaidaitoday',
    'signature_key' => '3cc65e1dd9fc945f99b2e117ead299f3',
    'sandbox' => true,
    'redirect_url' => [
        'success' => [
            'route' => 'payment.success'
        ],
        'cancel' => [
            'route' => 'payment.cancel'
        ]
    ]
];
