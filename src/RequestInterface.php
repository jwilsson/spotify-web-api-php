<?php

namespace SpotifyWebAPI;

interface RequestInterface
{
    /**
     * Make a request to the "account" endpoint.
     *
     * @param string $method The HTTP method to use.
     * @param string $uri The URI to request.
     * @param array $parameters Optional. Query string parameters or HTTP body, depending on $method.
     * @param array $headers Optional. HTTP headers.
     *
     * @return array Response data.
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     * @throws SpotifyWebAPIAuthException
     *
     * @throws SpotifyWebAPIException
     */
    public function account($method, $uri, $parameters = [], $headers = []);

    /**
     * Make a request to the "api" endpoint.
     *
     * @param string $method The HTTP method to use.
     * @param string $uri The URI to request.
     * @param array $parameters Optional. Query string parameters or HTTP body, depending on $method.
     * @param array $headers Optional. HTTP headers.
     *
     * @return array Response data.
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     * @throws SpotifyWebAPIAuthException
     *
     * @throws SpotifyWebAPIException
     */
    public function api($method, $uri, $parameters = [], $headers = []);

    /**
     * Get the latest full response from the Spotify API.
     *
     * @return array Response data.
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function getLastResponse();

    /**
     * Make a request to Spotify.
     * You'll probably want to use one of the convenience methods instead.
     *
     * @param string $method The HTTP method to use.
     * @param string $url The URL to request.
     * @param array $parameters Optional. Query string parameters or HTTP body, depending on $method.
     * @param array $headers Optional. HTTP headers.
     *
     * @return array Response data.
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     * @throws SpotifyWebAPIAuthException
     *
     * @throws SpotifyWebAPIException
     */
    public function send($method, $url, $parameters = [], $headers = []);

    /**
     * Set options
     *
     * @param array|object $options Options to set.
     *
     * @return void
     */
    public function setOptions($options);
}