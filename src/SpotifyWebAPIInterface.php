<?php

namespace SpotifyWebAPI;

interface SpotifyWebAPIInterface
{
    /**
     * Add albums to the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-albums-user
     *
     * @param string|array $albums Album IDs or URIs to add.
     *
     * @return bool Whether the albums was successfully added.
     */
    public function addMyAlbums($albums);

    /**
     * Add episodes to the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-episodes-user
     *
     * @param string|array $episodes Episode IDs or URIs to add.
     *
     * @return bool Whether the episodes was successfully added.
     */
    public function addMyEpisodes($episodes);

    /**
     * Add shows to the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-shows-user
     *
     * @param string|array $shows Show IDs or URIs to add.
     *
     * @return bool Whether the shows was successfully added.
     */
    public function addMyShows($shows);

    /**
     * Add tracks to the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-tracks-user
     *
     * @param string|array $tracks Track IDs or URIs to add.
     *
     * @return bool Whether the tracks was successfully added.
     */
    public function addMyTracks($tracks);

    /**
     * Add tracks to a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-add-tracks-to-playlist
     *
     * @param string $playlistId ID of the playlist to add tracks to.
     * @param string|array $tracks Track IDs, track URIs, and episode URIs to add.
     * @param array|object $options Optional. Options for the new tracks.
     * - int position Optional. Zero-based track position in playlist. Tracks will be appened if omitted or false.
     *
     * @return string|bool A new snapshot ID or false if the tracks weren't successfully added.
     */
    public function addPlaylistTracks($playlistId, $tracks, $options = []);

    /**
     * Change the current user's playback device.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-transfer-a-users-playback
     *
     * @param array|object $options Options for the playback transfer.
     * - string|array device_ids Required. ID of the device to switch to.
     * - bool play Optional. Whether to start playing on the new device
     *
     * @return bool Whether the playback device was successfully changed.
     */
    public function changeMyDevice($options);

    /**
     * Change playback volume for the current user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-set-volume-for-users-playback
     *
     * @param array|object $options Optional. Options for the playback volume.
     * - int volume_percent Required. The volume to set.
     * - string device_id Optional. ID of the device to target.
     *
     * @return bool Whether the playback volume was successfully changed.
     */
    public function changeVolume($options);

    /**
     * Create a new playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-create-playlist
     *
     * @param array|object $options Options for the new playlist.
     * - string name Required. Name of the playlist.
     * - bool public Optional. Whether the playlist should be public or not.
     *
     * @return array|object The new playlist. Type is controlled by the `return_assoc` option.
     */
    public function createPlaylist($options);

    /**
     * Check to see if the current user is following one or more artists or other Spotify users.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-current-user-follows
     *
     * @param string $type The type to check: either 'artist' or 'user'.
     * @param string|array $ids IDs or URIs of the users or artists to check for.
     *
     * @return array Whether each user or artist is followed.
     */
    public function currentUserFollows($type, $ids);

    /**
     * Delete albums from the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-albums-user
     *
     * @param string|array $albums Album IDs or URIs to delete.
     *
     * @return bool Whether the albums was successfully deleted.
     */
    public function deleteMyAlbums($albums);

    /**
     * Delete episodes from the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-episodes-user
     *
     * @param string|array $episodes Episode IDs or URIs to delete.
     *
     * @return bool Whether the episodes was successfully deleted.
     */
    public function deleteMyEpisodes($episodes);

    /**
     * Delete shows from the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-shows-user
     *
     * @param string|array $shows Show IDs or URIs to delete.
     *
     * @return bool Whether the shows was successfully deleted.
     */
    public function deleteMyShows($shows);

    /**
     * Delete tracks from the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-tracks-user
     *
     * @param string|array $tracks Track IDs or URIs to delete.
     *
     * @return bool Whether the tracks was successfully deleted.
     */
    public function deleteMyTracks($tracks);

