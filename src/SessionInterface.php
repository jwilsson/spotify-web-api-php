<?php

namespace SpotifyWebAPI;

interface SessionInterface
{
    /**
     * Generate a code challenge from a code verifier for use with the PKCE flow.
     *
     * @param string $codeVerifier The code verifier to create a challenge from.
     * @param string $hashAlgo Optional. The hash algorithm to use. Defaults to "sha256".
     *
     * @return string The code challenge.
     */
    public function generateCodeChallenge($codeVerifier, $hashAlgo = 'sha256');

    /**
     * Generate a code verifier for use with the PKCE flow.
     *
     * @param int $length Optional. Code verifier length. Must be between 43 and 128 characters long, default is 128.
     *
     * @return string A code verifier string.
     */
    public function generateCodeVerifier($length = 128);

    /**
     * Generate a random state value.
     *
     * @param int $length Optional. Length of the state. Default is 16 characters.
     *
     * @return string A random state value.
     */
    public function generateState($length = 16);

    /**
     * Get the authorization URL.
     *
     * @param array|object $options Optional. Options for the authorization URL.
     * - string code_challenge Optional. A PKCE code challenge.
     * - array scope Optional. Scope(s) to request from the user.
     * - boolean show_dialog Optional. Whether or not to force the user to always approve the app. Default is false.
     * - string state Optional. A CSRF token.
     *
     * @return string The authorization URL.
     */
    public function getAuthorizeUrl($options = []);

    /**
     * Get the access token.
     *
     * @return string The access token.
     */
    public function getAccessToken();

    /**
     * Get the client ID.
     *
     * @return string The client ID.
     */
    public function getClientId();

    /**
     * Get the client secret.
     *
     * @return string The client secret.
     */
    public function getClientSecret();

    /**
     * Get the access token expiration time.
     *
     * @return int A Unix timestamp indicating the token expiration time.
     */
    public function getTokenExpiration();

    /**
     * Get the client's redirect URI.
     *
     * @return string The redirect URI.
     */
    public function getRedirectUri();

    /**
     * Get the refresh token.
     *
     * @return string The refresh token.
     */
    public function getRefreshToken();

    /**
     * Get the scope for the current access token
     *
     * @return array The scope for the current access token
     */
    public function getScope();

    /**
     * Refresh an access token.
     *
     * @param string $refreshToken Optional. The refresh token to use.
     *
     * @return bool Whether the access token was successfully refreshed.
     */
    public function refreshAccessToken($refreshToken = '');

    /**
     * Request an access token given an authorization code.
     *
     * @param string $authorizationCode The authorization code from Spotify.
     * @param string $codeVerifier Optional. A previously generated code verifier. Will assume a PKCE flow if passed.
     *
     * @return bool True when the access token was successfully granted, false otherwise.
     */
    public function requestAccessToken($authorizationCode, $codeVerifier = '');

    /**
     * Request an access token using the Client Credentials Flow.
     *
     * @return bool True when an access token was successfully granted, false otherwise.
     */
    public function requestCredentialsToken();

    /**
     * Set the access token.
     *
     * @param string $accessToken The access token
     *
     * @return void
     */
    public function setAccessToken($accessToken);

    /**
     * Set the client ID.
     *
     * @param string $clientId The client ID.
     *
     * @return void
     */
    public function setClientId($clientId);

    /**
     * Set the client secret.
     *
     * @param string $clientSecret The client secret.
     *
     * @return void
     */
    public function setClientSecret($clientSecret);

    /**
     * Set the client's redirect URI.
     *
     * @param string $redirectUri The redirect URI.
     *
     * @return void
     */
    public function setRedirectUri($redirectUri);

    /**
     * Set the session's refresh token.
     *
     * @param string $refreshToken The refresh token.
     *
     * @return void
     */
    public function setRefreshToken($refreshToken);
}