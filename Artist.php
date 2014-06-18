<?php
class Artist
{
    private $id = '';

    public function __construct($id = '')
    {
        $this->setID($id);
    }

    public function getMany($id)
    {
        if (!is_array($id)) {
            return $this->getSingle($id);
        }

        $id = implode(',', $id);
        $uri = '/v1/artists';

        $response = Request::api('GET', $uri, array(
            'ids' => $id
        ));
        $response = json_decode($response['body']);

        $artists = array();
        if (isset($response->artists)) {
            foreach ($response->artists as $artist) {
                $artist = new Artist($artist->id);
                $artist->getSingle();

                $artists[] = $artist;
            }
        }

        return $artists;
    }

    public function getSingle($id = '')
    {
        $id = $id ?: $this->id;

        // Check if we already has data for this artist
        if (isset($this->data->id) && $this->data->id == $id) {
            return true;
        }

        $uri = '/v1/artists/' . $id;
        $response = Request::api('GET', $uri);
        $response = json_decode($response['body']);

        if (!isset($response->id)) {
            return false;
        }

        $this->data = $response;

        return true;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
}