    /**
     * Delete tracks from a playlist and retrieve a new snapshot ID.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-tracks-playlist
     *
     * @param string $playlistId ID or URI of the playlist to delete tracks from.
     * @param array $tracks An array with the key "tracks" containing arrays or objects with tracks to delete.
     * Or an array with the key "positions" containing integer positions of the tracks to delete.
     * If the "tracks" key is used, the following fields are also available:
     * - string uri Required. Track ID, track URI, or episode URI.
     * - int|array positions Optional. The track's positions in the playlist.
     * @param string $snapshotId Required when `$tracks['positions']` is used, optional otherwise.
     * The playlist's snapshot ID.
     *
     * @return string|bool A new snapshot ID or false if the tracks weren't successfully deleted.
     */
    public function deletePlaylistTracks($playlistId, $tracks, $snapshotId = '');

    /**
     * Add the current user as a follower of one or more artists or other Spotify users.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-follow-artists-users
     *
     * @param string $type The type of ID to follow: either 'artist' or 'user'.
     * @param string|array $ids IDs or URIs of the users or artists to follow.
     *
     * @return bool Whether the artist or user was successfully followed.
     */
    public function followArtistsOrUsers($type, $ids);

    /**
     * Add the current user as a follower of a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-follow-playlist
     *
     * @param string $playlistId ID or URI of the playlist to follow.
     * @param array|object $options Optional. Options for the followed playlist.
     * - bool public Optional. Whether the playlist should be followed publicly or not.
     *
     * @return bool Whether the playlist was successfully followed.
     */
    public function followPlaylist($playlistId, $options = []);

    /**
     * Get an album.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-album
     *
     * @param string $albumId ID or URI of the album.
     * @param array|object $options Optional. Options for the album.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The requested album. Type is controlled by the `return_assoc` option.
     */
    public function getAlbum($albumId, $options = []);

    /**
     * Get multiple albums.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-albums
     *
     * @param array $albumIds IDs or URIs of the albums.
     * @param array|object $options Optional. Options for the albums.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The requested albums. Type is controlled by the `return_assoc` option.
     */
    public function getAlbums($albumIds, $options = []);

    /**
     * Get an album's tracks.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-albums-tracks
     *
     * @param string $albumId ID or URI of the album.
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks.
     * - int offset Optional. Number of tracks to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The requested album tracks. Type is controlled by the `return_assoc` option.
     */
    public function getAlbumTracks($albumId, $options = []);

    /**
     * Get an artist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artist
     *
     * @param string $artistId ID or URI of the artist.
     *
     * @return array|object The requested artist. Type is controlled by the `return_assoc` option.
     */
    public function getArtist($artistId);

    /**
     * Get multiple artists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-artists
     *
     * @param array $artistIds IDs or URIs of the artists.
     *
     * @return array|object The requested artists. Type is controlled by the `return_assoc` option.
     */
    public function getArtists($artistIds);

    /**
     * Get an artist's related artists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-related-artists
     *
     * @param string $artistId ID or URI of the artist.
     *
     * @return array|object The artist's related artists. Type is controlled by the `return_assoc` option.
     */
    public function getArtistRelatedArtists($artistId);

    /**
     * Get an artist's albums.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-albums
     *
     * @param string $artistId ID or URI of the artist.
     * @param array|object $options Optional. Options for the albums.
     * - string country Optional. Limit the results to items that are playable in this country, for example SE.
     * - string|array include_groups Optional. Album types to return. If omitted, all album types will be returned.
     * - int limit Optional. Limit the number of albums.
     * - int offset Optional. Number of albums to skip.
     *
     * @return array|object The artist's albums. Type is controlled by the `return_assoc` option.
     */
    public function getArtistAlbums($artistId, $options = []);

    /**
     * Get an artist's top tracks in a country.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-top-tracks
     *
     * @param string $artistId ID or URI of the artist.
     * @param array|object $options Options for the tracks.
     * - string $country Required. An ISO 3166-1 alpha-2 country code specifying the country to get the top tracks for.
     *
     * @return array|object The artist's top tracks. Type is controlled by the `return_assoc` option.
     */
    public function getArtistTopTracks($artistId, $options);

    /**
     * Get audio analysis for track.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-audio-analysis
     *
     * @param string $trackId ID or URI of the track.
     *
     * @return object The track's audio analysis. Type is controlled by the `return_assoc` option.
     */
    public function getAudioAnalysis($trackId);

