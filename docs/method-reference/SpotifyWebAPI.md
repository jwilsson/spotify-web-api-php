# SpotifyWebAPI

## Constants
* **RETURN_ASSOC**
* **RETURN_OBJECT**

## Methods
### __construct


```php
SpotifyWebAPI::__construct($options, $session, $request)
```

Constructor<br>
Set options and class instances to use.

#### Arguments
* `$options` **array\|object** - Optional. Options to set.
* `$session` **\SpotifyWebAPI\Session** - Optional. The Session object to use.
* `$request` **\SpotifyWebAPI\Request** - Optional. The Request object to use.


---
### addMyAlbums


```php
SpotifyWebAPI::addMyAlbums($albums)
```

Add albums to the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/save-albums-user/](https://developer.spotify.com/documentation/web-api/reference/library/save-albums-user/)

#### Arguments
* `$albums` **string\|array** - ID(s) or Spotify URI(s) of the album(s) to add.

#### Return values
* **boolean** Whether the albums was successfully added.

---
### addMyShows


```php
SpotifyWebAPI::addMyShows($shows)
```

Add shows to the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/save-shows-user/](https://developer.spotify.com/documentation/web-api/reference/library/save-shows-user/)

#### Arguments
* `$shows` **string\|array** - ID(s) or Spotify URI(s) of the show(s) to add.

#### Return values
* **boolean** Whether the shows was successfully added.

---
### addMyTracks


```php
SpotifyWebAPI::addMyTracks($tracks)
```

Add tracks to the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/save-tracks-user/](https://developer.spotify.com/documentation/web-api/reference/library/save-tracks-user/)

#### Arguments
* `$tracks` **string\|array** - ID(s) or Spotify URI(s) of the track(s) to add.

#### Return values
* **boolean** Whether the tracks was successfully added.

---
### addPlaylistTracks


```php
SpotifyWebAPI::addPlaylistTracks($playlistId, $tracks, $options)
```

Add tracks to a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/add-tracks-to-playlist/](https://developer.spotify.com/documentation/web-api/reference/playlists/add-tracks-to-playlist/)

#### Arguments
* `$playlistId` **string** - ID of the playlist to add tracks to.
* `$tracks` **string\|array** - ID(s) or Spotify URI(s) of the track(s) to add.
* `$options` **array\|object** - Optional. Options for the new tracks.
    * int position Optional. Zero-based track position in playlist. Tracks will be appened if omitted or false.


#### Return values
* **boolean** Whether the tracks was successfully added.

---
### changeMyDevice


```php
SpotifyWebAPI::changeMyDevice($options)
```

Change the current user's playback device.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/transfer-a-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/transfer-a-users-playback/)

#### Arguments
* `$options` **array\|object** - Options for the playback transfer.
    * string\|array device_ids Required. ID of the device to switch to.
    * bool play Optional. Whether to start playing on the new device


#### Return values
* **boolean** Whether the playback device was successfully changed.

---
### changeVolume


```php
SpotifyWebAPI::changeVolume($options)
```

Change playback volume for the current user.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/set-volume-for-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/set-volume-for-users-playback/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playback volume.
    * int volume_percent Required. The volume to set.
    * string device_id Optional. ID of the device to target.


#### Return values
* **boolean** Whether the playback volume was successfully changed.

---
### createPlaylist


```php
SpotifyWebAPI::createPlaylist($options)
```

Create a new playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/create-playlist/](https://developer.spotify.com/documentation/web-api/reference/playlists/create-playlist/)

#### Arguments
* `$options` **array\|object** - Options for the new playlist.
    * string name Required. Name of the playlist.
    * bool public Optional. Whether the playlist should be public or not.


#### Return values
* **array\|object** The new playlist. Type is controlled by the `return_assoc` option.

---
### currentUserFollows


```php
SpotifyWebAPI::currentUserFollows($type, $ids)
```

Check to see if the current user is following one or more artists or other Spotify users.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/check-current-user-follows/](https://developer.spotify.com/documentation/web-api/reference/follow/check-current-user-follows/)

#### Arguments
* `$type` **string** - The type to check: either &#039;artist&#039; or &#039;user&#039;.
* `$ids` **string\|array** - ID(s) or Spotify URI(s) of the user(s) or artist(s) to check for.

#### Return values
* **array** Whether each user or artist is followed.

---
### deleteMyAlbums


```php
SpotifyWebAPI::deleteMyAlbums($albums)
```

Delete albums from current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/remove-albums-user/](https://developer.spotify.com/documentation/web-api/reference/library/remove-albums-user/)

#### Arguments
* `$albums` **string\|array** - ID(s) or Spotify URI(s) of the album(s) to delete.

#### Return values
* **boolean** Whether the albums was successfully deleted.

---
### deleteMyShows


```php
SpotifyWebAPI::deleteMyShows($shows)
```

Delete shows from current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/remove-shows-user/](https://developer.spotify.com/documentation/web-api/reference/library/remove-shows-user/)

#### Arguments
* `$shows` **string\|array** - ID(s) or Spotify URI(s) of the show(s) to delete.

#### Return values
* **boolean** Whether the shows was successfully deleted.

---
### deleteMyTracks


```php
SpotifyWebAPI::deleteMyTracks($tracks)
```

Delete tracks from current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/remove-tracks-user/](https://developer.spotify.com/documentation/web-api/reference/library/remove-tracks-user/)

#### Arguments
* `$tracks` **string\|array** - ID(s) or Spotify URI(s) of the track(s) to delete.

#### Return values
* **boolean** Whether the tracks was successfully deleted.

---
### deletePlaylistTracks


```php
SpotifyWebAPI::deletePlaylistTracks($playlistId, $tracks, $snapshotId)
```

Delete tracks from a playlist and retrieve a new snapshot ID.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/remove-tracks-playlist/](https://developer.spotify.com/documentation/web-api/reference/playlists/remove-tracks-playlist/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to delete tracks from.
* `$tracks` **array** - An array with the key &quot;tracks&quot; containing arrays or objects with tracks to delete.
Or an array with the key &quot;positions&quot; containing integer positions of the tracks to delete.
If the &quot;tracks&quot; key is used, the following fields are also available:
    * string id Required. Track ID or Spotify URI.
    * int\|array positions Optional. The track&#039;s position(s) in the playlist.

* `$snapshotId` **string** - Required when $tracks[&#039;positions&#039;] is used, optional otherwise.
The playlist&#039;s snapshot ID.

#### Return values
* **string\|boolean** A new snapshot ID or false if the tracks weren&#039;t successfully deleted.

---
### followArtistsOrUsers


```php
SpotifyWebAPI::followArtistsOrUsers($type, $ids)
```

Add the current user as a follower of one or more artists or other Spotify users.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/follow-artists-users/](https://developer.spotify.com/documentation/web-api/reference/follow/follow-artists-users/)

#### Arguments
* `$type` **string** - The type to check: either &#039;artist&#039; or &#039;user&#039;.
* `$ids` **string\|array** - ID(s) or Spotify URI(s) of the user(s) or artist(s) to follow.

#### Return values
* **boolean** Whether the artist or user was successfully followed.

---
### followPlaylist


```php
SpotifyWebAPI::followPlaylist($playlistId, $options)
```

Add the current user as a follower of a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/follow-playlist/](https://developer.spotify.com/documentation/web-api/reference/follow/follow-playlist/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to follow.
* `$options` **array\|object** - Optional. Options for the followed playlist.
    * bool public Optional. Whether the playlist should be followed publicly or not.


#### Return values
* **boolean** Whether the playlist was successfully followed.

---
### followPlaylistForCurrentUser

_Deprecated_

```php
SpotifyWebAPI::followPlaylistForCurrentUser($playlistId, $options)
```

Use SpotifyWebAPI::followPlaylist() instead.

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to follow.
* `$options` **array\|object** - Optional. Options for the followed playlist.
    * bool public Optional. Whether the playlist should be followed publicly or not.


#### Return values
* **boolean** Whether the playlist was successfully followed.

---
### getAlbum


```php
SpotifyWebAPI::getAlbum($albumId, $options)
```

Get a album.<br>
[https://developer.spotify.com/documentation/web-api/reference/albums/get-album/](https://developer.spotify.com/documentation/web-api/reference/albums/get-album/)

#### Arguments
* `$albumId` **string** - ID or Spotify URI of the album.
* `$options` **array\|object** - Optional. Options for the album.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The requested album. Type is controlled by the `return_assoc` option.

---
### getAlbums


```php
SpotifyWebAPI::getAlbums($albumIds, $options)
```

Get multiple albums.<br>
[https://developer.spotify.com/documentation/web-api/reference/albums/get-several-albums/](https://developer.spotify.com/documentation/web-api/reference/albums/get-several-albums/)

#### Arguments
* `$albumIds` **array** - IDs or Spotify URIs of the albums.
* `$options` **array\|object** - Optional. Options for the albums.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The requested albums. Type is controlled by the `return_assoc` option.

---
### getAlbumTracks


```php
SpotifyWebAPI::getAlbumTracks($albumId, $options)
```

Get an album's tracks.<br>
[https://developer.spotify.com/documentation/web-api/reference/albums/get-albums-tracks/](https://developer.spotify.com/documentation/web-api/reference/albums/get-albums-tracks/)

#### Arguments
* `$albumId` **string** - ID or Spotify URI of the album.
* `$options` **array\|object** - Optional. Options for the tracks.
    * int limit Optional. Limit the number of tracks.
    * int offset Optional. Number of tracks to skip.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The requested album tracks. Type is controlled by the `return_assoc` option.

---
### getArtist


```php
SpotifyWebAPI::getArtist($artistId)
```

Get an artist.<br>
[https://developer.spotify.com/documentation/web-api/reference/artists/get-artist/](https://developer.spotify.com/documentation/web-api/reference/artists/get-artist/)

#### Arguments
* `$artistId` **string** - ID or Spotify URI of the artist.

#### Return values
* **array\|object** The requested artist. Type is controlled by the `return_assoc` option.

---
### getArtists


```php
SpotifyWebAPI::getArtists($artistIds)
```

Get multiple artists.<br>
[https://developer.spotify.com/documentation/web-api/reference/artists/get-several-artists/](https://developer.spotify.com/documentation/web-api/reference/artists/get-several-artists/)

#### Arguments
* `$artistIds` **array** - IDs or Spotify URIs of the artists.

#### Return values
* **array\|object** The requested artists. Type is controlled by the `return_assoc` option.

---
### getArtistRelatedArtists


```php
SpotifyWebAPI::getArtistRelatedArtists($artistId)
```

Get an artist's related artists.<br>
[https://developer.spotify.com/documentation/web-api/reference/artists/get-related-artists/](https://developer.spotify.com/documentation/web-api/reference/artists/get-related-artists/)

#### Arguments
* `$artistId` **string** - ID or Spotify URI of the artist.

#### Return values
* **array\|object** The artist&#039;s related artists. Type is controlled by the `return_assoc` option.

---
### getArtistAlbums


```php
SpotifyWebAPI::getArtistAlbums($artistId, $options)
```

Get an artist's albums.<br>
[https://developer.spotify.com/documentation/web-api/reference/artists/get-artists-albums/](https://developer.spotify.com/documentation/web-api/reference/artists/get-artists-albums/)

#### Arguments
* `$artistId` **string** - ID or Spotify URI of the artist.
* `$options` **array\|object** - Optional. Options for the albums.
    * string\|array album_type Optional. Album type(s) to return. If omitted, all album types will be returned.
    * string market Optional. Limit the results to items that are playable in this market, for example SE.
    * int limit Optional. Limit the number of albums.
    * int offset Optional. Number of albums to skip.


#### Return values
* **array\|object** The artist&#039;s albums. Type is controlled by the `return_assoc` option.

---
### getArtistTopTracks


```php
SpotifyWebAPI::getArtistTopTracks($artistId, $options)
```

Get an artist's top tracks in a country.<br>
[https://developer.spotify.com/documentation/web-api/reference/artists/get-artists-top-tracks/](https://developer.spotify.com/documentation/web-api/reference/artists/get-artists-top-tracks/)

#### Arguments
* `$artistId` **string** - ID or Spotify URI of the artist.
* `$options` **array\|object** - Options for the tracks.
    * string $country Required. An ISO 3166-1 alpha-2 country code specifying the country to get the top tracks for.


#### Return values
* **array\|object** The artist&#039;s top tracks. Type is controlled by the `return_assoc` option.

---
### getAudioFeatures


```php
SpotifyWebAPI::getAudioFeatures($trackIds)
```

Get track audio features.<br>
[https://developer.spotify.com/documentation/web-api/reference/tracks/get-several-audio-features/](https://developer.spotify.com/documentation/web-api/reference/tracks/get-several-audio-features/)

#### Arguments
* `$trackIds` **array** - IDs or Spotify URIs of the tracks.

#### Return values
* **array\|object** The tracks&#039; audio features. Type is controlled by the `return_assoc` option.

---
### getAudioAnalysis


```php
SpotifyWebAPI::getAudioAnalysis($trackId)
```

Get audio analysis for track.<br>
[https://developer.spotify.com/documentation/web-api/reference/tracks/get-audio-analysis/](https://developer.spotify.com/documentation/web-api/reference/tracks/get-audio-analysis/)

#### Arguments
* `$trackId` **string** - ID or Spotify URI of the track.

#### Return values
* **object** The track&#039;s audio analysis. Type is controlled by the `return_assoc` option.

---
### getCategoriesList


```php
SpotifyWebAPI::getCategoriesList($options)
```

Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s "Browse" tab).<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-list-categories/](https://developer.spotify.com/documentation/web-api/reference/browse/get-list-categories/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the categories.
    * string locale Optional. Language to show categories in, for example sv_SE.
    * string country Optional. An ISO 3166-1 alpha-2 country code. Show categories from this country.
    * int limit Optional. Limit the number of categories.
    * int offset Optional. Number of categories to skip.


#### Return values
* **array\|object** The list of categories. Type is controlled by the `return_assoc` option.

---
### getCategory


```php
SpotifyWebAPI::getCategory($categoryId, $options)
```

Get a single category used to tag items in Spotify (on, for example, the Spotify player’s "Browse" tab).<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-category/](https://developer.spotify.com/documentation/web-api/reference/browse/get-category/)

#### Arguments
* `$categoryId` **string** - The Spotify ID of the category.
* `$options` **array\|object** - Optional. Options for the category.
    * string locale Optional. Language to show category in, for example sv_SE.
    * string country Optional. An ISO 3166-1 alpha-2 country code. Show category from this country.


#### Return values
* **array\|object** The category. Type is controlled by the `return_assoc` option.

---
### getCategoryPlaylists


```php
SpotifyWebAPI::getCategoryPlaylists($categoryId, $options)
```

Get a list of Spotify playlists tagged with a particular category.<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-categorys-playlists/](https://developer.spotify.com/documentation/web-api/reference/browse/get-categorys-playlists/)

#### Arguments
* `$categoryId` **string** - The Spotify ID of the category.
* `$options` **array\|object** - Optional. Options for the category&#039;s playlists.
    * string country Optional. An ISO 3166-1 alpha-2 country code. Show category playlists from this country.
    * int limit Optional. Limit the number of playlists.
    * int offset Optional. Number of playlists to skip.


#### Return values
* **array\|object** The list of playlists. Type is controlled by the `return_assoc` option.

---
### getEpisode


```php
SpotifyWebAPI::getEpisode($episodeId, $options)
```

Get an episode.<br>
[https://developer.spotify.com/documentation/web-api/reference/episodes/get-an-episode/](https://developer.spotify.com/documentation/web-api/reference/episodes/get-an-episode/)

#### Arguments
* `$episodeId` **string** - ID or Spotify URI of the episode.
* `$options` **array\|object** - Optional. Options for the episode.
    * string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.


#### Return values
* **array\|object** The requested episode. Type is controlled by the `return_assoc` option.

---
### getEpisodes


```php
SpotifyWebAPI::getEpisodes($episodeIds, $options)
```

Get multiple episodes.<br>
[https://developer.spotify.com/documentation/web-api/reference/episodes/get-several-episodes/](https://developer.spotify.com/documentation/web-api/reference/episodes/get-several-episodes/)

#### Arguments
* `$episodeIds` **array** - IDs or Spotify URIs of the episodes.
* `$options` **array\|object** - Optional. Options for the episodes.
    * string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.


#### Return values
* **array\|object** The requested episodes. Type is controlled by the `return_assoc` option.

---
### getFeaturedPlaylists


```php
SpotifyWebAPI::getFeaturedPlaylists($options)
```

Get Spotify featured playlists.<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-list-featured-playlists/](https://developer.spotify.com/documentation/web-api/reference/browse/get-list-featured-playlists/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playlists.
    * string locale Optional. Language to show playlists in, for example sv_SE.
    * string country Optional. An ISO 3166-1 alpha-2 country code. Show playlists from this country.
    * string timestamp Optional. A ISO 8601 timestamp. Show playlists relevant to this date and time.
    * int limit Optional. Limit the number of playlists.
    * int offset Optional. Number of playlists to skip.


#### Return values
* **array\|object** The featured playlists. Type is controlled by the `return_assoc` option.

---
### getGenreSeeds


```php
SpotifyWebAPI::getGenreSeeds()
```

Get a list of possible seed genres.<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations/](https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations/)


#### Return values
* **array\|object** All possible seed genres. Type is controlled by the `return_assoc` option.

---
### getLastResponse


```php
SpotifyWebAPI::getLastResponse()
```

Get the latest full response from the Spotify API.


#### Return values
* **array** Response data.
    * array\|object body The response body. Type is controlled by the `return_assoc` option.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### getMyCurrentTrack


```php
SpotifyWebAPI::getMyCurrentTrack($options)
```

Get the current user’s currently playing track.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/get-the-users-currently-playing-track/](https://developer.spotify.com/documentation/web-api/reference/player/get-the-users-currently-playing-track/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the track.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
    * string\|array additional_types Optional. Types of media to return info about.


#### Return values
* **array\|object** The user&#039;s currently playing track. Type is controlled by the `return_assoc` option.

---
### getMyDevices


```php
SpotifyWebAPI::getMyDevices()
```

Get the current user’s devices.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/get-a-users-available-devices/](https://developer.spotify.com/documentation/web-api/reference/player/get-a-users-available-devices/)


#### Return values
* **array\|object** The user&#039;s devices. Type is controlled by the `return_assoc` option.

---
### getMyCurrentPlaybackInfo


```php
SpotifyWebAPI::getMyCurrentPlaybackInfo($options)
```

Get the current user’s current playback information.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/get-information-about-the-users-current-playback/](https://developer.spotify.com/documentation/web-api/reference/player/get-information-about-the-users-current-playback/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the info.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
    * string\|array additional_types Optional. Types of media to return info about.


#### Return values
* **array\|object** The user&#039;s playback information. Type is controlled by the `return_assoc` option.

---
### getMyPlaylists


```php
SpotifyWebAPI::getMyPlaylists($options)
```

Get the current user’s playlists.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/get-a-list-of-current-users-playlists/](https://developer.spotify.com/documentation/web-api/reference/playlists/get-a-list-of-current-users-playlists/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playlists.
    * int limit Optional. Limit the number of playlists.
    * int offset Optional. Number of playlists to skip.


#### Return values
* **array\|object** The user&#039;s playlists. Type is controlled by the `return_assoc` option.

---
### getMyRecentTracks


```php
SpotifyWebAPI::getMyRecentTracks($options)
```

Get the current user’s recently played tracks.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/get-recently-played/](https://developer.spotify.com/documentation/web-api/reference/player/get-recently-played/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the tracks.
    * int limit Optional. Number of tracks to return.
    * string after Optional. Unix timestamp in ms (13 digits). Returns all items after this position.
    * string before Optional. Unix timestamp in ms (13 digits). Returns all items before this position.


#### Return values
* **array\|object** The most recently played tracks. Type is controlled by the `return_assoc` option.

---
### getMySavedAlbums


```php
SpotifyWebAPI::getMySavedAlbums($options)
```

Get the current user’s saved albums.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-albums/](https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-albums/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the albums.
    * int limit Optional. Number of albums to return.
    * int offset Optional. Number of albums to skip.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The user&#039;s saved albums. Type is controlled by the `return_assoc` option.

---
### getMySavedTracks


```php
SpotifyWebAPI::getMySavedTracks($options)
```

Get the current user’s saved tracks.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-tracks/](https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-tracks/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the tracks.
    * int limit Optional. Limit the number of tracks.
    * int offset Optional. Number of tracks to skip.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The user&#039;s saved tracks. Type is controlled by the `return_assoc` option.

---
### getMySavedShows


```php
SpotifyWebAPI::getMySavedShows($options)
```

Get the current user’s saved shows.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-shows/](https://developer.spotify.com/documentation/web-api/reference/library/get-users-saved-shows/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the shows.
    * int limit Optional. Limit the number of shows.
    * int offset Optional. Number of shows to skip.


#### Return values
* **array\|object** The user&#039;s saved shows. Type is controlled by the `return_assoc` option.

---
### getMyTop


```php
SpotifyWebAPI::getMyTop($type, $options)
```

Get the current user's top tracks or artists.<br>
[https://developer.spotify.com/documentation/web-api/reference/personalization/get-users-top-artists-and-tracks/](https://developer.spotify.com/documentation/web-api/reference/personalization/get-users-top-artists-and-tracks/)

#### Arguments
* `$type` **string** - The type of entity to fetch.
* `$options` **array** - Optional. Options for the results.
    * int limit Optional. Limit the number of tracks.
    * int offset Optional. Number of tracks to skip.
    * string time_range Optional. Over what time frame the data is calculated. See Spotify API docs for more info.


#### Return values
* **array\|object** A list of the requested top entity. Type is controlled by the `return_assoc` option.

---
### getNewReleases


```php
SpotifyWebAPI::getNewReleases($options)
```

Get new releases.<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-list-new-releases/](https://developer.spotify.com/documentation/web-api/reference/browse/get-list-new-releases/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the items.
    * string country Optional. An ISO 3166-1 alpha-2 country code. Show items relevant to this country.
    * int limit Optional. Limit the number of items.
    * int offset Optional. Number of items to skip.


#### Return values
* **array\|object** The new releases. Type is controlled by the `return_assoc` option.

---
### getPlaylist


```php
SpotifyWebAPI::getPlaylist($playlistId, $options)
```

Get a specific playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/get-playlist/](https://developer.spotify.com/documentation/web-api/reference/playlists/get-playlist/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist.
* `$options` **array\|object** - Optional. Options for the playlist.
    * string\|array fields Optional. A list of fields to return. See Spotify docs for more info.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The user&#039;s playlist. Type is controlled by the `return_assoc` option.

---
### getPlaylistTracks


```php
SpotifyWebAPI::getPlaylistTracks($playlistId, $options)
```

Get the tracks in a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/get-playlists-tracks/](https://developer.spotify.com/documentation/web-api/reference/playlists/get-playlists-tracks/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist.
* `$options` **array\|object** - Optional. Options for the tracks.
    * string\|array fields Optional. A list of fields to return. See Spotify docs for more info.
    * int limit Optional. Limit the number of tracks.
    * int offset Optional. Number of tracks to skip.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The tracks in the playlist. Type is controlled by the `return_assoc` option.

---
### getRecommendations


```php
SpotifyWebAPI::getRecommendations($options)
```

Get recommendations based on artists, tracks, or genres.<br>
[https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations/](https://developer.spotify.com/documentation/web-api/reference/browse/get-recommendations/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the recommendations.
    * int limit Optional. Limit the number of recommendations.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
    * mixed max_* Optional. Max value for one of the tunable track attributes.
    * mixed min_* Optional. Min value for one of the tunable track attributes.
    * array seed_artists Artist IDs to seed by.
    * array seed_genres Genres to seed by. Call SpotifyWebAPI::getGenreSeeds() for a complete list.
    * array seed_tracks Track IDs to seed by.
    * mixed target_* Optional. Target value for one of the tunable track attributes.


#### Return values
* **array\|object** The requested recommendations. Type is controlled by the `return_assoc` option.

---
### getReturnType

_Deprecated_

```php
SpotifyWebAPI::getReturnType()
```

Use the `return_assoc` option instead.


#### Return values
* **string** A value indicating if the response body is an object or associative array.

---
### getRequest


```php
SpotifyWebAPI::getRequest()
```

Get the Request object in use.


#### Return values
* **\SpotifyWebAPI\Request** The Request object in use.

---
### getShow


```php
SpotifyWebAPI::getShow($showId, $options)
```

Get a show.<br>
[https://developer.spotify.com/documentation/web-api/reference/shows/get-a-show/](https://developer.spotify.com/documentation/web-api/reference/shows/get-a-show/)

#### Arguments
* `$showId` **string** - ID or Spotify URI of the show.
* `$options` **array\|object** - Optional. Options for the show.
    * string market Optional. An ISO 3166-1 alpha-2 country code, limit results to shows available in that market.


#### Return values
* **array\|object** The requested show. Type is controlled by the `return_assoc` option.

---
### getShowEpisodes


```php
SpotifyWebAPI::getShowEpisodes($showId, $options)
```

Get a show's episodes.<br>
[https://developer.spotify.com/documentation/web-api/reference/shows/get-shows-episodes/](https://developer.spotify.com/documentation/web-api/reference/shows/get-shows-episodes/)

#### Arguments
* `$showId` **mixed**
* `$options` **array\|object** - Optional. Options for the episodes.
    * int limit Optional. Limit the number of episodes.
    * int offset Optional. Number of episodes to skip.
    * string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.


#### Return values
* **array\|object** The requested show episodes. Type is controlled by the `return_assoc` option.

---
### getShows


```php
SpotifyWebAPI::getShows($showIds, $options)
```

Get multiple shows.<br>
[https://developer.spotify.com/documentation/web-api/reference/shows/get-several-shows/](https://developer.spotify.com/documentation/web-api/reference/shows/get-several-shows/)

#### Arguments
* `$showIds` **array** - IDs or Spotify URIs of the shows.
* `$options` **array\|object** - Optional. Options for the shows.
    * string market Optional. An ISO 3166-1 alpha-2 country code, limit results to shows available in that market.


#### Return values
* **array\|object** The requested shows. Type is controlled by the `return_assoc` option.

---
### getTrack


```php
SpotifyWebAPI::getTrack($trackId, $options)
```

Get a track.<br>
[https://developer.spotify.com/documentation/web-api/reference/tracks/get-track/](https://developer.spotify.com/documentation/web-api/reference/tracks/get-track/)

#### Arguments
* `$trackId` **string** - ID or Spotify URI of the track.
* `$options` **array\|object** - Optional. Options for the track.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The requested track. Type is controlled by the `return_assoc` option.

---
### getTracks


```php
SpotifyWebAPI::getTracks($trackIds, $options)
```

Get multiple tracks.<br>
[https://developer.spotify.com/documentation/web-api/reference/tracks/get-several-tracks/](https://developer.spotify.com/documentation/web-api/reference/tracks/get-several-tracks/)

#### Arguments
* `$trackIds` **array** - IDs or Spotify URIs of the tracks.
* `$options` **array\|object** - Optional. Options for the tracks.
    * string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.


#### Return values
* **array\|object** The requested tracks. Type is controlled by the `return_assoc` option.

---
### getUser


```php
SpotifyWebAPI::getUser($userId)
```

Get a user.<br>
[https://developer.spotify.com/documentation/web-api/reference/users-profile/get-users-profile/](https://developer.spotify.com/documentation/web-api/reference/users-profile/get-users-profile/)

#### Arguments
* `$userId` **string** - ID or Spotify URI of the user.

#### Return values
* **array\|object** The requested user. Type is controlled by the `return_assoc` option.

---
### getUserFollowedArtists


```php
SpotifyWebAPI::getUserFollowedArtists($options)
```

Get the artists followed by the current user.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/get-followed/](https://developer.spotify.com/documentation/web-api/reference/follow/get-followed/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the artists.
    * int limit Optional. Limit the number of artists returned.
    * string after Optional. The last artist ID retrieved from the previous request.


#### Return values
* **array\|object** A list of artists. Type is controlled by the `return_assoc` option.

---
### getUserPlaylists


```php
SpotifyWebAPI::getUserPlaylists($userId, $options)
```

Get a user's playlists.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/get-list-users-playlists/](https://developer.spotify.com/documentation/web-api/reference/playlists/get-list-users-playlists/)

#### Arguments
* `$userId` **string** - ID or Spotify URI of the user.
* `$options` **array\|object** - Optional. Options for the tracks.
    * int limit Optional. Limit the number of tracks.
    * int offset Optional. Number of tracks to skip.


#### Return values
* **array\|object** The user&#039;s playlists. Type is controlled by the `return_assoc` option.

---
### me


```php
SpotifyWebAPI::me()
```

Get the currently authenticated user.<br>
[https://developer.spotify.com/documentation/web-api/reference/users-profile/get-current-users-profile/](https://developer.spotify.com/documentation/web-api/reference/users-profile/get-current-users-profile/)


#### Return values
* **array\|object** The currently authenticated user. Type is controlled by the `return_assoc` option.

---
### myAlbumsContains


```php
SpotifyWebAPI::myAlbumsContains($albums)
```

Check if albums are saved in the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-albums/](https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-albums/)

#### Arguments
* `$albums` **string\|array** - ID(s) or Spotify URI(s) of the album(s) to check for.

#### Return values
* **array** Whether each album is saved.

---
### myShowsContains


```php
SpotifyWebAPI::myShowsContains($shows)
```

Check if shows are saved in the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-shows/](https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-shows/)

#### Arguments
* `$shows` **string\|array** - ID(s) or Spotify URI(s) of the show(s) to check for.

#### Return values
* **array** Whether each show is saved.

---
### myTracksContains


```php
SpotifyWebAPI::myTracksContains($tracks)
```

Check if tracks are saved in the current user's Spotify library.<br>
[https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-tracks/](https://developer.spotify.com/documentation/web-api/reference/library/check-users-saved-tracks/)

#### Arguments
* `$tracks` **string\|array** - ID(s) or Spotify URI(s) of the track(s) to check for.

#### Return values
* **array** Whether each track is saved.

---
### next


```php
SpotifyWebAPI::next($deviceId)
```

Play the next track in the current users's queue.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-next-track/](https://developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-next-track/)

#### Arguments
* `$deviceId` **string** - Optional. ID of the device to target.

#### Return values
* **boolean** Whether the track was successfully skipped.

---
### pause


```php
SpotifyWebAPI::pause($deviceId)
```

Pause playback for the current user.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/pause-a-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/pause-a-users-playback/)

#### Arguments
* `$deviceId` **string** - Optional. ID of the device to pause on.

#### Return values
* **boolean** Whether the playback was successfully paused.

---
### play


```php
SpotifyWebAPI::play($deviceId, $options)
```

Start playback for the current user.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/start-a-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/start-a-users-playback/)

#### Arguments
* `$deviceId` **string** - Optional. ID of the device to play on.
* `$options` **array\|object** - Optional. Options for the playback.
    * string context_uri Optional. Spotify URI of the context to play, for example an album.
    * array uris Optional. Spotify track URIs to play.
    * object offset Optional. Indicates from where in the context playback should start.


#### Return values
* **boolean** Whether the playback was successfully started.

---
### previous


```php
SpotifyWebAPI::previous($deviceId)
```

Play the previous track in the current users's queue.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-previous-track/](https://developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-previous-track/)

#### Arguments
* `$deviceId` **string** - Optional. ID of the device to target.

#### Return values
* **boolean** Whether the track was successfully skipped.

---
### reorderPlaylistTracks


```php
SpotifyWebAPI::reorderPlaylistTracks($playlistId, $options)
```

Reorder the tracks in a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/reorder-playlists-tracks/](https://developer.spotify.com/documentation/web-api/reference/playlists/reorder-playlists-tracks/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist.
* `$options` **array\|object** - Options for the new tracks.
    * int range_start Required. Position of the first track to be reordered.
    * int range_length Optional. The amount of tracks to be reordered.
    * int insert_before Required. Position where the tracks should be inserted.
    * string snapshot_id Optional. The playlist&#039;s snapshot ID.


#### Return values
* **string\|boolean** A new snapshot ID or false if the tracks weren&#039;t successfully reordered.

---
### repeat


```php
SpotifyWebAPI::repeat($options)
```

Set repeat mode for the current user’s playback.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/set-repeat-mode-on-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/set-repeat-mode-on-users-playback/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playback repeat mode.
    * string state Required. The repeat mode. See Spotify docs for possible values.
    * string device_id Optional. ID of the device to target.


#### Return values
* **boolean** Whether the playback repeat mode was successfully changed.

---
### replacePlaylistTracks


```php
SpotifyWebAPI::replacePlaylistTracks($playlistId, $tracks)
```

Replace all tracks in a playlist with new ones.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/replace-playlists-tracks/](https://developer.spotify.com/documentation/web-api/reference/playlists/replace-playlists-tracks/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist.
* `$tracks` **string\|array** - ID(s) or Spotify URI(s) of the track(s) to add.

#### Return values
* **boolean** Whether the tracks was successfully replaced.

---
### search


```php
SpotifyWebAPI::search($query, $type, $options)
```

Search for an item.<br>
[https://developer.spotify.com/documentation/web-api/reference/search/search/](https://developer.spotify.com/documentation/web-api/reference/search/search/)

#### Arguments
* `$query` **string** - The term to search for.
* `$type` **string\|array** - The type of item to search for.
* `$options` **array\|object** - Optional. Options for the search.
    * string market Optional. Limit the results to items that are playable in this market, for example SE.
    * int limit Optional. Limit the number of items.
    * int offset Optional. Number of items to skip.


#### Return values
* **array\|object** The search results. Type is controlled by the `return_assoc` option.

---
### seek


```php
SpotifyWebAPI::seek($options)
```

Change playback position for the current user.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/seek-to-position-in-currently-playing-track/](https://developer.spotify.com/documentation/web-api/reference/player/seek-to-position-in-currently-playing-track/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playback seeking.
    * string position_ms Required. The position in milliseconds to seek to.
    * string device_id Optional. ID of the device to target.


#### Return values
* **boolean** Whether the playback position was successfully changed.

---
### setAccessToken


```php
SpotifyWebAPI::setAccessToken($accessToken)
```

Set the access token to use.

#### Arguments
* `$accessToken` **string** - The access token.

#### Return values
* **void** 

---
### setOptions


```php
SpotifyWebAPI::setOptions($options)
```

Set options

#### Arguments
* `$options` **array\|object** - Options to set.

#### Return values
* **void** 

---
### setReturnType

_Deprecated_

```php
SpotifyWebAPI::setReturnType($returnType)
```

Use the `return_assoc` option instead.

#### Arguments
* `$returnType` **string** - One of the SpotifyWebAPI::RETURN_* constants.

#### Return values
* **void** 

---
### setSession


```php
SpotifyWebAPI::setSession($session)
```

Set the Session object to use.

#### Arguments
* `$session` **\SpotifyWebAPI\Session** - The Session object.

#### Return values
* **void** 

---
### shuffle


```php
SpotifyWebAPI::shuffle($options)
```

Set shuffle mode for the current user’s playback.<br>
[https://developer.spotify.com/documentation/web-api/reference/player/toggle-shuffle-for-users-playback/](https://developer.spotify.com/documentation/web-api/reference/player/toggle-shuffle-for-users-playback/)

#### Arguments
* `$options` **array\|object** - Optional. Options for the playback shuffle mode.
    * bool state Required. The shuffle mode. See Spotify docs for possible values.
    * string device_id Optional. ID of the device to target.


#### Return values
* **boolean** Whether the playback shuffle mode was successfully changed.

---
### unfollowArtistsOrUsers


```php
SpotifyWebAPI::unfollowArtistsOrUsers($type, $ids)
```

Remove the current user as a follower of one or more artists or other Spotify users.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/unfollow-artists-users/](https://developer.spotify.com/documentation/web-api/reference/follow/unfollow-artists-users/)

#### Arguments
* `$type` **string** - The type to check: either &#039;artist&#039; or &#039;user&#039;.
* `$ids` **string\|array** - ID(s) or Spotify URI(s) of the user(s) or artist(s) to unfollow.

#### Return values
* **boolean** Whether the artist(s) or user(s) were successfully unfollowed.

---
### unfollowPlaylist


```php
SpotifyWebAPI::unfollowPlaylist($playlistId)
```

Remove the current user as a follower of a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/unfollow-playlist/](https://developer.spotify.com/documentation/web-api/reference/follow/unfollow-playlist/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to unfollow

#### Return values
* **boolean** Whether the playlist was successfully unfollowed.

---
### unfollowPlaylistForCurrentUser

_Deprecated_

```php
SpotifyWebAPI::unfollowPlaylistForCurrentUser($playlistId)
```

Use SpotifyWebAPI::unfollowPlaylist() instead.

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to unfollow

#### Return values
* **boolean** Whether the playlist was successfully unfollowed.

---
### updatePlaylist


```php
SpotifyWebAPI::updatePlaylist($playlistId, $options)
```

Update the details of a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/change-playlist-details/](https://developer.spotify.com/documentation/web-api/reference/playlists/change-playlist-details/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to update.
* `$options` **array\|object** - Options for the playlist.
    * collaborative bool Optional. Whether the playlist should be collaborative or not.
    * description string Optional. Description of the playlist.
    * name string Optional. Name of the playlist.
    * public bool Optional. Whether the playlist should be public or not.


#### Return values
* **boolean** Whether the playlist was successfully updated.

---
### updatePlaylistImage


```php
SpotifyWebAPI::updatePlaylistImage($playlistId, $imageData)
```

Update the image of a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/playlists/upload-custom-playlist-cover/](https://developer.spotify.com/documentation/web-api/reference/playlists/upload-custom-playlist-cover/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist to update.
* `$imageData` **string** - Base64 encoded JPEG image data, maximum 256 KB in size.

#### Return values
* **boolean** Whether the playlist was successfully updated.

---
### usersFollowPlaylist


```php
SpotifyWebAPI::usersFollowPlaylist($playlistId, $options)
```

Check if a set of users are following a playlist.<br>
[https://developer.spotify.com/documentation/web-api/reference/follow/check-user-following-playlist/](https://developer.spotify.com/documentation/web-api/reference/follow/check-user-following-playlist/)

#### Arguments
* `$playlistId` **string** - ID or Spotify URI of the playlist.
* `$options` **array\|object** - Options for the check.
    * ids string\|array Required. ID(s) or Spotify URI(s) of the user(s) to check for.


#### Return values
* **array** Whether each user is following the playlist.

---
