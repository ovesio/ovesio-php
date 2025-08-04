<?php
/**
 * Class CallbackHandler
 *
 * Author: AWeb Design SRL
 * Website: https://ovesio.com
 * Version: 1.1.3
 * Required PHP: >= 7.1
 */

namespace Ovesio\Callback;

class CallbackHandler
{
    /**
     * Parse and validate callback payload from Ovesio
     *
     * @return object|null Returns the payload object if valid, null otherwise
     */
    public function handle(): ?object
    {
        $input = file_get_contents('php://input');

        if (!$input) {
            return null;
        }

        $data = json_decode($input);

        if (json_last_error() !== JSON_ERROR_NONE || !is_object($data)) {
            return null;
        }

        return $data;
    }

    /**
     * Send a success response to Ovesio
     *
     * @return void
     */
    public function success(): void
    {
        http_response_code(200);
        echo json_encode(['success' => true]);
    }

    /**
     * Send an error response to Ovesio
     *
     * @param string $message Custom error message
     * @param int $code HTTP status code (default 400)
     * @return void
     */
    public function fail(string $message = 'Unknown error', int $code = 400): void
    {
        http_response_code($code);
        echo json_encode(['success' => false, 'error' => $message]);
    }
}