    /**
     * Get audio features of a single track.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-audio-features
     *
     * @param string $trackId ID or URI of the track.
     *
     * @return array|object The track's audio features. Type is controlled by the `return_assoc` option.
     */
    public function getAudioFeatures($trackId);

    /**
     * Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s "Discover" tab).
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-categories
     *
     * @param array|object $options Optional. Options for the categories.
     * - string locale Optional. Language to show categories in, for example 'sv_SE'.
     * - string country Optional. An ISO 3166-1 alpha-2 country code. Show categories from this country.
     * - int limit Optional. Limit the number of categories.
     * - int offset Optional. Number of categories to skip.
     *
     * @return array|object The list of categories. Type is controlled by the `return_assoc` option.
     */
    public function getCategoriesList($options = []);

    /**
     * Get a single category used to tag items in Spotify (on, for example, the Spotify player’s "Discover" tab).
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-category
     *
     * @param string $categoryId ID of the category.
     *
     * @param array|object $options Optional. Options for the category.
     * - string locale Optional. Language to show category in, for example 'sv_SE'.
     * - string country Optional. An ISO 3166-1 alpha-2 country code. Show category from this country.
     *
     * @return array|object The category. Type is controlled by the `return_assoc` option.
     */
    public function getCategory($categoryId, $options = []);

    /**
     * Get a list of Spotify playlists tagged with a particular category.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-categories-playlists
     *
     * @param string $categoryId ID of the category.
     *
     * @param array|object $options Optional. Options for the category's playlists.
     * - string country Optional. An ISO 3166-1 alpha-2 country code. Show category playlists from this country.
     * - int limit Optional. Limit the number of playlists.
     * - int offset Optional. Number of playlists to skip.
     *
     * @return array|object The list of playlists. Type is controlled by the `return_assoc` option.
     */
    public function getCategoryPlaylists($categoryId, $options = []);

    /**
     * Get an episode.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-episode
     *
     * @param string $episodeId ID or URI of the episode.
     * @param array|object $options Optional. Options for the episode.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.
     *
     * @return array|object The requested episode. Type is controlled by the `return_assoc` option.
     */
    public function getEpisode($episodeId, $options = []);

    /**
     * Get multiple episodes.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-episodes
     *
     * @param array $episodeIds IDs or URIs of the episodes.
     * @param array|object $options Optional. Options for the episodes.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.
     *
     * @return array|object The requested episodes. Type is controlled by the `return_assoc` option.
     */
    public function getEpisodes($episodeIds, $options = []);

    /**
     * Get Spotify featured playlists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-featured-playlists
     *
     * @param array|object $options Optional. Options for the playlists.
     * - string locale Optional. Language to show playlists in, for example 'sv_SE'.
     * - string country Optional. An ISO 3166-1 alpha-2 country code. Show playlists from this country.
     * - string timestamp Optional. A ISO 8601 timestamp. Show playlists relevant to this date and time.
     * - int limit Optional. Limit the number of playlists.
     * - int offset Optional. Number of playlists to skip.
     *
     * @return array|object The featured playlists. Type is controlled by the `return_assoc` option.
     */
    public function getFeaturedPlaylists($options = []);

    /**
     * Get a list of possible seed genres.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recommendation-genres
     *
     * @return array|object All possible seed genres. Type is controlled by the `return_assoc` option.
     */
    public function getGenreSeeds();

    /**
     * Get the latest full response from the Spotify API.
     *
     * @return array Response data.
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function getLastResponse();

    /**
     * Get all markets where Spotify is available.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-available-markets
     *
     * @return array|object All markets where Spotify is available. Type is controlled by the `return_assoc` option.
     */
    public function getMarkets();

    /**
     * Get audio features of multiple tracks.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-several-audio-features
     *
     * @param array $trackIds IDs or URIs of the tracks.
     *
     * @return array|object The tracks' audio features. Type is controlled by the `return_assoc` option.
     */
    public function getMultipleAudioFeatures($trackIds);

