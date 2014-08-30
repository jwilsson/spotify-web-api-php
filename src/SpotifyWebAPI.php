<?php
namespace SpotifyWebAPI;

class SpotifyWebAPI
{
    private static $accessToken = '';

    /**
     * Convert Spotify object IDs to Spotify URIs
     *
     * @param array|string $ids ID(s) to convert
     *
     * @return array|string
     */
    protected static function idToUri($ids)
    {
        $ids = (array) $ids;

        for ($i = 0; $i < count($ids); $i++) {
            if (strpos($ids[$i], 'spotify:track:') !== false) {
                continue;
            }

            $ids[$i] = 'spotify:track:' . $ids[$i];
        }

        return (count($ids) == 1) ? $ids[0] : $ids;
    }

    /**
     * Add track(s) to the current user's Spotify library.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/save-tracks-user/
     *
     * @param string|array IDs of the track to check for.
     *
     * @return bool
     */
    public static function addMyTracks($tracks)
    {
        $tracks = (array) $tracks;
        $tracks = json_encode($tracks);

        $response = Request::api('PUT', '/v1/me/tracks', $tracks, array(
            'Authorization' => 'Bearer ' . self::$accessToken,
            'Content-Type' => 'application/json'
        ));

        return $response['status'] == 200;
    }

