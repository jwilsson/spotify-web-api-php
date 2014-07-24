<?php
use \SpotifyWebAPI;

class SpotifyWebAPITest extends PHPUnit_Framework_TestCase
{
    public function testGetAlbum()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbum('7u6zL7kqpgLPISZYXNTgYk');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetAlbumNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbum('nonexistent');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetAlbums()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbums(array('1oR3KrPIp4CbagPa3PhtPp', '6lPb7Eoon6QPbscWbMsk6a'));

        $this->assertObjectHasAttribute('id', $response->albums[0]);
        $this->assertObjectHasAttribute('id', $response->albums[1]);
    }

    public function testGetAlbumsNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbums(array('nonexistent'));

        $this->assertEmpty($response->albums[0]);
    }

    public function testGetAlbumTracks()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp');

        $this->assertObjectHasAttribute('items', $response);
    }

    public function testGetAlbumTracksNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks('nonexistent');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetAlbumTracksLimit()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->items);
    }

    public function testGetArtist()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtist('36QJpDe2go2KgaRleHCDTp');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetArtistNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtist('nonexistent');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetArtists()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtists(array('6v8FB84lnmJs434UJf2Mrm', '6olE6TJLqED3rqDCT0FyPh'));

        $this->assertObjectHasAttribute('id', $response->artists[0]);
        $this->assertObjectHasAttribute('id', $response->artists[1]);
    }

    public function testGetArtistsNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtists(array('nonexistent'));

        $this->assertEmpty($response->artists[0]);
    }

    public function testGetArtistAlbums()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums('6v8FB84lnmJs434UJf2Mrm');

        $this->assertObjectHasAttribute('items', $response);
    }

    public function testGetArtistAlbumsNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums('nonexistent');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetArtistAlbumsLimit()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums('6v8FB84lnmJs434UJf2Mrm', array(
            'limit' => 5
        ));

        $this->assertCount(5, $response->items);
    }

    public function testGetArtistTopTracks()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtistTopTracks('6v8FB84lnmJs434UJf2Mrm', 'se');

        $this->assertObjectHasAttribute('tracks', $response);
    }

    public function testGetArtistTopTracksNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums('nonexistent', 'se');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetTrack()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getTrack('7EjyzZcbLxW7PaaLua9Ksb');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetTrackNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getTrack('nonexistent');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testGetTracks()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getTracks(array('0eGsygTp906u18L0Oimnem', '1lDWb6b6ieDQ2xT7ewTC3G'));

        $this->assertObjectHasAttribute('id', $response->tracks[0]);
        $this->assertObjectHasAttribute('id', $response->tracks[1]);
    }

    public function testGetTracksNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getTracks(array('nonexistent'));

        $this->assertEmpty($response->tracks[0]);
    }

    public function testGetUser()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getUser('mcgurk');

        $this->assertObjectHasAttribute('id', $response);
    }

    public function testGetUserNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::getUser('not_a_real_user');

        $this->assertObjectHasAttribute('error', $response);
    }

    public function testSearchAlbum()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::search('blur', 'album');

        $this->assertNotEmpty($response->albums->items);
    }

    public function testSearchArtist()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::search('blur', 'artist');

        $this->assertNotEmpty($response->artists->items);
    }

    public function testSearchTrack()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::search('song 2', 'track');

        $this->assertNotEmpty($response->tracks->items);
    }

    public function testSearchNonExistent()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::search('nonexistent_foobar', 'album');

        $this->assertEmpty($response->albums->items);
    }

    public function testSearchLimit()
    {
        $response = SpotifyWebAPI\SpotifyWebAPI::search('blur', 'artist', 5);

        $this->assertCount(5, $response->artists->items);
    }
}