    /**
     * Get the current user’s currently playing track.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recently-played
     *
     * @param array|object $options Optional. Options for the track.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     * - string|array additional_types Optional. Types of media to return info about.
     *
     * @return array|object The user's currently playing track. Type is controlled by the `return_assoc` option.
     */
    public function getMyCurrentTrack($options = []);

    /**
     * Get the current user’s devices.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-users-available-devices
     *
     * @return array|object The user's devices. Type is controlled by the `return_assoc` option.
     */
    public function getMyDevices();

    /**
     * Get the current user’s current playback information.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-information-about-the-users-current-playback
     *
     * @param array|object $options Optional. Options for the info.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     * - string|array additional_types Optional. Types of media to return info about.
     *
     * @return array|object The user's playback information. Type is controlled by the `return_assoc` option.
     */
    public function getMyCurrentPlaybackInfo($options = []);

    /**
     * Get the current user’s playlists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-list-of-current-users-playlists
     *
     * @param array|object $options Optional. Options for the playlists.
     * - int limit Optional. Limit the number of playlists.
     * - int offset Optional. Number of playlists to skip.
     *
     * @return array|object The user's playlists. Type is controlled by the `return_assoc` option.
     */
    public function getMyPlaylists($options = []);

    /**
     * Get the current user’s recently played tracks.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-the-users-currently-playing-track
     *
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Number of tracks to return.
     * - string after Optional. Unix timestamp in ms (13 digits). Returns all items after this position.
     * - string before Optional. Unix timestamp in ms (13 digits). Returns all items before this position.
     *
     * @return array|object The most recently played tracks. Type is controlled by the `return_assoc` option.
     */
    public function getMyRecentTracks($options = []);

    /**
     * Get the current user’s saved albums.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-albums
     *
     * @param array|object $options Optional. Options for the albums.
     * - int limit Optional. Number of albums to return.
     * - int offset Optional. Number of albums to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The user's saved albums. Type is controlled by the `return_assoc` option.
     */
    public function getMySavedAlbums($options = []);

    /**
     * Get the current user’s saved episodes.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-episodes
     *
     * @param array|object $options Optional. Options for the episodes.
     * - int limit Optional. Number of episodes to return.
     * - int offset Optional. Number of episodes to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.
     *
     * @return array|object The user's saved episodes. Type is controlled by the `return_assoc` option.
     */
    public function getMySavedEpisodes($options = []);

    /**
     * Get the current user’s saved tracks.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-tracks
     *
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks.
     * - int offset Optional. Number of tracks to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The user's saved tracks. Type is controlled by the `return_assoc` option.
     */
    public function getMySavedTracks($options = []);

    /**
     * Get the current user’s saved shows.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-shows
     *
     * @param array|object $options Optional. Options for the shows.
     * - int limit Optional. Limit the number of shows.
     * - int offset Optional. Number of shows to skip.
     *
     * @return array|object The user's saved shows. Type is controlled by the `return_assoc` option.
     */
    public function getMySavedShows($options = []);

    /**
     * Get the current user's top tracks or artists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-top-artists-and-tracks
     *
     * @param string $type The type to fetch, either 'artists' or 'tracks'.
     * @param array $options Optional. Options for the results.
     * - int limit Optional. Limit the number of results.
     * - int offset Optional. Number of results to skip.
     * - string time_range Optional. Over what time frame the data is calculated. See Spotify API docs for more info.
     *
     * @return array|object A list of the requested top entity. Type is controlled by the `return_assoc` option.
     */
    public function getMyTop($type, $options = []);

    /**
     * Get new releases.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-new-releases
     *
     * @param array|object $options Optional. Options for the items.
     * - string country Optional. An ISO 3166-1 alpha-2 country code. Show items relevant to this country.
     * - int limit Optional. Limit the number of items.
     * - int offset Optional. Number of items to skip.
     *
     * @return array|object The new releases. Type is controlled by the `return_assoc` option.
     */
    public function getNewReleases($options = []);

