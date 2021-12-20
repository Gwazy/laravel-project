<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;


class FunnyQuote
{

    private $apiKey;


    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    //  https://docs.thedogapi.com/authentication
    public function getFunnyQuote()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token token=' . '"' . $this->apiKey . '"',
            ])->get('https://favqs.com/api/quotes/?filter=funny');

            return json_decode($response)->quotes[rand(0, 25)];
        } catch (Exception $e) {
            return $e;
        }
    }
}
