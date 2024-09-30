<?php
session_start([
    // 'cache_expire' => 180,
    // 'cache_limiter' => 'nocache',
    // 'cookie_domain' => '',
    'cookie_httponly' => true,
    'cookie_lifetime' => 1800,
    // 'cookie_path' => '/',
    // 'cookie_samesite' => 'Strict',
    // 'cookie_secure'   => true,
    // 'gc_divisor' => 100,
    // 'gc_maxlifetime' => 1440,
    // 'gc_probability' => true,
    // 'lazy_write' => true,
    'name' => 'SWD_Website',
    // 'read_and_close' => false,
    // 'referer_check' => '',
    // 'save_handler' => 'files',
    // 'save_path' => '',
    // 'serialize_handler' => 'php',
    // 'sid_bits_per_character' => 4,
    // 'sid_length' => 32,
    // 'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
    // 'trans_sid_tags' => 'a=href,area=href,frame=src,form=',
    // 'use_cookies' => true,
    // 'use_only_cookies' => true,
    // 'use_strict_mode' => false,
    // 'use_trans_sid' => false,
]);
session_regenerate_id();
if (!isset($_SESSION['Login'])) {
    header('Location: ../../index.php');
}
if (!isset($_SESSION['UserID'])) {
    header('Location: ../../index.php');
}
if (!isset($_SESSION['StatusID']) == 1) {
    header('Location: ../../index.php');
}
if (!isset($_SESSION['RoleID'])) {
    header('Location: ../../index.php');
}
if (!isset($_SESSION['Username'])) {
    header('Location: ../../index.php');
}
if (!isset($_SESSION['Email'])) {
    header('Location: ../../index.php');
}