    /**
     * Get a specific playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlist
     *
     * @param string $playlistId ID or URI of the playlist.
     * @param array|object $options Optional. Options for the playlist.
     * - string|array fields Optional. A list of fields to return. See Spotify docs for more info.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The user's playlist. Type is controlled by the `return_assoc` option.
     */
    public function getPlaylist($playlistId, $options = []);

    /**
     * Get a playlist's cover image.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlist-cover
     *
     * @param string $playlistId ID or URI of the playlist.
     *
     * @return array|object The playlist cover image. Type is controlled by the `return_assoc` option.
     */
    public function getPlaylistImage($playlistId);

    /**
     * Get the tracks in a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlists-tracks
     *
     * @param string $playlistId ID or URI of the playlist.
     * @param array|object $options Optional. Options for the tracks.
     * - string|array fields Optional. A list of fields to return. See Spotify docs for more info.
     * - int limit Optional. Limit the number of tracks.
     * - int offset Optional. Number of tracks to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The tracks in the playlist. Type is controlled by the `return_assoc` option.
     */
    public function getPlaylistTracks($playlistId, $options = []);

    /**
     * Get recommendations based on artists, tracks, or genres.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recommendations
     *
     * @param array|object $options Optional. Options for the recommendations.
     * - int limit Optional. Limit the number of recommendations.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     * - mixed max_* Optional. Max value for one of the tunable track attributes.
     * - mixed min_* Optional. Min value for one of the tunable track attributes.
     * - array seed_artists Artist IDs to seed by.
     * - array seed_genres Genres to seed by. Call SpotifyWebAPI::getGenreSeeds() for a complete list.
     * - array seed_tracks Track IDs to seed by.
     * - mixed target_* Optional. Target value for one of the tunable track attributes.
     *
     * @return array|object The requested recommendations. Type is controlled by the `return_assoc` option.
     */
    public function getRecommendations($options = []);

    /**
     * Get the Request object in use.
     *
     * @return RequestInterface The Request object in use.
     */
    public function getRequest();

    /**
     * Get a show.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-show
     *
     * @param string $showId ID or URI of the show.
     * @param array|object $options Optional. Options for the show.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to shows available in that market.
     *
     * @return array|object The requested show. Type is controlled by the `return_assoc` option.
     */
    public function getShow($showId, $options = []);

    /**
     * Get a show's episodes.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-shows-episodes
     *
     * @param string $albumId ID or URI of the album.
     * @param array|object $options Optional. Options for the episodes.
     * - int limit Optional. Limit the number of episodes.
     * - int offset Optional. Number of episodes to skip.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to episodes available in that market.
     *
     * @return array|object The requested show episodes. Type is controlled by the `return_assoc` option.
     */
    public function getShowEpisodes($showId, $options = []);

    /**
     * Get multiple shows.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-shows
     *
     * @param array $showIds IDs or URIs of the shows.
     * @param array|object $options Optional. Options for the shows.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, limit results to shows available in that market.
     *
     * @return array|object The requested shows. Type is controlled by the `return_assoc` option.
     */
    public function getShows($showIds, $options = []);

    /**
     * Get a track.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-track
     *
     * @param string $trackId ID or URI of the track.
     * @param array|object $options Optional. Options for the track.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The requested track. Type is controlled by the `return_assoc` option.
     */
    public function getTrack($trackId, $options = []);

    /**
     * Get multiple tracks.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-several-tracks
     *
     * @param array $trackIds IDs or URIs of the tracks.
     * @param array|object $options Optional. Options for the tracks.
     * - string market Optional. An ISO 3166-1 alpha-2 country code, provide this if you wish to apply Track Relinking.
     *
     * @return array|object The requested tracks. Type is controlled by the `return_assoc` option.
     */
    public function getTracks($trackIds, $options = []);

    /**
     * Get a user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-profile
     *
     * @param string $userId ID or URI of the user.
     *
     * @return array|object The requested user. Type is controlled by the `return_assoc` option.
     */
    public function getUser($userId);

    /**
     * Get the artists followed by the current user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-followed
     *
     * @param array|object $options Optional. Options for the artists.
     * - int limit Optional. Limit the number of artists returned.
     * - string after Optional. The last artist ID retrieved from the previous request.
     *
     * @return array|object A list of artists. Type is controlled by the `return_assoc` option.
     */
    public function getUserFollowedArtists($options = []);

