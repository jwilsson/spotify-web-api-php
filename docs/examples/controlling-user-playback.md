---
layout: default
title: Controlling user playback
---

Using Spotify Connect, it's possible to control the playback of the currently authenticated user.

# Retrying API calls

Sometimes, a API call might return a `202 Accepted` response code. When this occurs, you should retry the request after a few seconds. For example:

    <?php
    try {
        $wasPaused = $api->pause():

        if (!$wasPaused) {
            $lastResponse = $api->getLastResponse();

            if ($lastResponse['status'] == 202) {
                // Perform some logic to retry the request after s few seconds
            }
        }
    } catch (Exception $e) {
        // Handle the error
    }

Read more about working with Spotify Connect in the [Spotify API docs](https://developer.spotify.com/web-api/working-with-connect/).
