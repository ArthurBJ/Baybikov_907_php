<?php
spl_autoload_register();

include "vendor/autoload.php";

use logger\Logger;

$logger = new Logger('index.txt');
$context = array();

$logger->info("Info message", $context);
$logger->alert("Alert message", $context);