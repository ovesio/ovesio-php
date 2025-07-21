<?php
/**
 * Generate Description API example
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
    $response = $client->generateDescription()
        ->workflow(2)
        ->to('en')
        ->callbackUrl('https://example.com/callback')
        ->data([
            'name' => 'HP MT43 Laptop',
            'categories' => ['Laptops', 'Second Hand'],
            'description' => 'Used business laptop with AMD processor.',
            'additional' => [
                'CPU: AMD Pro A8',
                'RAM: 8GB',
                'SSD: 256GB'
            ]
        ], 'ref-987')
        ->request();

    print_r($response);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

//Fetch Status
try {
    $status = $client->generateDescription()->status(100); //id of the request

    print_r($status);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}