    /**
     * Get a user's playlists.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-list-users-playlists
     *
     * @param string $userId ID or URI of the user.
     * @param array|object $options Optional. Options for the tracks.
     * - int limit Optional. Limit the number of tracks.
     * - int offset Optional. Number of tracks to skip.
     *
     * @return array|object The user's playlists. Type is controlled by the `return_assoc` option.
     */
    public function getUserPlaylists($userId, $options = []);

    /**
     * Get the currently authenticated user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-current-users-profile
     *
     * @return array|object The currently authenticated user. Type is controlled by the `return_assoc` option.
     */
    public function me();

    /**
     * Check if albums are saved in the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-albums
     *
     * @param string|array $albums Album IDs or URIs to check for.
     *
     * @return array Whether each album is saved.
     */
    public function myAlbumsContains($albums);

    /**
     * Check if episodes are saved in the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-episodes
     *
     * @param string|array $episodes Episode IDs or URIs to check for.
     *
     * @return array Whether each episode is saved.
     */
    public function myEpisodesContains($episodes);

    /**
     * Check if shows are saved in the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-shows
     *
     * @param string|array $albums Show IDs or URIs to check for.
     *
     * @return array Whether each show is saved.
     */
    public function myShowsContains($shows);

    /**
     * Check if tracks are saved in the current user's Spotify library.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-tracks
     *
     * @param string|array $albums Track IDs or URIs to check for.
     *
     * @return array Whether each track is saved.
     */
    public function myTracksContains($tracks);

    /**
     * Play the next track in the current users's queue.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-skip-users-playback-to-next-track
     *
     * @param string $deviceId Optional. ID of the device to target.
     *
     * @return bool Whether the track was successfully skipped.
     */
    public function next($deviceId = '');

    /**
     * Pause playback for the current user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-pause-a-users-playback
     *
     * @param string $deviceId Optional. ID of the device to pause on.
     *
     * @return bool Whether the playback was successfully paused.
     */
    public function pause($deviceId = '');

    /**
     * Start playback for the current user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-start-a-users-playback
     *
     * @param string $deviceId Optional. ID of the device to play on.
     * @param array|object $options Optional. Options for the playback.
     * - string context_uri Optional. URI of the context to play, for example an album.
     * - array uris Optional. Spotify track URIs to play.
     * - object offset Optional. Indicates from where in the context playback should start.
     * - int position_ms. Optional. Indicates the position to start playback from.
     *
     * @return bool Whether the playback was successfully started.
     */
    public function play($deviceId = '', $options = []);

    /**
     * Play the previous track in the current users's queue.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-skip-users-playback-to-previous-track
     *
     * @param string $deviceId Optional. ID of the device to target.
     *
     * @return bool Whether the track was successfully skipped.
     */
    public function previous($deviceId = '');

    /**
     * Add an item to the queue.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-add-to-queue
     *
     * @param string $trackUri Required. Track ID, track URI or episode URI to queue.
     * @param string $deviceId Optional. ID of the device to target.
     *
     * @return bool Whether the track was successfully queued.
     */
    public function queue($trackUri, $deviceId = '');

    /**
     * Reorder the tracks in a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-reorder-or-replace-playlists-tracks
     *
     * @param string $playlistId ID or URI of the playlist.
     * @param array|object $options Options for the new tracks.
     * - int range_start Required. Position of the first track to be reordered.
     * - int range_length Optional. The amount of tracks to be reordered.
     * - int insert_before Required. Position where the tracks should be inserted.
     * - string snapshot_id Optional. The playlist's snapshot ID.
     *
     * @return string|bool A new snapshot ID or false if the tracks weren't successfully reordered.
     */
    public function reorderPlaylistTracks($playlistId, $options);

    /**
     * Set repeat mode for the current user’s playback.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-set-repeat-mode-on-users-playback
     *
     * @param array|object $options Optional. Options for the playback repeat mode.
     * - string state Required. The repeat mode. See Spotify docs for possible values.
     * - string device_id Optional. ID of the device to target.
     *
     * @return bool Whether the playback repeat mode was successfully changed.
     */
    public function repeat($options);

