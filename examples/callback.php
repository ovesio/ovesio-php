<?php
/**
 * Callback Receiver Example
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.0.0
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
file_put_contents(__DIR__ . '/log-callback.txt', date('c') . "\n" . json_encode($data, JSON_PRETTY_PRINT) . "\n\n", FILE_APPEND);

$callback->success();
