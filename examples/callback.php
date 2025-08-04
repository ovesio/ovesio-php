<?php
/**
 * Callback Receiver Example
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ovesio\Callback\CallbackHandler;

$callback = new CallbackHandler();
$data = $callback->handle();

if (!$data) {
    $callback->fail('Invalid or missing JSON payload');
    exit;
}

// Process received data (save to database, log, queue etc.)
//.........

$callback->success();
