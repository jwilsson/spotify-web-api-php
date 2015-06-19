---
layout: default
title: Method Reference - Session
---


### __construct

    void SpotifyWebAPI\Session::__construct(string $clientId, string $clientSecret, string $redirectUri, \SpotifyWebAPI\Request $request)

Constructor<br>
Set up client credentials.

#### Arguments
* `$clientId` **string** - The client ID.
* `$clientSecret` **string** - The client secret.
* `$redirectUri` **string** - Optional. The redirect URI.
* `$request` **\SpotifyWebAPI\Request** - Optional. The Request object to use.


#### Return values
* **void** 



### getAuthorizeUrl

    string SpotifyWebAPI\Session::getAuthorizeUrl(array|object $options)

Get the authorization URL.

#### Arguments
* `$options` **array\|object** - Optional. Options for the authorization URL.
    * array scope Optional. Scope(s) to request from the user.
    * boolean show_dialog Optional. Whether or not to force the user to always approve the app. Default is false.
    * string state Optional. A CSRF token.



#### Return values
* **string** The authorization URL.



### getAccessToken

    string SpotifyWebAPI\Session::getAccessToken()

Get the access token.


#### Return values
* **string** The access token.



### getClientId

    string SpotifyWebAPI\Session::getClientId()

Get the client ID.


#### Return values
* **string** The client ID.



### getClientSecret

    string SpotifyWebAPI\Session::getClientSecret()

Get the client secret.


#### Return values
* **string** The client secret.



### getExpires

    integer SpotifyWebAPI\Session::getExpires()

Get the number of seconds for which the access token is valid.


#### Return values
* **integer** The time period (in seconds) for which the access token is valid.



### getRedirectUri

    string SpotifyWebAPI\Session::getRedirectUri()

Get the client's redirect URI.


#### Return values
* **string** The redirect URI.



### getRefreshToken

    string SpotifyWebAPI\Session::getRefreshToken()

Get the refresh token.


#### Return values
* **string** The refresh token.



### refreshToken

     SpotifyWebAPI\Session::refreshToken()






### refreshAccessToken

    boolean SpotifyWebAPI\Session::refreshAccessToken()

Refresh an access token.


#### Return values
* **boolean** Whether the access token was successfully refreshed.



### requestCredentialsToken

    boolean SpotifyWebAPI\Session::requestCredentialsToken(array $scope)

Request an access token using the Client Credentials Flow.

#### Arguments
* `$scope` **array** - Optional. Scope(s) to request from the user.


#### Return values
* **boolean** True when an access token was successfully granted, false otherwise.



### requestToken

     SpotifyWebAPI\Session::requestToken($code)



#### Arguments
* `$code` **mixed**




### requestAccessToken

    boolean SpotifyWebAPI\Session::requestAccessToken(string $authorizationCode)

Request an access token given an authorization code.

#### Arguments
* `$authorizationCode` **string** - The authorization code from Spotify.


#### Return values
* **boolean** True when the access token was successfully granted, false otherwise.



### setClientId

    void SpotifyWebAPI\Session::setClientId(string $clientId)

Set the client ID.

#### Arguments
* `$clientId` **string** - The client ID.


#### Return values
* **void** 



### setClientSecret

    void SpotifyWebAPI\Session::setClientSecret(string $clientSecret)

Set the client secret.

#### Arguments
* `$clientSecret` **string** - The client secret.


#### Return values
* **void** 



### setRedirectUri

    void SpotifyWebAPI\Session::setRedirectUri(string $redirectUri)

Set the client's redirect URI.

#### Arguments
* `$redirectUri` **string** - The redirect URI.


#### Return values
* **void** 



### setRefreshToken

    void SpotifyWebAPI\Session::setRefreshToken(string $refreshToken)

Set the refresh token.

#### Arguments
* `$refreshToken` **string** - The refresh token.


#### Return values
* **void** 


