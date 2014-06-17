<?php
class Session
{
    private $accessToken = '';
    private $clientID = '';
    private $clientSecret = '';
    private $expires = 0;
    private $redirectURI = '';
    private $refreshToken = '';

    public function __construct($options = array())
    {
        $defaults = array(
            'client_id' => '',
            'client_secret' => '',
            'redirect_uri' => ''
        );

        $options = array_merge($defaults, $options);
        extract($options, EXTR_SKIP);

        $this->setClientID($client_id);
        $this->setClientSecret($client_secret);
        $this->setRedirectURI($redirect_uri);
    }

    public function getAuthorizeURL($scope = '', $state = '')
    {
        if (is_array($scope)) {
            $scope = implode(' ', $scope);
        }

        $parameters = array(
            'client_id' => $this->getClientID(),
            'redirect_uri' => $this->getRedirectURI(),
            'response_type' => 'code',
            'scope' => $scope,
            'state' => $state
        );

        return Request::ACCOUNT_URL . 'authorize/?' . http_build_query($parameters);
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getClientID()
    {
        return $this->clientID;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getRedirectURI()
    {
        return $this->redirectURI;
    }

    public function refreshToken()
    {
        $payload = base64_encode($this->getClientID() . ':' . $this->getClientSecret());

        $parameters = array(
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->refreshToken
        );

        $headers = array(
            'Authorization' => 'Basic ' . $payload
        );

        $response = Request::account('POST', 'api/token', $parameters, $headers);
    }

    public function requestToken($code = '')
    {
        $parameters = array(
            'client_id' => $this->getClientID(),
            'client_secret' => $this->getClientSecret(),
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->getRedirectURI()
        );

        $response = Request::account('POST', 'api/token', $parameters);
        $response = json_decode($response['body']);

        if (isset($response->access_token)) {
            $this->accessToken = $response->access_token;
            $this->expires = $response->expires_in;
            $this->refreshToken = $response->refresh_token;
        }
    }

    public function setClientID($clientID)
    {
        $this->clientID = $clientID;
    }

    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    public function setRedirectURI($redirectURI)
    {
        $this->redirectURI = $redirectURI;
    }
}
