<?php

return [
    'equipment_status' => [
        'active' => [
            'text' => 'Aktiv',
            'class' => 'success'
        ],
        'deactive' => [
            'text' => 'Deaktiv',
            'class' => 'danger'
        ],
        'maintenance' => [
            'text' => 'Təmirdə',
            'class' => 'warning'
        ],
    ],

    'ped_category_status' => [
        'active' => [
            'text' => 'Aktiv',
            'class' => 'success'
        ],
        'inactive' => [
            'text' => 'Deaktiv',
            'class' => 'danger'
        ]
    ],

    'user_system_status' => [
        'verified' => [
            'text' => 'Təsdiqlənmiş',
            'class' => 'success'
        ],
        'unverified' => [
            'text' => 'Təsdiqlənməmiş',
            'class' => 'warning'
        ],
        'deactivated' => [
            'text' => 'Hesab dondurulub',
            'class' => 'info'
        ],
        'banned' => [
            'text' => 'Ban edilib',
            'class' => 'danger'
        ]

    ],

    'order_payment_method' => [
        'balance' => [
            'text' => 'Balans ödənişi',
            'class' => 'primary',
            'icon' => 'bi bi-wallet-fill',
        ],
        'card' => [
            'text' => 'Kart vasitəsi ilə',
            'class' => 'success',
            'icon' => 'bi bi-creadit-card',
        ]
    ],

    'order_payment_status' => [
        'pending' => [
            'text' => 'Gözləyir...',
            'class' => 'info',
        ],
        'processing' => [
            'text' => 'Proses davam edir',
            'class' => 'warning',
        ],
        'completed' => [
            'text' => 'Tamamlandı',
            'class' => 'success',
        ],
        'error' => [
            'text' => 'Xəta baş verdi',
            'class' => 'danger',
        ]
    ],


    'barcode_status' => [
        'used' => [
            'text' => 'İstifadə edilib',
            'class' => 'success',
            'icon' => 'bi bi-chevron-down',
        ],
        'not_used' => [
            'text' => 'İstifadə edilməyib',
            'class' => 'danger',
            'icon' => 'bi bi-slash-square',
        ]
    ],
];
