<?php
use \SpotifyWebAPI;

class RequestTest extends PHPUnit_Framework_TestCase
{
    public function testApi()
    {
        $response = SpotifyWebAPI\Request::api('GET', '/v1/albums/7u6zL7kqpgLPISZYXNTgYk');

        $this->assertObjectHasAttribute('id', $response['body']);
    }

    public function testApiParameters()
    {
        $response = SpotifyWebAPI\Request::api('GET', '/v1/albums', array(
            'ids' => '1oR3KrPIp4CbagPa3PhtPp,6lPb7Eoon6QPbscWbMsk6a'
        ));

        $this->assertObjectHasAttribute('id', $response['body']->albums[0]);
        $this->assertObjectHasAttribute('id', $response['body']->albums[1]);
    }

    public function testSend()
    {
        $response = SpotifyWebAPI\Request::send('GET', 'https://api.spotify.com/v1/albums/7u6zL7kqpgLPISZYXNTgYk');

        $this->assertObjectHasAttribute('id', $response['body']);
    }

    public function testSendParameters()
    {
        $response = SpotifyWebAPI\Request::send('GET', 'https://api.spotify.com/v1/albums', array(
            'ids' => '1oR3KrPIp4CbagPa3PhtPp,6lPb7Eoon6QPbscWbMsk6a'
        ));

        $this->assertObjectHasAttribute('id', $response['body']->albums[0]);
        $this->assertObjectHasAttribute('id', $response['body']->albums[1]);
    }

    public function testSendHeaders()
    {
        $response = SpotifyWebAPI\Request::send('GET', 'https://api.spotify.com/v1/albums/7u6zL7kqpgLPISZYXNTgYk');

        $this->assertInternalType('string', $response['headers']);
    }

    public function testSendStatus()
    {
        $response = SpotifyWebAPI\Request::send('GET', 'https://api.spotify.com/v1/albums/7u6zL7kqpgLPISZYXNTgYk');

        $this->assertEquals(200, $response['status']);
    }
}
