<?php

declare(strict_types=1);

namespace SpotifyWebAPI;

use \phpmock\phpunit\PHPMock;
use \PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use \PHPUnit\Framework\TestCase;

#[RunTestsInSeparateProcesses]
class RequestTest extends TestCase
{
    use PHPMock;

    private function setupFunctionMock(string $function)
    {
        $mockFunction = $this->getFunctionMock(__NAMESPACE__, $function);

        return $mockFunction->expects($this->once());
    }

    public function testConstructorOptions()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response(load_fixture('album')));

        $request = new Request([
            'return_assoc' => true,
        ]);

        $response = $request->send('GET', 'https://www.example.com');

        $this->assertIsArray($response['body']);
    }

    public function testApi()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response(load_fixture('album')));

        $request = new Request();
        $response = $request->api('GET', '/v1/albums/7u6zL7kqpgLPISZYXNTgYk');

        $this->assertObjectHasProperty('id', $response['body']);
    }

    public function testApiParameters()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response(load_fixture('albums')));

        $request = new Request();
        $response = $request->api('GET', '/v1/albums', [
            'ids' => '1oR3KrPIp4CbagPa3PhtPp,6lPb7Eoon6QPbscWbMsk6a',
        ]);

        $this->assertObjectHasProperty('albums', $response['body']);
    }

    public function testApiMalformed()
    {
        $this->expectException(SpotifyWebAPIException::class);

        $request = new Request();
        $request->api('GET', '/v1/albums/NON_EXISTING_ALBUM');
    }

    public function testAccountMalformed()
    {
        $this->setupFunctionMock('curl_exec')->willReturnCallback(function () {
            $body = json_encode([
                'error_description' => 'Invalid client secret',
            ]);

            return create_http_response($body, 400);
        });
        $this->setupFunctionMock('curl_getinfo')->willReturn(400);

        $parameters = [
            'grant_type' => 'client_credentials'
        ];

        $headers = [
            'Authorization' => 'Basic ' . base64_encode('INVALID_ID:INVALID_SECRET'),
        ];

        try {
            $request = new Request();
            $request->account('POST', '/api/token', $parameters, $headers);
        } catch (SpotifyWebAPIAuthException $e) {
            $this->assertTrue($e->hasInvalidCredentials());
        } catch (\Exception) {
            $this->fail('No exception of type SpotifyWebAPIAuthException thrown');
        }
    }

    public function testExpiredToken()
    {
        $this->setupFunctionMock('curl_exec')->willReturnCallback(function () {
            $body = json_encode([
                'error_description' => 'The access token expired',
            ]);

            return create_http_response($body, 401);
        });
        $this->setupFunctionMock('curl_getinfo')->willReturn(401);

        $headers = [
            'Authorization' => 'Bearer expired_token',
        ];

        try {
            $request = new Request();
            $request->api('GET', '/v1/tracks/2TpxZ7JUBn3uw46aR7qd6V', [], $headers);
        } catch (SpotifyWebAPIAuthException $e) {
            $this->assertTrue($e->hasExpiredToken());
        } catch (\Exception) {
            $this->fail('No exception of type SpotifyWebAPIAuthException thrown');
        }
    }

    public function testInvalidRefreshToken()
    {
        $this->setupFunctionMock('curl_exec')->willReturnCallback(function () {
            $body = json_encode([
                'error_description' => 'Invalid refresh token',
            ]);

            return create_http_response($body, 400);
        });
        $this->setupFunctionMock('curl_getinfo')->willReturn(400);

        $parameters = [
            'grant_type' => 'refresh_token',
            'refresh_token' => 'invalid_refresh_token',
        ];

        $headers = [
            'Authorization' => 'Basic ' . base64_encode('VALID_ID:VALID_SECRET'),
        ];

        try {
            $request = new Request();
            $request->account('POST', '/api/token', $parameters, $headers);
        } catch (SpotifyWebAPIAuthException $e) {
            $this->assertTrue($e->hasInvalidRefreshToken());
        } catch (\Exception) {
            $this->fail('No exception of type SpotifyWebAPIAuthException thrown');
        }
    }

    public function testGetLastResponse()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));

        $request = new Request();
        $request->send('GET', 'https://www.example.com');

        $response = $request->getLastResponse();

        $this->assertNotEmpty($response['url']);
    }

    public function testSend()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));

        $request = new Request();
        $response = $request->send('GET', 'https://www.example.com');

        $this->assertNotEmpty($response['url']);
    }

    public function testSendDelete()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));
        $this->setupFunctionMock('curl_setopt_array')->willReturnCallback(
            function (\CurlHandle $ch, array $options) {
                $this->assertEquals('DELETE', $options[CURLOPT_CUSTOMREQUEST]);
                $this->assertEquals('foo=bar', $options[CURLOPT_POSTFIELDS]);
            }
        );

        $parameters = [
            'foo' => 'bar',
        ];

        $request = new Request();
        $request->send('DELETE', 'https://www.example.com', $parameters);
    }

    public function testSendPost()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));
        $this->setupFunctionMock('curl_setopt_array')->willReturnCallback(
            function (\CurlHandle $ch, array $options) {
                $this->assertEquals(true, $options[CURLOPT_POST]);
                $this->assertEquals('foo=bar', $options[CURLOPT_POSTFIELDS]);
            }
        );

        $parameters = [
            'foo' => 'bar',
        ];

        $request = new Request();
        $request->send('POST', 'https://www.example.com', $parameters);
    }

    public function testSendPut()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));
        $this->setupFunctionMock('curl_setopt_array')->willReturnCallback(
            function (\CurlHandle $ch, array $options) {
                $this->assertEquals('PUT', $options[CURLOPT_CUSTOMREQUEST]);
                $this->assertEquals('foo=bar', $options[CURLOPT_POSTFIELDS]);
            }
        );

        $parameters = [
            'foo' => 'bar',
        ];

        $request = new Request();
        $request->send('PUT', 'https://www.example.com', $parameters);
    }

    public function testSendGetParameters()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));
        $this->setupFunctionMock('curl_setopt_array')->willReturnCallback(
            function (\CurlHandle $ch, array $options) {
                $this->assertEquals('GET', $options[CURLOPT_CUSTOMREQUEST]);
                $this->assertEquals('https://www.example.com/?foo=bar', $options[CURLOPT_URL]);
            }
        );

        $parameters = [
            'foo' => 'bar',
        ];

        $request = new Request();
        $request->send('GET', 'https://www.example.com', $parameters);
    }

    public function testSendHeaders()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));

        $request = new Request();
        $response = $request->send('GET', 'https://www.example.com');

        $this->assertEquals('application/json', $response['headers']['content-type']);
    }

    public function testSendStatus()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('album'));
        $this->setupFunctionMock('curl_getinfo')->willReturn(200);

        $request = new Request();
        $response = $request->send('GET', 'https://www.example.com');

        $this->assertEquals(200, $response['status']);
    }

    public function testSendTransportError()
    {
        $this->expectExceptionObject(
            new SpotifyWebAPIException('cURL transport error: 6 Could not resolve host: non-existent')
        );

        $request = new Request();
        $request->send('GET', 'https://non-existent');
    }

    public function testSendErrorReason()
    {
        $this->setupFunctionMock('curl_exec')->willReturnCallback(function () {
            $body = json_encode([
                'error' => [
                    'message' => 'Playback already paused',
                    'status' => 400,
                    'reason' => 'ALREADY_PAUSED',
                ],
            ]);

            return create_http_response($body, 400);
        });
        $this->setupFunctionMock('curl_getinfo')->willReturn(400);

        try {
            $request = new Request();
            $request->api('PUT', '/me/player/play', [], []);
        } catch (SpotifyWebAPIException $e) {
            $this->assertEquals('ALREADY_PAUSED', $e->getReason());
        } catch (\Exception) {
            $this->fail('No exception of type SpotifyWebAPIException thrown');
        }
    }

    public function testSendUnknownError()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('', 400));
        $this->setupFunctionMock('curl_getinfo')->willReturn(400);

        $this->expectExceptionObject(
            new SpotifyWebAPIException('An unknown error occurred.', 400)
        );

        $request = new Request();
        $request->send('GET', 'https://www.example.com');
    }

    public function testSendUnknownErrorBodyFallback()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response('Foobar error', 400));
        $this->setupFunctionMock('curl_getinfo')->willReturn(400);

        $this->expectExceptionObject(
            new SpotifyWebAPIException('Foobar error', 400)
        );

        $request = new Request();
        $request->send('GET', 'https://www.example.com');
    }

    public function testSetOptions()
    {
        $this->setupFunctionMock('curl_exec')->willReturn(create_http_response(load_fixture('album')));

        $request = new Request();
        $returnedValue = $request->setOptions([
            'return_assoc' => true,
        ]);

        $response = $request->send('GET', 'https://www.example.com');

        $this->assertIsArray($response['body']);
        $this->assertSame($request, $returnedValue);
    }
}
