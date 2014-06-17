<?php
class Request
{
    const ACCOUNT_URL = 'https://accounts.spotify.com/';
    const API_URL = 'https://api.spotify.com/';

    public static function account($method, $uri, $parameters = array(), $headers = array())
    {
        $uri = trim($uri, '/');

        return self::send($method, self::ACCOUNT_URL . $uri, $parameters, $headers);
    }

    public static function api($method, $uri, $parameters = array(), $headers = array())
    {
        $uri = trim($uri, '/');

        return self::send($method, self::API_URL . $uri, $parameters, $headers);
    }

    public static function send($method, $url, $parameters = array(), $headers = array())
    {
        $parameters = http_build_query($parameters);
        $mergedHeaders = array();

        foreach ($headers as $key => $val) {
            $mergedHeaders[] = "$key: $val";
        }

        $options = array(
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => $mergedHeaders,
            CURLOPT_RETURNTRANSFER => true
        );

        if (strtoupper($method) == 'POST') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $parameters;
        } else {
            $url .= '/?' . $parameters;
        }

        $options[CURLOPT_URL] = $url;

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        curl_close($ch);

        list($headers, $body) = explode("\r\n\r\n", $response);

        return array(
            'body' => $body,
            'headers' => $headers
        );
    }
}
