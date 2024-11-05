<?php

function Encryptor($Action, $String)
{
    $Output         = false;
    $EncryptMethod  = "AES-256-CBC";

    $SecretKey      = 'Dinamika Utama Saka';
    $SecretIV       = 'shedswebdeveloper@gmail.com';

    $Key            = hash('sha256', $SecretKey);

    $IV             = substr(hash('sha256', $SecretIV), 0, 16);

    if ($Action == 'encrypt') {
        $Output = openssl_encrypt($String, $EncryptMethod, $Key, 0, $IV);
        $Output = base64_encode($Output);
    } elseif ($Action == 'decrypt') {
        $Output = openssl_decrypt(base64_decode($String), $EncryptMethod, $Key, 0, $IV);
    }

    return $Output;
}
