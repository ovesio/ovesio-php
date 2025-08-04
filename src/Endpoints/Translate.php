<?php
/**
 * Class Translate
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

namespace Ovesio\Endpoints;

use Ovesio\Core\HttpClient;

class Translate
{
    private $http;
    private $payload = [];

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function from(string $lang)
    {
        $this->payload['from'] = $lang;
        return $this;
    }

    public function deltaMode(bool $value = true)
    {
        $this->payload['delta_mode'] = $value;
        return $this;
    }

    public function workflow(int $id)
    {
        $this->payload['workflow'] = $id;
        return $this;
    }

    public function useExistingTranslation(bool $flag = true)
    {
        $this->payload['use_existing_translation'] = $flag;
        return $this;
    }

    public function to($languages)
    {
        $this->payload['to'] = is_array($languages) ? $languages : [$languages];
        return $this;
    }

    public function conditions(array $map)
    {
        $this->payload['conditions'] = $map;
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

    /**
     * Filter content by value
     *
     * @return $this
     */
    public function filterByValue()
    {
        if(isset($this->payload['data'])) {
            foreach($this->payload['data'] as $key => $entry) {
                $this->payload['data'][$key]['content'] = array_filter($entry['content'], function($item) {
                    return !empty($item['value']);
                });
            }
        }

        return $this;
    }

    public function request(): object
    {
        if (!isset($this->payload['from'])) {
            $this->payload['from'] = 'AUTO';
        }

        if (!isset($this->payload['data'])) {
            throw new \Exception('Missing data() for translate request');
        }

        return $this->http->post('translate/request', $this->payload);
    }

    public function status(int $id): object
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('Invalid request ID');
        }

        return $this->http->get("translate/status/{$id}");
    }
}
