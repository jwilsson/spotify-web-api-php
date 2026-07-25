<?php

declare(strict_types=1);

namespace SpotifyWebAPI;

use PHPUnit\Framework\TestCase;

class SpotifyWebAPIAuthExceptionTest extends TestCase
{
    public function testHasInvalidCredentialsForInvalidClient(): void
    {
        $exception = new SpotifyWebAPIAuthException(SpotifyWebAPIAuthException::INVALID_CLIENT);

        $this->assertTrue($exception->hasInvalidCredentials());
    }

    public function testHasInvalidCredentialsForInvalidClientSecret(): void
    {
        $exception = new SpotifyWebAPIAuthException(SpotifyWebAPIAuthException::INVALID_CLIENT_SECRET);

        $this->assertTrue($exception->hasInvalidCredentials());
    }

    public function testHasInvalidRefreshToken(): void
    {
        $exception = new SpotifyWebAPIAuthException(SpotifyWebAPIAuthException::INVALID_REFRESH_TOKEN);

        $this->assertTrue($exception->hasInvalidRefreshToken());
    }

    public function testDoesNotIdentifyUnknownAuthError(): void
    {
        $exception = new SpotifyWebAPIAuthException('Unknown authentication error');

        $this->assertFalse($exception->hasInvalidCredentials());
        $this->assertFalse($exception->hasInvalidRefreshToken());
    }
}
