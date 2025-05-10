<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default MQTT Connection
    |--------------------------------------------------------------------------
    |
    | This option defines the default MQTT connection that will be used when
    | we're connecting to an MQTT broker via the facade. The default is set
    | to 'default' which refers to the configuration below.
    |
    */

    'default_connection' => 'default',

    /*
    |--------------------------------------------------------------------------
    | MQTT Connections
    |--------------------------------------------------------------------------
    |
    | Here you can define all the connections used for MQTT communication.
    | All connections will be used by the MQTT facade provided by this package.
    |
    */

    'connections' => [
        'default' => [
            // Koneksi MQTT ke HiveMQ Cloud
            'host' => env('HIVEMQ_HOST'),
            'port' => env('HIVEMQ_PORT', 8883),
            'client_id' => env('HIVEMQ_CLIENT_ID', 'laravel_client_' . uniqid()),
            'clean_session' => env('HIVEMQ_CLEAN_SESSION', true),
            'keep_alive' => env('HIVEMQ_KEEP_ALIVE', 60),
            'username' => env('HIVEMQ_USERNAME'),
            'password' => env('HIVEMQ_PASSWORD'),
            'use_tls' => env('HIVEMQ_USE_TLS', true),
            'tls_verify_peer' => env('HIVEMQ_TLS_VERIFY_PEER', true),
            'tls_self_signed_allowed' => false,
            'last_will' => [
                // (Opsional) Pesan yang akan dipublikasikan jika koneksi terputus
                'enabled' => false,
                'topic' => 'laravel/status',
                'message' => 'offline',
                'quality_of_service' => 0,  // 0, 1, or 2
                'retain' => false,
            ],
            'connection_timeout' => 60,     // Batas waktu koneksi dalam detik
            'resend_timeout' => 10,         // Batas waktu pengiriman ulang dalam detik
            'debug' => env('HIVEMQ_DEBUG', false), // Aktifkan mode debug
        ],

        'local' => [
            // Contoh konfigurasi untuk Mosquitto atau broker MQTT lokal
            'host' => '127.0.0.1',
            'port' => 1883,             // Port standar MQTT non-secure
            'client_id' => 'laravel_local',
            'clean_session' => true,
            'keep_alive' => 60,
            'username' => null,         // Opsional
            'password' => null,         // Opsional
            'use_tls' => false,         // TLS tidak diaktifkan
            'debug' => false,
        ],

        // Anda dapat menambahkan lebih banyak koneksi di sini
    ],

    /*
    |--------------------------------------------------------------------------
    | MQTT Quality of Service Level
    |--------------------------------------------------------------------------
    |
    | Ini adalah pengaturan default untuk QoS (Quality of Service) MQTT.
    | Level-0: Pesan dikirim sekali tanpa konfirmasi (at most once)
    | Level-1: Pesan dikirim minimal satu kali dengan konfirmasi (at least once)
    | Level-2: Pesan dikirim tepat satu kali dengan konfirmasi (exactly once)
    |
    */

    'qos' => env('MQTT_QOS', 0),

    /*
    |--------------------------------------------------------------------------
    | MQTT Retain Flag
    |--------------------------------------------------------------------------
    |
    | Ini adalah pengaturan default untuk flag 'retain' MQTT.
    | Jika diatur ke true, broker akan menyimpan pesan terakhir
    | pada topik dan menyampaikannya ke client yang baru berlangganan.
    |
    */

    'retain' => env('MQTT_RETAIN', false),

    /*
    |--------------------------------------------------------------------------
    | MQTT Auto Reconnect
    |--------------------------------------------------------------------------
    |
    | Jika diatur ke true, client akan mencoba menghubungkan kembali
    | secara otomatis jika koneksi terputus.
    |
    */

    'auto_reconnect' => env('MQTT_AUTO_RECONNECT', true),

    /*
    |--------------------------------------------------------------------------
    | MQTT Auto Clean Session
    |--------------------------------------------------------------------------
    |
    | Jika diatur ke true, broker akan menghapus semua informasi
    | tentang client saat koneksi terputus. Jika false, broker akan
    | menyimpan informasi langganan dan pesan yang belum terkirim.
    |
    */

    'clean_session' => env('MQTT_CLEAN_SESSION', true),
];
