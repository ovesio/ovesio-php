<?php
/**
 * Class Workflow
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

namespace Ovesio\Endpoints;

use Ovesio\Core\HttpClient;

class Workflows
{
    private $http;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function list(): object
    {
        return $this->http->get('workflows');
    }
}