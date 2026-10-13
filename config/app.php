<?php
/**
 * Application Configuration
 */
return [
    'name'        => 'RuangUlas',
    // IP Wi-Fi komputer ini. Gunakan alamat ini saat diakses dari HP pada Wi-Fi yang sama.
    'url'         => 'http://192.168.1.16/apliaksi_qr-main/public',
    'debug'       => true,
    'timezone'    => 'Asia/Jakarta',
    'session_name'=> 'barcode_review_session',
    'upload_path' => __DIR__ . '/../public/uploads/',
    'qr_size'     => 300,
];
