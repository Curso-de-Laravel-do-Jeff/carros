<?php

namespace App\Services;

class Cars extends CarsApi
{
    public function index()
    {
        try {
            return json_decode($this->put('cars'))->data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(string $id)
    {
        try {
            return json_decode($this->put('cars/show/' . $id))->data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(array $params)
    {
        try {
            return json_decode($this->post('cars/store', $params))->data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(array $params, string $id)
    {
        try {
            if (empty($params['value'])) {
                $params['value'] = '';
            }

            return json_decode($this->put('cars/update/' . $id, $params))->data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
