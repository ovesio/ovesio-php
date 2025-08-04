<?php
/**
 * Class OvesioAI
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

namespace Ovesio;

use Ovesio\Core\HttpClient;
use Ovesio\Endpoints\Translate;
use Ovesio\Endpoints\GenerateDescription;
use Ovesio\Endpoints\GenerateSeo;
use Ovesio\Endpoints\Workflows;
use Ovesio\Endpoints\Languages;
use Ovesio\Callback\CallbackHandler;

class OvesioAI
{
    protected $httpClient;

    public function __construct(string $apiKey, string $baseUrl = 'https://api.ovesio.com/v1/')
    {
        $this->httpClient = new HttpClient($apiKey, $baseUrl);
    }

    public function translate(): Translate
    {
        return new Translate($this->httpClient);
    }

    public function generateDescription(): GenerateDescription
    {
        return new GenerateDescription($this->httpClient);
    }

    public function generateSeo(): GenerateSeo
    {
        return new GenerateSeo($this->httpClient);
    }

    public function workflows(): Workflows
    {
        return new Workflows($this->httpClient);
    }

    public function languages(): Languages
    {
        return new Languages($this->httpClient);
    }

    public function callback(): CallbackHandler
    {
        return new CallbackHandler();
    }
}
