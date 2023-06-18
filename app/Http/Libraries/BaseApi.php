<?php

namespace App\Http\Libraries;
use Illuminate\Support\Facades\Http;

//disini kita mengimplementasikan OOP.
//agar deklarasi fungsi API menggunakan sumber(class) yang sama disetiap controller

class BaseApi
{
    protected $baseUrl;
    public function __construct()
	{
        $this->baseUrl = 'http://127.0.0.1:8000';
    }

    private function client()
    {
        return Http::baseUrl($this->baseUrl);
    }

    public function index(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function store(String $endpoint, Array $data)
    {
        return $this->client()->post($endpoint, $data);
    }

    public function show(String $endpoint, Array $data)
    {
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data)
    {
        return $this->client()->patch($endpoint, $data);
    }

    public function delete(String $endpoint)
    {
        return $this->client()->delete($endpoint);
    }

    public function onlyTrashed(String $endpoint)
    {
        return $this->client()->get($endpoint);
    }

    public function restore(String $endpoint)
    {
        return $this->client()->get($endpoint);
    }

    public function forceDelete(String $endpoint)
    {
        return $this->client()->post($endpoint);
    }
}
