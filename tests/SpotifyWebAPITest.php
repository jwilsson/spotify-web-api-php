<?php
use \SpotifyWebAPI;

class SpotifyWebAPITest extends PHPUnit_Framework_TestCase
{
    private $api;

    public function setUp()
    {
        $this->api = new SpotifyWebAPI\SpotifyWebAPI();
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
        $response = $this->api->getAlbums(array('1oR3KrPIp4CbagPa3PhtPp', '6lPb7Eoon6QPbscWbMsk6a'));

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
        $response = $this->api->getArtists(array('6v8FB84lnmJs434UJf2Mrm', '6olE6TJLqED3rqDCT0FyPh'));

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
        $response = $this->api->getTracks(array('0eGsygTp906u18L0Oimnem', '1lDWb6b6ieDQ2xT7ewTC3G'));

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
}
