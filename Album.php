<?php
class Album
{
    private $data = null;
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
        $uri = '/v1/albums';

        $response = Request::api('GET', $uri, array(
            'ids' => $id
        ));
        $response = json_decode($response['body']);

        $albums = array();
        if (isset($response->albums)) {
            foreach ($response->albums as $album) {
                $album = new Album($album->id);
                $album->getSingle();

                $albums[] = $album;
            }
        }

        return $albums;
    }

    public function getSingle($id = '')
    {
        $id = $id ?: $this->id;

        // Check if we already has data for this album
        if (isset($this->data->id) && $this->data->id == $id) {
            return true;
        }

        $uri = '/v1/albums/' . $id;
        $response = Request::api('GET', $uri);
        $response = json_decode($response['body']);

        if (!isset($response->id)) {
            return false;
        }

        $this->data = $response;

        return true;
    }

    public function getTracks($id = '')
    {
        $id = $id ?: $this->id;
        $uri = '/v1/albums/' . $this->id . '/tracks';

        $response = Request::api('GET', $uri);
        $response = json_decode($response['body']);

        $tracks = array();
        if (isset($response->items)) {
            foreach ($response->items as $track) {
                $track = new Track($track->id);
                $track->getSingle();

                $tracks[] = $track;
            }
        }

        return $tracks;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
}
