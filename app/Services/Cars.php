<?php

namespace App\Services;

class Cars extends CarsApi
{
    public function index()
    {
        try {
            return json_decode($this->put('cars'))->data;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function show(string $id)
    {
        try {
            return json_decode($this->put('cars/show/' . $id))->data;
        } catch (\Exception $e) {
            return [];
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
}
