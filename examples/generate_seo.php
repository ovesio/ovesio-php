<?php
/**
 * Generate SEO API example
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.0.0
 * Required PHP: >= 7.1
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ovesio\OvesioAI;

$client = new OvesioAI('API_KEY');

//New request
try {
    $response = $client->generateSeo()
        ->workflow(3)
        ->to('en')
        ->callbackUrl('https://example.com/callback')
        ->data([
            'name' => 'Samsung 32" QLED Smart TV',
            'categories' => ['Electronics', 'Television'],
            'description' => 'Smart QLED 4K TV with vivid colors and modern design.',
            'additional' => [
                'Display Technology: QLED',
                'Resolution: 4K UHD',
                'Smart Features: Yes'
            ]
        ], 'tv-032-qled')
        ->request();

    print_r($response);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

//Fetch Status
try {
    $status = $client->generateSeo()->status(100); //id of the request

    print_r($status);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}