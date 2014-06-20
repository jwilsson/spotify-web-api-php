<?php
class SpotifyWebAPI
{
    public static function addUserPlaylistTracks($userId, $playlistId, $tracks, $position = 0)
    {
        $tracks = json_encode($tracks);
        $response = Request::api('POST', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks', $tracks, array(
            'Authorization' => 'Bearer ' . $accessToken, // @todo Get this from somewhere
            'Content-Type' => 'application/json'
        ));

        return json_decode($response['body']);
    }

    public static function createUserPlaylist($userId, $data)
    {
        $data = json_encode($data);
        $response = Request::api('POST', '/v1/users/' . $userId . '/playlists', $data, array(
            'Authorization' => 'Bearer ' . $accessToken, // @todo Get this from somewhere
            'Content-Type' => 'application/json'
        ));

        return json_decode($response['body']);
    }

    public static function getAlbum($albumId)
    {
        $response = Request::api('GET', '/v1/albums/' . $albumId);

        return json_decode($response['body']);
    }

    public static function getAlbums($albumIds)
    {
        $albumIds = implode(',', $albumIds);
        $response = Request::api('GET', '/v1/albums/', array('ids' => $albumIds));

        return json_decode($response['body']);
    }

    public static function getAlbumTracks($albumId)
    {
        $response = Request::api('GET', '/v1/albums/' . $albumId . '/tracks');

        return json_decode($response['body']);
    }

    public static function getArtist($artistId)
    {
        $response = Request::api('GET', '/v1/artists/' . $albumId);

        return json_decode($response['body']);
    }

    public static function getArtists($artistIds)
    {
        $artistIds = implode(',', $artistIds);
        $response = Request::api('GET', '/v1/artists/', array('ids' => $artistIds));

        return json_decode($response['body']);
    }

    public static function getArtistAlbums($artistId)
    {
        $response = Request::api('GET', '/v1/artists/' . $albumId . '/albums');

        return json_decode($response['body']);
    }

    // ISO docs: https://developer.spotify.com/web-api/get-artists-top-tracks/
    public static function getArtistTopTracks($artistId, $country)
    {
        $response = Request::api('GET', '/v1/artists/' . $albumId . '/top-tracks', array('country' =>  $country));

        return json_decode($response['body']);
    }

    public static function getTrack($trackId)
    {
        $response = Request::api('GET', '/v1/tracks/' . $trackId);

        return json_decode($response['body']);
    }

    public static function getTracks($trackIds)
    {
        $trackIds = implode(',', $trackIds);
        $response = Request::api('GET', '/v1/tracks/', array('ids' => $trackIds));

        return json_decode($response['body']);
    }

    public static function getUser($userId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId);

        return json_decode($response['body']);
    }

    public static function getUserPlaylists($userId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists', array(), array(
            'Authorization' => 'Bearer ' . $accessToken // @todo Get this from somewhere
        ));

        return json_decode($response['body']);
    }

    public static function getUserPlaylist($userId, $playlistId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists/' . $playlistId, array(), array(
            'Authorization' => 'Bearer ' . $accessToken // @todo Get this from somewhere
        ));
    }

    public static function getUserPlaylistTracks($userId, $playlistId)
    {
        $response = Request::api('GET', '/v1/users/' . $userId . '/playlists/' . $playlistId . '/tracks', array(), array(
            'Authorization' => 'Bearer ' . $accessToken // @todo Get this from somewhere
        ));
    }

    public static function me()
    {
        $response = Request::api('GET', '/v1/me', array(), array(
            'Authorization' => 'Bearer ' . $accessToken // @todo Get this from somewhere
        ));

        return json_decode($response['body']);
    }

    // More info: https://developer.spotify.com/web-api/search-item/
    public static function search($query, $type, $limit = 20, $offset = 0)
    {
        $query = rawurlencode($query);
        $type = implode(',', $type);

        $response = Request::api('GET', '/v1/search', array(
            'limit' => $limit,
            'offset' => $offset,
            'query' => $query,
            'type' => 'type'
        ));

        return json_decode($response['body']);
    }
}
