<?php
ini_set('zend.ze1_compatibility_mode' , 'off');
putenv("Asia/Saigon");
date_default_timezone_set('Asia/Bangkok'); //Config Time Server
define('TIME_NOW' , time());
define('BASE_URL', (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https://' : 'http://'). $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) );
define('ENCRYPTION_KEY', 'AQ17LRZXF6L4MJK90C8NCPY798TC');
// Cấu hình CSDL
define('DB_MASTER_SERVER' , 'localhost');
define('DB_MASTER_USER' , 'root');
define('DB_MASTER_PASSWORD' , 'cuong@');
define('DB_MASTER_NAME' , 'shop_minhminh');