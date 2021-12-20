<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class Dog
{

    private $apiKey;


    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getDogName()
    {
        $response = Http::get('https://api.thedogapi.com/v1/breeds?api_key=' . $this->apiKey);
        return json_decode($response)[rand(0, 25)]->name;
    }
}
