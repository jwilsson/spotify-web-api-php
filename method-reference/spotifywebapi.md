---
layout: default
title: Method Reference - SpotifyWebAPI
---

### SpotifyWebAPI\SpotifyWebAPI::__construct()

```
void SpotifyWebAPI\SpotifyWebAPI::__construct(SpotifyWebAPI\Request $request)
```

Constructor
Set up Request object.

#### Arguments

* $request **[SpotifyWebAPI\Request](request.html)** - Optional. The Request object to use.

### SpotifyWebAPI\SpotifyWebAPI::addMyTracks()

```
boolean SpotifyWebAPI\SpotifyWebAPI::addMyTracks($tracks)
```

Add tracks to the current user's Spotify library. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/save-tracks-user/](https://developer.spotify.com/web-api/save-tracks-user/)

#### Arguments

* $tracks **string\|array** - ID(s) of the track(s) to add.

#### Return values

* **boolean** Whether the tracks was successfully added.

### SpotifyWebAPI\SpotifyWebAPI::addUserPlaylistTracks()

```
boolean SpotifyWebAPI\SpotifyWebAPI::addUserPlaylistTracks(string $userId, string $playlistId, string|array $tracks, array|object $options)
```

Add tracks to a user's playlist. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/add-tracks-to-playlist/](https://developer.spotify.com/web-api/add-tracks-to-playlist/)

#### Arguments

* $userId **string** - ID of the user who owns the playlist.
* $playlistId **string** - ID of the playlist to add tracks to.
* $tracks **string\|array** - ID(s) of the track(s) to add.
* $options **array\|object** - Optional. Options for the new tracks.
    * position **int** Optional. Zero-based position of where in the playlist to add the tracks. Tracks will be appened if omitted or false.

#### Return values

* **boolean** Whether the tracks was successfully added.

### SpotifyWebAPI\SpotifyWebAPI::createUserPlaylist()

```
array|object SpotifyWebAPI\SpotifyWebAPI::createUserPlaylist(string $userId, array|object $data)
```

