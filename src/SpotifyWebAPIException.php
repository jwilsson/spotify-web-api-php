<?php
namespace SpotifyWebAPI;

class SpotifyWebAPIException extends \Exception
{
    const TOKEN_EXPIRED = 'The access token expired';

    /**
     * The reason string from the request's error object.
     *
     * @var string
     */
    private $reason;

    /**
     * Returns the reason string from the request's error object.
     *
     * @see https://developer.spotify.com/documentation/web-api/reference/object-model/#player-error-reasons
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Returns whether the exception was thrown because of an expired access token.
     *
     * @return bool
     */
    public function hasExpiredToken()
    {
        return $this->getMessage() === self::TOKEN_EXPIRED;
    }

    /**
     * Set the reason string.
     *
     * @param string $reason
     *
     * @return void
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}
