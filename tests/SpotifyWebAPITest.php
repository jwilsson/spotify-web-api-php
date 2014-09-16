<?php
use \SpotifyWebAPI;

class SpotifyWebAPITest extends PHPUnit_Framework_TestCase
{
    private $api;
    private $playlistID;

    public function setUp()
    {
        $this->api = new SpotifyWebAPI\SpotifyWebAPI();
        $this->session = new SpotifyWebAPI\Session(getenv('SPOTIFY_CLIENT_ID'), getenv('SPOTIFY_CLIENT_SECRET'), getenv('SPOTIFY_REDIRECT_URI'));

        $this->session->setRefreshToken(getenv('SPOTIFY_REFRESH_TOKEN'));
        $this->session->refreshToken();

        $this->api->setAccessToken($this->session->getAccessToken());

        // Create a new playlist each time the tests are run
        $response = $this->api->createUserPlaylist('mcgurk', array(
            'name' => 'Test playlist'
        ));

        $this->playlistID = $response->id;
    }

    public function testAddMyTracksSingle()
    {
        $result = $this->api->addMyTracks('7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertTrue($result);
    }

    public function testAddMyTracksMultiple()
    {
        $result = $this->api->addMyTracks(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $this->assertTrue($result);
    }

    public function testAddUserPlaylistTracksSingle()
    {
        $result = $this->api->addUserPlaylistTracks('mcgurk', $this->playlistID, '7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertTrue($result);
    }

    public function testAddUserPlaylistTracksMultiple()
    {
        $result = $this->api->addUserPlaylistTracks('mcgurk', $this->playlistID, array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $this->assertTrue($result);
    }

    public function testCreateUserPlaylist()
    {
        $response = $this->api->createUserPlaylist('mcgurk', array(
            'name' => 'Foobar playlist',
            'public' => false
        ));

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testCreateUserPlaylistPublic()
    {
        $response = $this->api->createUserPlaylist('mcgurk', array(
            'name' => 'Public playlist'
        ));

        $this->assertTrue($response->public);
    }

    public function testDeleteMyTracksSingle()
    {
        $this->api->addMyTracks('7EjyzZcbLxW7PaaLua9Ksb');

        $result = $this->api->deleteMyTracks('7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertTrue($result);
    }

    public function testDeleteMyTracksMultiple()
    {
        $this->api->addMyTracks(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $result = $this->api->deleteMyTracks(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $this->assertTrue($result);
    }

    public function testDeletePlaylistTracks()
    {
        $response = $this->api->deletePlaylistTracks('mcgurk', $this->playlistID, array(
            array(
                'id' => '7EjyzZcbLxW7PaaLua9Ksb'
            )
        ));

        $this->assertNotFalse($response);
    }

    public function testGetAlbum()
    {
        $response = $this->api->getAlbum('7u6zL7kqpgLPISZYXNTgYk');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetAlbumNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getAlbum('nonexistent');
    }

    public function testGetAlbums()
    {
        $response = $this->api->getAlbums(array(
            '1oR3KrPIp4CbagPa3PhtPp',
            '6lPb7Eoon6QPbscWbMsk6a'
        ));

        $this->assertObjectHasAttribute('id', $response->albums[0]);
        $this->assertObjectHasAttribute('id', $response->albums[1]);
    }

    public function testGetAlbumsNonExistent()
    {
        $response = $this->api->getAlbums(array('nonexistent'));

        $this->assertEmpty($response->albums[0]);
    }

    public function testGetAlbumTracks()
    {
        $response = $this->api->getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp');

        $this->assertObjectHasAttribute('items', $response);
    }

    public function testGetAlbumTracksNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getAlbumTracks('nonexistent');
    }

    public function testGetAlbumTracksLimit()
    {
        $response = $this->api->getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->items);
    }

    public function testGetArtist()
    {
        $response = $this->api->getArtist('36QJpDe2go2KgaRleHCDTp');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetArtistNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getArtist('nonexistent');
    }

    public function testGetArtistRelatedArtists()
    {
        $response = $this->api->getArtistRelatedArtists('36QJpDe2go2KgaRleHCDTp');

        $this->assertNotEmpty($response->artists);
    }

    public function testGetArtistRelatedArtistsNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getArtistRelatedArtists('nonexistent');
    }

    public function testGetArtists()
    {
        $response = $this->api->getArtists(array(
            '6v8FB84lnmJs434UJf2Mrm',
            '6olE6TJLqED3rqDCT0FyPh'
        ));

        $this->assertObjectHasAttribute('id', $response->artists[0]);
        $this->assertObjectHasAttribute('id', $response->artists[1]);
    }

    public function testGetArtistsNonExistent()
    {
        $response = $this->api->getArtists(array('nonexistent'));

        $this->assertEmpty($response->artists[0]);
    }

    public function testGetArtistAlbums()
    {
        $response = $this->api->getArtistAlbums('6v8FB84lnmJs434UJf2Mrm');

        $this->assertObjectHasAttribute('items', $response);
    }

    public function testGetArtistAlbumsNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getArtistAlbums('nonexistent');
    }

    public function testGetArtistAlbumsLimit()
    {
        $response = $this->api->getArtistAlbums('6v8FB84lnmJs434UJf2Mrm', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->items);
    }

    public function testGetArtistTopTracks()
    {
        $response = $this->api->getArtistTopTracks('6v8FB84lnmJs434UJf2Mrm', 'se');

        $this->assertObjectHasAttribute('tracks', $response);
    }

    public function testGetArtistTopTracksNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getArtistAlbums('nonexistent', 'se');
    }

    public function testGetMySavedTracks()
    {
        $this->api->addMyTracks('7EjyzZcbLxW7PaaLua9Ksb');

        $response = $this->api->getMySavedTracks();
        $this->assertNotEmpty($response->items);

        $this->api->deleteMyTracks('7EjyzZcbLxW7PaaLua9Ksb');
    }

    public function testGetMySavedTracksLimit()
    {
        $this->api->addMyTracks(array(
            '0oks4FnzhNp5QPTZtoet7c',
            '2cGxRwrMyEAp8dEbuZaVv6',
            '5CMjjywI0eZMixPeqNd75R',
            '7oaEjLP2dTJLJsITbAxTOz',
            '69kOkLUCkxIZYexIgSG8rq'
        ));

        $response = $this->api->getMySavedTracks(array(
            'limit' => 5
        ));
        $this->assertCount(5, $response->items);

        $this->api->deleteMyTracks(array(
            '0oks4FnzhNp5QPTZtoet7c',
            '2cGxRwrMyEAp8dEbuZaVv6',
            '5CMjjywI0eZMixPeqNd75R',
            '7oaEjLP2dTJLJsITbAxTOz',
            '69kOkLUCkxIZYexIgSG8rq'
        ));
    }

    public function testGetTrack()
    {
        $response = $this->api->getTrack('7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetTrackNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getTrack('nonexistent');
    }

    public function testGetTracks()
    {
        $response = $this->api->getTracks(array(
            '0eGsygTp906u18L0Oimnem',
            '1lDWb6b6ieDQ2xT7ewTC3G'
        ));

        $this->assertObjectHasAttribute('id', $response->tracks[0]);
        $this->assertObjectHasAttribute('id', $response->tracks[1]);
    }

    public function testGetTracksNonExistent()
    {
        $response = $this->api->getTracks(array('nonexistent'));

        $this->assertEmpty($response->tracks[0]);
    }

    public function testGetUser()
    {
        $response = $this->api->getUser('mcgurk');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetUserNonExistent()
    {
        $this->setExpectedException('SpotifyWebAPI\SpotifyWebAPIException');

        $response = $this->api->getUser('not_a_real_user');
    }

    public function testGetUserPlaylists()
    {
        $response = $this->api->getUserPlaylists('mcgurk');

        $this->assertNotEmpty($response->items);
    }

    public function testGetUserPlaylistsLimit()
    {
        $response = $this->api->getUserPlaylists('mcgurk', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->items);
    }

    public function testGetUserPlaylist()
    {
        $response = $this->api->getUserPlaylist('mcgurk', $this->playlistID);

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetUserPlaylistTracks()
    {
        $this->api->addUserPlaylistTracks('mcgurk', $this->playlistID, array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $response = $this->api->getUserPlaylistTracks('mcgurk', $this->playlistID);

        $this->assertObjectHasAttribute('track', $response->items[0]);
        $this->assertObjectHasAttribute('track', $response->items[1]);
    }

    public function testMe()
    {
        $response = $this->api->me();

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testMyTracksContainsSingle()
    {
        $this->api->addMyTracks('7EjyzZcbLxW7PaaLua9Ksb');

        $response = $this->api->myTracksContains('7EjyzZcbLxW7PaaLua9Ksb');
        $this->assertTrue($response[0]);

        $this->api->deleteMyTracks('7EjyzZcbLxW7PaaLua9Ksb');
    }

    public function testMyTracksContainsMultiple()
    {
        $this->api->addMyTracks(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $response = $this->api->myTracksContains(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $this->assertTrue($response[0]);
        $this->assertTrue($response[1]);

        $this->api->deleteMyTracks(array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));
    }

    public function testReplacePlaylistTracksSingle()
    {
        $result = $this->api->replacePlaylistTracks('mcgurk', $this->playlistID, '7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertTrue($result);
    }

    public function testReplacePlaylistTracksMultiple()
    {
        $result = $this->api->replacePlaylistTracks('mcgurk', $this->playlistID, array(
            '1id6H6vcwSB9GGv9NXh5cl',
            '3mqRLlD9j92BBv1ueFhJ1l'
        ));

        $this->assertTrue($result);
    }

    public function testSearchAlbum()
    {
        $response = $this->api->search('blur', 'album');

        $this->assertNotEmpty($response->albums->items);
    }

    public function testSearchArtist()
    {
        $response = $this->api->search('blur', 'artist');

        $this->assertNotEmpty($response->artists->items);
    }

    public function testSearchTrack()
    {
        $response = $this->api->search('song 2', 'track');

        $this->assertNotEmpty($response->tracks->items);
    }

    public function testSearchNonExistent()
    {
        $response = $this->api->search('nonexistent_foobar', 'album');

        $this->assertEmpty($response->albums->items);
    }

    public function testSearchLimit()
    {
        $response = $this->api->search('blur', 'artist', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->artists->items);
    }

    public function testUpdateUserPlaylist()
    {
        $result = $this->api->updateUserPlaylist('mcgurk', $this->playlistID, array(
            'public' => false
        ));

        $this->assertTrue($result);
    }
}
