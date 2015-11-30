<?php

use Idesigning\QTicketsAPI\Models\Settings;

Route::any('qtickets', function () {

    $url = Settings::get('url', 'http://qtickets.ru/api');

    $headers[] = 'Content-Type: ' . Request::server('HTTP_CONTENT_TYPE', 'application/x-www-form-urlencoded');

    if (Request::server('HTTP_CONTENT_LENGTH')) {
        $headers[] = 'Content-Length: ' . Request::server('HTTP_CONTENT_LENGTH');
    }

    $response = file_get_contents(rtrim($url, '/') . '/pay' . '?' . http_build_query(get()), null, stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => join(PHP_EOL, $headers),
            'content' => file_get_contents('php://input'),
            'ignore_errors' => true
        ),
    )));

    $data = json_decode($response);

    if (isset($data->status) && $data->status == 200) {
        return response($data->content, $data->status, $data->headers);
    }

    return response($response, 500);
});