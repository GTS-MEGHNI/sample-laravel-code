<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TestService
{
    private array $api_response;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param array $payload
     * @return void
     */
    public function process(array $payload): void
    {
        $url = $payload['url'];
        $sample_url = "https://jsonplaceholder.typicode.com/todos?url=$url";
        $request = Http::get($sample_url);
        $this->api_response = json_decode($request, true);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->api_response;
    }

}
