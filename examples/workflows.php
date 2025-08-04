<?php
/**
 * Workflows API example
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
    $workflows = $client->workflows()->list();

    print_r($workflows);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
