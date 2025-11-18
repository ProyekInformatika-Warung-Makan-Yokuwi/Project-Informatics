<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Aliases untuk filter yang dapat digunakan
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        // ⚠️ jangan tambahkan 'cache' lagi di sini
    ];

    /**
     * Filter yang dijalankan secara global
     */
    public array $globals = [
        'before' => [
            //'csrf', // aktifkan jika perlu
        ],
        'after' => [
            'toolbar',
            //'cache', // pastikan baris ini dihapus
        ],
    ];

    /**
     * Filter berdasarkan method HTTP
     */
    public array $methods = [];

    /**
     * Filter berdasarkan URI tertentu
     */
    public array $filters = [];
}