    /**
     * Add track(s) to a user's playlist.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/add-tracks-to-playlist/
     *
     * @param string $userId ID of the user who owns the playlist.
     * @param string $playlistId ID of the playlist to add tracks to.
     * @param array $tracks Spotify IDs of the tracks to add.
     * @param array|object $options Optional. Options for the new tracks.
     * - int position Optional. Zero-based position of where in the playlist to add the tracks. Tracks will be appened if omitted or false.
     *
     * @return bool
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
        $tracks = self::idToUri($tracks);
        $tracks = json_encode($tracks);

        // We need to manually append data to the URI since it's a POST request
        $response = Request::api('POST', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks?' . $options, $tracks, array(
            'Authorization' => 'Bearer ' . self::$accessToken,
            'Content-Type' => 'application/json'
        ));

        return $response['status'] == 201;
    }

    /**
     * Create a new playlist for a user.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/create-playlist/
     *
     * @param string $userId ID of the user to create the playlist for.
     * @param array|object $data Data for the new playlist.
     * - name string Required. Name of the playlist
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
     * Delete track(s) from current user's Spotify library.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/remove-tracks-user/
     *
     * @param string|array IDs of the track to delete.
     *
     * @return bool
     */
    public static function deleteMyTracks($tracks)
    {
        $tracks = (array) $tracks;
        $tracks = implode(',', $tracks);
        $tracks = urlencode($tracks);

        $response = Request::api('DELETE', '/v1/me/tracks?ids=' . $tracks, array(), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['status'] == 200;
    }

    /**
     * Delete tracks from a playlist and retrieve a new snapshot ID.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/remove-tracks-playlist/
     *
     * @param string $userId ID of the user who owns the playlist.
     * @param string $playlistId ID of the playlist to delete tracks from.
     * @param array $tracks Tracks to delete and optional position in the playlist where the track is located.
     * - id string Required. Spotify track ID.
     * - position array Optional. Position of the track in the playlist.
     * @param string $snapshotId Optional. The playlist's snapshot ID.
     *
     * @return string|bool
     */
    public static function deletePlaylistTracks($userId, $playlistId, $tracks, $snapshotId = '')
    {
        $data = array();
        if ($snapshotId) {
            $data['snapshot_id'] = $snapshotId;
        }

        for ($i = 0; $i < count($tracks); $i++) {
            $tracks[$i] = (array) $tracks[$i];
            $tracks[$i]['uri'] = self::idToUri($tracks[$i]['id']);
        }

        $data['tracks'] = $tracks;
        $data = json_encode($data);

        $response = Request::api('DELETE', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks', $data, array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));
        $response = $response['body'];

        if (isset($response->snapshot_id)) {
            return $response->snapshot_id;
        }

        return false;
    }

    /**
     * Get a album.
     * https://developer.spotify.com/web-api/get-album/
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
     * https://developer.spotify.com/web-api/get-several-albums/
     *
     * @param string $albumId ID of the album.
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks. Default is 20.
     * - int offset Optional. Number of tracks to skip. Default is 0.
     *
     * @return object
     */
    public static function getAlbumTracks($albumId, $options = array())
    {
        $defaults = array(
            'limit' => 20,
            'offset' => 0
        );

        $options = array_merge($defaults, (array) $options);
        $response = Request::api('GET', '/v1/albums/' . $albumId . '/tracks', $options);

        return $response['body'];
    }

    /**
     * Get a artist.
     * https://developer.spotify.com/web-api/get-artist/
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
     * https://developer.spotify.com/web-api/get-several-artists/
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
     * Get an artist's related artists.
     * https://developer.spotify.com/web-api/get-related-artists/
     *
     * @param string $artistId ID of the artist.
     *
     * @return object
     */
    public static function getArtistRelatedArtists($artistId)
    {
        $response = Request::api('GET', '/v1/artists/' . $artistId . '/related-artists');

        return $response['body'];
    }

    /**
     * Get a artist's albums.
     * https://developer.spotify.com/web-api/get-artists-albums/
     *
     * @param string $artistId ID of the artist.
     * @param array|object $options Optional. Options for the albums.
     * - int limit Optional. Limit the number of albums. Default is 20.
     * - int offset Optional. Number of albums to skip. Default is 0.
     *
     * @return object
     */
    public static function getArtistAlbums($artistId, $options = array())
    {
        $defaults = array(
            'limit' => 20,
            'offset' => 0
        );

        $options = array_merge($defaults, (array) $options);
        $response = Request::api('GET', '/v1/artists/' . $artistId . '/albums', $options);

        return $response['body'];
    }

    /**
     * Get a artist's top tracks in a country.
     * https://developer.spotify.com/web-api/get-artists-top-tracks/
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
     * Get the current user’s saved tracks.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/get-users-saved-tracks/
     *
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks. Default is 20.
     * - int offset Optional. Number of tracks to skip. Default is 0.
     *
     * @return array
     */
    public static function getMySavedTracks($options = array())
    {
        $defaults = array(
            'limit' => 20,
            'offset' => 0
        );

        $options = array_merge($defaults, (array) $options);
        $response = Request::api('GET', '/v1/me/tracks', $options, array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['body'];
    }

    /**
     * Get a track.
     * https://developer.spotify.com/web-api/get-track/
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
     * https://developer.spotify.com/web-api/get-several-tracks/
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
     * https://developer.spotify.com/web-api/get-users-profile/
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
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/get-list-users-playlists/
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
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/get-playlist/
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
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/get-playlists-tracks/
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
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/get-current-users-profile/
     *
     * @return object
     */
    public static function me()
    {
        $response = Request::api('GET', '/v1/me', array(), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['body'];
    }

    /**
     * Check if the track(s) is saved in the current user's Spotify library.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/check-users-saved-tracks/
     *
     * @param string|array $tracks IDs of the track to check for.
     *
     * @return array
     */
    public static function myTracksContains($tracks)
    {
        $tracks = (array) $tracks;
        $tracks = implode(',', $tracks);

        $response = Request::api('GET', '/v1/me/tracks/contains', array('ids' => $tracks), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['body'];
    }

    /**
     * Replace all tracks in a user's playlist with new ones.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/replace-playlists-tracks/
     *
     * @param string $userId ID of the user.
     * @param string $playlistId ID of the playlist.
     * @param string|array $tracks IDs of the track(s) to add.
     *
     * @return bool
     */
    public static function replacePlaylistTracks($userID, $playlistId, $tracks)
    {
        $tracks = self::idToUri($tracks);
        $tracks = implode(',', $tracks);

        $response = Request::api('PUT', 'v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks', array('uris' => $tracks), array(
            'Authorization' => 'Bearer ' . self::$accessToken
        ));

        return $response['status'] == 201;
    }

    /**
     * Search for an item.
     * https://developer.spotify.com/web-api/search-item/
     *
     * @param string $query The query to search for. Will be URL-encoded. More info: https://developer.spotify.com/web-api/search-item/
     * @param string|array $type The type of item to search for, "album", "artist" or "track".
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks. Default is 20.
     * - int offset Optional. Number of tracks to skip. Default is 0.
     *
     * @return array
     */
    public static function search($query, $type, $options = array())
    {
        $defaults = array(
            'limit' => 20,
            'offset' => 0
        );

        $options = array_merge($defaults, (array) $options);
        $type = implode(',', (array) $type);

        $response = Request::api('GET', '/v1/search', array_merge($options, array(
            'query' => $query,
            'type' => $type
        )));

        return $response['body'];
    }

    /**
     * Set the access token to use.
     *
     * @param string $accessToken The access token.
     *
     * @return void
     */
    public static function setAccessToken($accessToken)
    {
        self::$accessToken = $accessToken;
    }

    /**
     * Update the details of a user's playlist.
     * Requires a valid access token.
     * https://developer.spotify.com/web-api/change-playlist-details/
     *
     * @param array|object $data Data for the new playlist.
     * - name string Required. Name of the playlist
     * - public bool Optional. Whether the playlist should be public or not. Default is true.
     *
     * @return bool
     */
    public static function updateUserPlaylist($userId, $playlistId, $data)
    {
        $data = json_encode($data);
        $response = Request::api('PUT', '/v1/users/' . $userId . '/playlists/' . $playlistId, $data, array(
            'Authorization' => 'Bearer ' . self::$accessToken,
            'Content-Type' => 'application/json'
        ));

        return $response['status'] == 200;
    }
}