    /**
     * Replace all tracks in a playlist with new ones.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-reorder-or-replace-playlists-tracks
     *
     * @param string $playlistId ID or URI of the playlist.
     * @param string|array $tracks IDs, track URIs, or episode URIs to replace with.
     *
     * @return bool Whether the tracks was successfully replaced.
     */
    public function replacePlaylistTracks($playlistId, $tracks);

    /**
     * Search for an item.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-search
     *
     * @param string $query The term to search for.
     * @param string|array $type The type of item to search for.
     * @param array|object $options Optional. Options for the search.
     * - string market Optional. Limit the results to items that are playable in this market, for example SE.
     * - int limit Optional. Limit the number of items.
     * - int offset Optional. Number of items to skip.
     *
     * @return array|object The search results. Type is controlled by the `return_assoc` option.
     */
    public function search($query, $type, $options = []);

    /**
     * Change playback position for the current user.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-seek-to-position-in-currently-playing-track
     *
     * @param array|object $options Optional. Options for the playback seeking.
     * - string position_ms Required. The position in milliseconds to seek to.
     * - string device_id Optional. ID of the device to target.
     *
     * @return bool Whether the playback position was successfully changed.
     */
    public function seek($options);

    /**
     * Set the access token to use.
     *
     * @param string $accessToken The access token.
     *
     * @return void
     */
    public function setAccessToken($accessToken);

    /**
     * Set options
     *
     * @param array|object $options Options to set.
     *
     * @return void
     */
    public function setOptions($options);

    /**
     * Set the Session object to use.
     *
     * @param SessionInterface $session The Session object.
     *
     * @return void
     */
    public function setSession($session);

    /**
     * Set shuffle mode for the current user’s playback.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-toggle-shuffle-for-users-playback
     *
     * @param array|object $options Optional. Options for the playback shuffle mode.
     * - bool state Required. The shuffle mode. See Spotify docs for possible values.
     * - string device_id Optional. ID of the device to target.
     *
     * @return bool Whether the playback shuffle mode was successfully changed.
     */
    public function shuffle($options);

    /**
     * Remove the current user as a follower of one or more artists or other Spotify users.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-unfollow-artists-users
     *
     * @param string $type The type to check: either 'artist' or 'user'.
     * @param string|array $ids IDs or URIs of the users or artists to unfollow.
     *
     * @return bool Whether the artists or users were successfully unfollowed.
     */
    public function unfollowArtistsOrUsers($type, $ids);

    /**
     * Remove the current user as a follower of a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-unfollow-playlist
     *
     * @param string $playlistId ID or URI of the playlist to unfollow.
     *
     * @return bool Whether the playlist was successfully unfollowed.
     */
    public function unfollowPlaylist($playlistId);

    /**
     * Update the details of a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-change-playlist-details
     *
     * @param string $playlistId ID or URI of the playlist to update.
     * @param array|object $options Options for the playlist.
     * - collaborative bool Optional. Whether the playlist should be collaborative or not.
     * - description string Optional. Description of the playlist.
     * - name string Optional. Name of the playlist.
     * - public bool Optional. Whether the playlist should be public or not.
     *
     * @return bool Whether the playlist was successfully updated.
     */
    public function updatePlaylist($playlistId, $options);

    /**
     * Update the image of a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-upload-custom-playlist-cover
     *
     * @param string $playlistId ID or URI of the playlist to update.
     * @param string $imageData Base64 encoded JPEG image data, maximum 256 KB in size.
     *
     * @return bool Whether the playlist was successfully updated.
     */
    public function updatePlaylistImage($playlistId, $imageData);

    /**
     * Check if a set of users are following a playlist.
     * https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-if-user-follows-playlist
     *
     * @param string $playlistId ID or URI of the playlist.
     * @param array|object $options Options for the check.
     * - ids string|array Required. IDs or URIs of the users to check for.
     *
     * @return array Whether each user is following the playlist.
     */
    public function usersFollowPlaylist($playlistId, $options);
}