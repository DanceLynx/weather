<?php

namespace DanceLynx\Weather;
use DanceLynx\Weather\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client;

class Weather
{
    protected $key = null;
    protected $guzzleOptions = [];

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getGuzzleClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleClientOptions($options)
    {
        $this->guzzleOptions = $options;
    }

    public function getWeather($city, $type = 'base', $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        if (!in_array(strtolower($format), ['json', 'xml'])) {
            throw new InvalidArgumentException('Invalid response format: ' . $format);
        }
        if (!in_array(strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException("Invalid type value(base/all): ". $type);
        }
        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $type,
        ]);
        $response = $this->getGuzzleClient()->get($url, [
            'query' => $query
        ])->getBody()->getContents();

        return 'json' === $format ? \json_decode($response, true) : $response;
    }
}
