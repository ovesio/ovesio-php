<?php
/**
 * Class GenerateSeo
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.0.0
 * Required PHP: >= 7.1
 */

namespace Ovesio\Endpoints;

use Ovesio\Core\HttpClient;

class GenerateSeo
{
    private $http;
    private $payload = [];

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function workflow(int $id)
    {
        $this->payload['workflow'] = $id;
        return $this;
    }

    public function to(string $lang)
    {
        $this->payload['to'] = $lang;
        return $this;
    }

    public function callbackUrl(string $url)
    {
        $this->payload['callback_url'] = $url;
        return $this;
    }

    public function data(array $content, string $ref = null)
    {
        $entry = ['content' => $content];
        if ($ref) {
            $entry['ref'] = $ref;
        }

        $this->payload['data'][] = $entry;
        return $this;
    }

    public function request(): object
    {
        if (!isset($this->payload['data'])) {
            throw new \Exception('Missing data() for generate-seo request');
        }

        return $this->http->post('ai/generate-seo', $this->payload);
    }

    public function status(int $id): object
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Invalid request ID');
        }

        return $this->http->get("ai/generate-seo/status/{$id}");
    }
}