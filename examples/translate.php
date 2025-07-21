<?php
/**
 * Translate API example
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.0.0
 * Required PHP: >= 7.1
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ovesio\OvesioAI;

$client = new OvesioAI('API_KEY');

//New Request
try {
    $response = $client->translate()
        ->from('en')
        ->to(['fr', 'de'])
        ->workflow(1)
        ->callbackUrl('https://example.com/callback')
        ->data([
            'key' => 'name',
            'value' => 'Test product',
            'context' => 'Electronics'
        ], 'prod-001')
        ->request();

    print_r($response);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

//Fetch Status
try {
    $status = $client->translate()->status(100); //id of the request

    print_r($status);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}