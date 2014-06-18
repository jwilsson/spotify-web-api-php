<?php
class Track
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
        $uri = '/v1/tracks';

        $response = Request::api('GET', $uri, array(
            'ids' => $id
        ));
        $response = json_decode($response['body']);

        $tracks = array();
        if (isset($response->tracks)) {
            foreach ($response->tracks as $track) {
                $track = new Track($track->id);
                $track->getSingle();

                $tracks[] = $track;
            }
        }

        return $tracks;
    }

    public function getSingle($id = '')
    {
        $id = $id ?: $this->id;

        // Check if we already has data for this track
        if (isset($this->data->id) && $this->data->id == $id) {
            return true;
        }

        $uri = '/v1/tracks/' . $id;
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
