<?php

declare(strict_types=1);

namespace SpotifyWebAPI;

use PHPUnit\Framework\TestCase;

class SpotifyWebAPIExceptionTest extends TestCase
{
    public function testGetAndSetReason(): void
    {
        $exception = new SpotifyWebAPIException('Playback already paused');

        $this->assertSame('', $exception->getReason());

        $exception->setReason('ALREADY_PAUSED');

        $this->assertSame('ALREADY_PAUSED', $exception->getReason());
    }

    public function testHasExpiredToken(): void
    {
        $exception = new SpotifyWebAPIException(SpotifyWebAPIException::TOKEN_EXPIRED);

        $this->assertTrue($exception->hasExpiredToken());
    }

    public function testHasInvalidToken(): void
    {
        $exception = new SpotifyWebAPIException(SpotifyWebAPIException::TOKEN_INVALID);

        $this->assertTrue($exception->hasExpiredToken());
    }

    public function testIsQuotaExceeded(): void
    {
        $exception = new SpotifyWebAPIException();
        $exception->setReason(SpotifyWebAPIException::QUOTA_EXCEEDED);

        $this->assertTrue($exception->isQuotaExceeded());
    }

    public function testIsRateLimited(): void
    {
        $exception = new SpotifyWebAPIException('Too many requests', SpotifyWebAPIException::RATE_LIMIT_STATUS);

        $this->assertTrue($exception->isRateLimited());
    }

    public function testDoesNotIdentifyUnrelatedError(): void
    {
        $exception = new SpotifyWebAPIException('Unknown error', 500);

        $this->assertFalse($exception->hasExpiredToken());
        $this->assertFalse($exception->isQuotaExceeded());
        $this->assertFalse($exception->isRateLimited());
    }
}
