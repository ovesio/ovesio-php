<?php
/**
 * Workflows & Languages API example
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Ovesio\OvesioAI;

$client = new OvesioAI('API_KEY');

try {
    $languages = $client->languages()->list();

    print_r($languages);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
