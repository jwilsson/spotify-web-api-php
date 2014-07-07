<?php
namespace SpotifyWebAPI;

class SpotifyWebAPI
{
    private static $accessToken = '';

    /**
     * Add track(s) to a user's playlist.
     * Requires a valid access token.
     *
     * @param string $userId ID of the user who owns the playlist.
     * @param string $playlistId ID of the playlist to add tracks to.
     * @param array $tracks Spotify URIs for the tracks to add.
     * @param array|object $options Optional. Options for the new tracks.
     * - int position Optional. Zero-based position of where in the playlist to add the tracks. Tracks will be appened if omitted or false.
     *
     * @return bool|object
     */
    public static function addUserPlaylistTracks($userId, $playlistId, $tracks, $options = array())
    {
        $defaults = array(
            'position' => false
        );

        $options = array_merge($defaults, (array) $options);
        $options = array_filter($options, function ($value) {
            return $value !== false;
        });

        $options = http_build_query($options);
        $tracks = json_encode($tracks);

        // We need to manually append data to the URI since it's a POST request
        $response = Request::api('POST', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks?' . $options, $tracks, array(
            'Authorization' => 'Bearer ' . self::$accessToken,
            'Content-Type' => 'application/json'
        ));

        if ($response['status'] == 201) {
            return true;
        }

        return $response['body'];
    }

    /**
     * Create a new playlist for a user.
     * Requires a valid access token.
     *
     * @param string $userId ID of the user to create the playlist for.
     * @param array|object $data Data for the new playlist.
     * - name string Required Name of the playlist
     * - public bool Optional. Whether the playlist should be public or not. Default is true.
     *
     * @return object
     */
    public static function createUserPlaylist($userId, $data)
    {
        $defaults = array(
            'name' =>  '',
            'public' => true
        );

        $data = json_encode(array_merge($defaults, (array) $data));
        $response = Request::api('POST', '/v1/users/' . $userId . '/playlists', $data, array(
            'Authorization' => 'Bearer ' . self::$accessToken,
            'Content-Type' => 'application/json'
        ));

        return $response['body'];
    }

    /**
     * Get a album.
     *
     * @param string $albumId ID of the album.
     *
     * @return object
     */
    public static function getAlbum($albumId)
    {
        $response = Request::api('GET', '/v1/albums/' . $albumId);

        return $response['body'];
    }

    /**
     * Get multiple albums.
     *
     * @param array $albumIds ID of the albums.
     *
     * @return object
     */
    public static function getAlbums($albumIds)
    {
        $albumIds = implode(',', $albumIds);
        $response = Request::api('GET', '/v1/albums/', array('ids' => $albumIds));

        return $response['body'];
    }

    /**
     * Get a album's tracks.
     *
     * @param string $albumId ID of the album.
     *
     * @return object
     */
    public static function getAlbumTracks($albumId)
    {
        $response = Request::api('GET', '/v1/albums/' . $albumId . '/tracks');

        return $response['body'];
    }

    /**
     * Get a artist.
     *
     * @param string $artistId ID of the artist.
     *
     * @return object
     */
    public static function getArtist($artistId)
    {
        $response = Request::api('GET', '/v1/artists/' . $artistId);

        return $response['body'];
    }

    /**
     * Get multiple artists.
     *
     * @param array $artistIds ID of the artists.
     *
     * @return object
     */
    public static function getArtists($artistIds)
    {
        $artistIds = implode(',', $artistIds);
        $response = Request::api('GET', '/v1/artists/', array('ids' => $artistIds));

        return $response['body'];
    }

    /**
     * Get a artist's albums.
     *
     * @param string $artistId ID of the artist.
     *
     * @return object
     */
    public static function getArtistAlbums($artistId)
    {
        $response = Request::api('GET', '/v1/artists/' . $artistId . '/albums');

        return $response['body'];
    }

    /**
     * Get a artist's top tracks in a country.
     *
     * @param string $artistId ID of the artist.
     * @param string $country An ISO 3166-1 alpha-2 country code specifying the country to get the top tracks for.
     *
     * @return object
     */
    public static function getArtistTopTracks($artistId, $country)
    {
        $response = Request::api('GET', '/v1/artists/' . $artistId . '/top-tracks', array('country' =>  $country));

        return $response['body'];
    }

    /**
     * Get a track.
     *
     * @param string $trackId ID of the track.
     *
     * @return object
     */
    public static function getTrack($trackId)
    {
        $response = Request::api('GET', '/v1/tracks/' . $trackId);

        return $response['body'];
    }

    /**
     * Get multiple tracks.
     *
     * @param array $trackIds ID of the tracks.
     *
     * @return object
     */
    public static function getTracks($trackIds)
    {
        $trackIds = implode(',', $trackIds);
        $response = Request::api('GET', '/v1/tracks/', array('ids' => $trackIds));

        return $response['body'];
    }

    /**
     * Get a user.
     *
     * @param string $userId ID of the user.
     *
     * @return object
     */
    public static function getUser($userId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId);

        return $response['body'];
    }

    /**
     * Get a user's playlists.
     *
     * @param string $userId ID of the user.
     *
     * @return object
     */
    public static function getUserPlaylists($userId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists', array(), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['body'];
    }

    /**
     * Get a user's specific playlist.
     *
     * @param string $userId ID of the user.
     * @param string $playlistId ID of the playlist.
     *
     * @return object
     */
    public static function getUserPlaylist($userId, $playlistId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists/' . $playlistId, array(), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));
        
        return $response['body'];
    }

    /**
     * Get the tracks in a user's playlist.
     *
     * @param string $userId ID of the user.
     * @param string $playlistId ID of the playlist.
     *
     * @return object
     */
    public static function getUserPlaylistTracks($userId, $playlistId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks', array(), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));
        
        return $response['body'];
    }

    /**
     * Get the currently authenticated user.
     *
     * @return object
     */
    public static function me()
    {
        $response = Request::api('GET', '/v1/me', array(), array(
            'Authorization' => 'Bearer test' // 'Bearer ' . self::$accessToken
        ));

        return $response['body'];
    }

    /**
     * Search for an item.
     *
     * @param string $query The query to search for. Will be URL-encoded. More info: https://developer.spotify.com/web-api/search-item/
     * @param string|array $type The type of item to search for, "album", "artist" or "track".
     * @param int $limit Optional. The number of items in the result to return. Maximum is 50. Default is 20.
     * @param int $offset Optional. The number of items in the result to skip. Default is 0.
     */
    public static function search($query, $type, $limit = 20, $offset = 0)
    {
        $query = rawurlencode($query);
        $type = implode(',', (array) $type);

        $response = Request::api('GET', '/v1/search', array(
            'limit' => $limit,
            'offset' => $offset,
            'query' => $query,
            'type' => $type
        ));

        return $response['body'];
    }

    /**
     * Set the access token to use
     *
     * @param string $accessToken The access token.
     *
     * @return void
     */
    public static function setAccessToken($accessToken)
    {
        self::$accessToken = $accessToken;
    }
}
