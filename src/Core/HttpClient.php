<?php
/**
 * Class HttpClient
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

namespace Ovesio\Core;

use Exception;

class HttpClient
{
    private $apiKey;
    private $baseUrl;
    private $connectionTimeout = 5;
    private $requestTimeout = 30;

    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/') . '/';
    }

    public function get(string $endpoint): object
    {
        return $this->request('GET', $endpoint);
    }

    public function post(string $endpoint, array $payload): object
    {
        return $this->request('POST', $endpoint, $payload);
    }

    private function request(string $method, string $endpoint, array $payload = []): object
    {
        $url = $this->baseUrl . ltrim($endpoint, '/');
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $this->requestTimeout,
            CURLOPT_CONNECTTIMEOUT => $this->connectionTimeout,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Api-Key: ' . $this->apiKey
            ]
        ]);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $json = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON response from Ovesio API');
        }

        if ($httpCode != 200 && $httpCode <> 400) {
            throw new Exception('API Error: HTTP ' . $httpCode . ' — ' . json_encode($json));
        }

        return $json;
    }
}
