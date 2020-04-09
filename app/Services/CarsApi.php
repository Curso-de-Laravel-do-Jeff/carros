<?php

namespace App\Services;

use GuzzleHttp\Client;

class CarsApi
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function connect(string $email, string $password)
    {
        $url = env('CARROS_API_HOST');

        $token = $this->client->request('POST', $url . 'login', [
            'form_params' => [
                'email' => $email,
                'password' => $password
            ]
        ])->getBody()->getContents();

        $token = json_decode($token);

        return 'Bearer ' . $token->token;
    }

    protected function get(string $url, array $params = [], array $headers = [])
    {
        return $this->makeRequest('GET', $url, $params, $headers);
    }

    protected function post(string $url, array $params = [], array $headers = [])
    {
        return $this->makeRequest('POST', $url, $params, $headers);
    }

    protected function put(string $url, array $params = [], array $headers = [])
    {
        return $this->makeRequest('PUT', $url, $params, $headers);
    }

    protected function delete(string $url, array $params = [], array $headers = [])
    {
        return $this->makeRequest('DELETE', $url, $params, $headers);
    }

    private function makeRequest(string $httpMethod, string $url, array $params, array $headers = [])
    {
        $headers['Authorization'] = session('api-token');

        return $this->client->request($httpMethod, env('CARROS_API_HOST') . $url, [
            'headers' => $headers,
            ($httpMethod == strtolower('get')?'query':'form_params') => $params,
        ])->getBody()->getContents();
    }
}
