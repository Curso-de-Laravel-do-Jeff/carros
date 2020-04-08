<?php

namespace App\Services;

use GuzzleHttp\Client;

class CarsApi
{
    private $client;

    public function connect(string $email, string $password)
    {
        $url = env('CARROS_API_HOST');

        $this->client = new Client();

        $token = $this->client->request('POST', $url . 'login', [
            'form_params' => [
                'email' => $email,
                'password' => $password
            ]
        ])->getBody()->getContents();

        $token = json_decode($token);

        return 'Bearer ' . $token->token;
    }

    public function get(string $url, array $params, array $headers = [])
    {
        $params = [
            'query' => $params
        ];

        $this->makeRequest('GET', $url, $params, $headers);
    }

    public function post(string $url, array $params, array $headers = [])
    {
        $params = [
            'form_params' => $params
        ];

        $this->makeRequest('POST', $url, $params, $headers);
    }

    public function put(string $url, array $params, array $headers = [])
    {
        $params = [
            'form_params' => $params
        ];

        $this->makeRequest('PUT', $url, $params, $headers);
    }

    public function delete(string $url, array $params, array $headers = [])
    {
        $params = [
            'form_params' => $params
        ];

        $this->makeRequest('DELETE', $url, $params, $headers);
    }

    private function makeRequest(string $httpMethod, string $url, array $params, array $headers = [])
    {
        return $this->client->request($httpMethod, $url, [
            'headers' => $headers,
            $params
        ])->getBody()->getContents();
    }
}
