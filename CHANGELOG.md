# Changelog
## 0.3
* Added new methods to
    * Get Current User’s Saved Tracks
    * Check Current User’s Saved Tracks
    * Save Tracks for Current User
    * Remove Tracks for Current User
    * Change a Playlist’s Details
    * Remove Tracks from a Playlist
    * Replace a Playlist’s Tracks
* Added support for the Client Credentials Authorization Flow.
* Added support for more HTTP methods in Request::send().

## 0.2
* Added Artist’s Related Artists endpoint.
* Added `offset` and `limit` options for `SpotifyWebAPI::getAlbumTracks()` and `SpotifyWebAPI::getArtistAlbums()`.
* Replaced PSR-0 autoloading with PSR-4 autoloading.
* Changed method signature of `Session::getAuthorizeUrl()` and added `show_dialog` option.
* Added missing returns for `SpotifyWebAPI::getUserPlaylist()` and `SpotifyWebAPI::getUserPlaylistTracks()`.
* Fixed a bug where search terms were double encoded.

## 0.1
* Initial release