Create a new playlist for a user. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/create-playlist/](https://developer.spotify.com/web-api/create-playlist/)

#### Arguments

* $userId **string** - ID of the user to create the playlist for.
* $data **array\|object** - Data for the new playlist.
    * name **string** Required. Name of the playlist.
    * public **bool** Optional. Whether the playlist should be public or not.

#### Return values

* **array\|object** The new playlist. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::deleteMyTracks()

```
boolean SpotifyWebAPI\SpotifyWebAPI::deleteMyTracks($tracks)
```

Delete tracks from current user's Spotify library. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/remove-tracks-user/](https://developer.spotify.com/web-api/remove-tracks-user/)

#### Arguments

* $tracks **string\|array** - ID(s) of the track(s) to delete.

#### Return values

* **boolean** Whether the tracks was successfully deleted.

### SpotifyWebAPI\SpotifyWebAPI::deletePlaylistTracks()

```
string|boolean SpotifyWebAPI\SpotifyWebAPI::deletePlaylistTracks(string $userId, string $playlistId, array $tracks, string $snapshotId)
```

Delete tracks from a playlist and retrieve a new snapshot ID. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/remove-tracks-playlist/](https://developer.spotify.com/web-api/remove-tracks-playlist/)

#### Arguments

* $userId **string** - ID of the user who owns the playlist.
* $playlistId **string** - ID of the playlist to delete tracks from.
* $tracks **array** - Tracks to delete and optional position in the playlist where the track is located.
    * id **string** Required. Spotify track ID.
    * position **array** Optional. Position of the track in the playlist.
* $snapshotId **string** - Optional. The playlist's snapshot ID.

#### Return values

* **string\|boolean** A new snapshot ID or false if the tracks weren't deleted.

### SpotifyWebAPI\SpotifyWebAPI::getAlbum()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getAlbum(string $albumId)
```

Get a album. <br>
[https://developer.spotify.com/web-api/get-album/](https://developer.spotify.com/web-api/get-album/)

#### Arguments

* $albumId **string** - ID of the album.

#### Return values

* **array\|object** The requested album. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getAlbums()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getAlbums(array $albumIds)
```

Get multiple albums. <br>
[https://developer.spotify.com/web-api/get-several-albums/](https://developer.spotify.com/web-api/get-several-albums/)

#### Arguments

* $albumIds **array** - ID of the albums.

#### Return values

* **array\|object** The requested albums. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks(string $albumId, array|object $options)
```

Get a album's tracks. <br>
[https://developer.spotify.com/web-api/get-several-albums/](https://developer.spotify.com/web-api/get-several-albums/)

#### Arguments

* $albumId **string** - ID of the album.
* $options **array\|object** - Optional. Options for the tracks.
    * limit **int** Optional. Limit the number of tracks.
    * offset **int** Optional. Number of tracks to skip.

#### Return values

* **array\|object** The requested album tracks. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getArtist()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getArtist(string $artistId)
```

Get an artist. <br>
[https://developer.spotify.com/web-api/get-artist/](https://developer.spotify.com/web-api/get-artist/)

#### Arguments

* $artistId **string** - ID of the artist.

#### Return values

* **array\|object** The requested artist. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getArtists()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getArtists(array $artistIds)
```

Get multiple artists. <br>
[https://developer.spotify.com/web-api/get-several-artists/](https://developer.spotify.com/web-api/get-several-artists/)

#### Arguments

* $artistIds **array** - ID of the artists.

#### Return values

* **array\|object** The requested artists. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getArtistRelatedArtists()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getArtistRelatedArtists(string $artistId)
```

Get an artist's related artists. <br>
[https://developer.spotify.com/web-api/get-related-artists/](https://developer.spotify.com/web-api/get-related-artists/)

#### Arguments

* $artistId **string** - ID of the artist.

#### Return values

* **array\|object** The artist's related artists. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums(string $artistId, array|object $options)
```

Get an artist's albums. <br>
[https://developer.spotify.com/web-api/get-artists-albums/](https://developer.spotify.com/web-api/get-artists-albums/)

#### Arguments

* $artistId **string** - ID of the artist.
* $options **array\|object** - Optional. Options for the albums.
    * album_type **array** Optional. Album types to return. If omitted, all album types will be returned.
    * market **string** Optional. A ISO 3166-1 alpha-2 country code. Limit the results to tracks that are playable in this market.
    * limit **int** Optional. Limit the number of albums.
    * offset **int** Optional. Number of albums to skip.

#### Return values

* **array\|object** The artist's albums. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getArtistTopTracks()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getArtistTopTracks(string $artistId, string $country)
```

Get an artist's top tracks in a country. <br>
[https://developer.spotify.com/web-api/get-artists-top-tracks/](https://developer.spotify.com/web-api/get-artists-top-tracks/)

#### Arguments

* $artistId **string** - ID of the artist.
* $country **string** - An ISO 3166-1 alpha-2 country code specifying the country to get the top tracks for.

#### Return values

* **array\|object** The artist's top tracks. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getFeaturedPlaylists()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getFeaturedPlaylists(array|object $options)
```

Get Spotify featured playlists. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-list-featured-playlists/](https://developer.spotify.com/web-api/get-list-featured-playlists/)

#### Arguments

* $options **array\|object** - Optional. Options for the playlists.
    * locale **string** Optional. An lowercase ISO 639 language code and an uppercase ISO 3166-1 alpha-2 country code. Show playlists in this language.
    * country **string** Optional. An ISO 3166-1 alpha-2 country code. Show playlists from this country.
    * timestamp **string** Optional. A ISO 8601 timestamp. Show playlists relevant to this date and time.
    * limit **int** Optional. Limit the number of playlists.
    * offset **int** Optional. Number of playlists to skip.

#### Return values

* **array\|object** The featured playlists. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getNewReleases()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getNewReleases(array|object $options)
```

Get new releases. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-list-new-releases/](https://developer.spotify.com/web-api/get-list-new-releases/)

#### Arguments

* $options **array\|object** - Optional. Options for the items.
    * country **string** Optional. An ISO 3166-1 alpha-2 country code. Show items relevant to this country.
    * limit **int** Optional. Limit the number of items.
    * offset **int** Optional. Number of items to skip.

#### Return values

* **array\|object** The new releases. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getMySavedTracks()

```
array SpotifyWebAPI\SpotifyWebAPI::getMySavedTracks(array|object $options)
```

Get the current user’s saved tracks. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-users-saved-tracks/](https://developer.spotify.com/web-api/get-users-saved-tracks/)

#### Arguments

* $options **array\|object** - Optional. Options for the tracks.
    * limit **int** Optional. Limit the number of tracks.
    * offset **int** Optional. Number of tracks to skip.

#### Return values

* **array\|object** The user's saved tracks. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getReturnAssoc()

```
boolean SpotifyWebAPI\SpotifyWebAPI::getReturnAssoc()
```

Get the return type for the Request body element.

### SpotifyWebAPI\SpotifyWebAPI::getTrack()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getTrack(string $trackId)
```

Get a track. <br>
[https://developer.spotify.com/web-api/get-track/](https://developer.spotify.com/web-api/get-track/)

#### Arguments

* $trackId **string** - ID of the track.

#### Return values

* **array\|object** The requested track. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getTracks()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getTracks(array $trackIds)
```

Get multiple tracks. <br>
[https://developer.spotify.com/web-api/get-several-tracks/](https://developer.spotify.com/web-api/get-several-tracks/)

#### Arguments

* $trackIds **array** - ID of the tracks.

#### Return values

* **array\|object** The requested tracks. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getUser()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getUser(string $userId)
```

Get a user. <br>
[https://developer.spotify.com/web-api/get-users-profile/](https://developer.spotify.com/web-api/get-users-profile/)

#### Arguments

* $userId **string** - ID of the user.

#### Return values

* **array\|object** The requested user. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getUserPlaylists()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getUserPlaylists(string $userId, array|object $options)
```

Get a user's playlists. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-list-users-playlists/](https://developer.spotify.com/web-api/get-list-users-playlists/)

#### Arguments

* $userId **string** - ID of the user.
* $options **array\|object** - Optional. Options for the tracks.
    * limit **int** Optional. Limit the number of tracks.
    * offset **int** Optional. Number of tracks to skip.

#### Return values

* **array\|object** The user's playlists. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getUserPlaylist()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getUserPlaylist(string $userId, string $playlistId, array|object $options)
```

Get a user's specific playlist. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-playlist/](https://developer.spotify.com/web-api/get-playlist/)

#### Arguments

* $userId **string** - ID of the user.
* $playlistId **string** - ID of the playlist.
* $options **array\|object** - Optional. Options for the playlist.
    * fields **array** Optional. A list of fields to return. See Spotify docs for more info.

#### Return values

* **array\|object** The user's playlist. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::getUserPlaylistTracks()

```
array|object SpotifyWebAPI\SpotifyWebAPI::getUserPlaylistTracks(string $userId, string $playlistId, array|object $options)
```

Get the tracks in a user's playlist. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-playlists-tracks/](https://developer.spotify.com/web-api/get-playlists-tracks/)

#### Arguments

* $userId **string** - ID of the user.
* $playlistId **string** - ID of the playlist.
* $options **array\|object** - Optional. Options for the tracks.
    * fields **array** Optional. A list of fields to return. See Spotify docs for more info.
    * limit **int** Optional. Limit the number of tracks.
    * offset **int** Optional. Number of tracks to skip.

#### Return values

* **array\|object** The tracks in the playlist. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::me()

```
array|object SpotifyWebAPI\SpotifyWebAPI::me()
```

Get the currently authenticated user. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/get-current-users-profile/](https://developer.spotify.com/web-api/get-current-users-profile/)

#### Return values

* **array\|object** The currently authenticated user. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::myTracksContains()

```
array SpotifyWebAPI\SpotifyWebAPI::myTracksContains(string|array $tracks)
```

Check if the tracks is saved in the current user's Spotify library. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/check-users-saved-tracks/](https://developer.spotify.com/web-api/check-users-saved-tracks/)

#### Arguments

* $tracks **string\|array** - ID(s) of the track(s) to check for.

#### Return values

* **array** Whether each track is saved.

### SpotifyWebAPI\SpotifyWebAPI::replacePlaylistTracks()

```
boolean SpotifyWebAPI\SpotifyWebAPI::replacePlaylistTracks(string $userId, string $playlistId, string|array $tracks)
```

Replace all tracks in a user's playlist with new ones. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/replace-playlists-tracks/](https://developer.spotify.com/web-api/replace-playlists-tracks/)

#### Arguments

* $userId **string** - ID of the user.
* $playlistId **string** - ID of the playlist.
* $tracks **string\|array** - ID(s) of the track(s) to add.

#### Return values

* **boolean** Whether the tracks was successfully replaced.

### SpotifyWebAPI\SpotifyWebAPI::search()

```
array|object SpotifyWebAPI\SpotifyWebAPI::search(string $query, string|array $type, array|object $options)
```

Search for an item. <br>
Requires a valid access token if market=from_token is used. <br>
[https://developer.spotify.com/web-api/search-item/](https://developer.spotify.com/web-api/search-item/)

#### Arguments

* $query **string** - The term to search for.
* $type **string\|array** - The type of item to search for; &quot;album&quot;, &quot;artist&quot;, or &quot;track&quot;.
* $options **array\|object** - Optional. Options for the search.
    * market **string** Optional. A ISO 3166-1 alpha-2 country code. Limit the results to items that are playable in this market.
    * limit **int** Optional. Limit the number of items.
    * offset **int** Optional. Number of items to skip.

#### Return values

* **array\|object** The search results. Type is controlled by [SpotifyWebAPI::setReturnAssoc()](#spotifywebapispotifywebapisetreturnassoc).

### SpotifyWebAPI\SpotifyWebAPI::setAccessToken()

```
void SpotifyWebAPI\SpotifyWebAPI::setAccessToken(string $accessToken)
```

Set the access token to use.

#### Arguments

* $accessToken **string** - The access token.

### SpotifyWebAPI\SpotifyWebAPI::updateUserPlaylist()

```
boolean SpotifyWebAPI\SpotifyWebAPI::updateUserPlaylist($userId, $playlistId, array|object $data)
```

Update the details of a user's playlist. <br>
Requires a valid access token. <br>
[https://developer.spotify.com/web-api/change-playlist-details/](https://developer.spotify.com/web-api/change-playlist-details/)

#### Arguments

* $userId **mixed**
* $playlistId **mixed**
* $data **array\|object** - Data for the new playlist.
    * name **string** Required. Name of the playlist.
    * public **bool** Optional. Whether the playlist should be public or not.

#### Return values

* **boolean** Whether the playlist was successfully updated.

### SpotifyWebAPI\SpotifyWebAPI::setReturnAssoc()

```
void SpotifyWebAPI\SpotifyWebAPI::setReturnAssoc(boolean $returnAssoc)
```

Set the return type for the Request body element.

#### Arguments

* $returnAssoc **boolean** - Whether to return an associative array or not.
