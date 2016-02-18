<?php namespace Idesigning\QTicketsAPI\Services;

use GuzzleHttp;
use Idesigning\QTicketsAPI\Models\Settings;

class API
{

    public static function request(array $data)
    {

        $url = Settings::get('url', 'https://qtickets.ru/api');

        $data['token'] = Settings::get('token');

        $data_string = json_encode($data, JSON_UNESCAPED_UNICODE);

        $response = file_get_contents($url, null, stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'ignore_errors' => true,
                'header' =>
                    'Content-Type: application/json' . PHP_EOL .
                    'Content-Length: ' . strlen($data_string) . PHP_EOL,
                'content' => $data_string,
            ),
        )));

        $result = json_decode($response, true);

        return $result;
    }
}