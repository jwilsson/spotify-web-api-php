<?php
class Album
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
        $uri = '/v1/albums';

        $response = Request::api('GET', $uri, array(
            'ids' => $id
        ));
        $response = json_decode($response['body']);

        $albums = array();
        if (isset($response->albums)) {
            foreach ($response->albums as $album) {
                $albums[] = new Album($album->id);
            }
        }

        return $albums;
    }

    public function getSingle($id = '')
    {
        $id = $id ?: $this->id;
        $uri = '/v1/albums/' . $id;

        $response = Request::api('GET', $uri);
        if (!isset($response->id)) {
            return false;
        }



        return true;
    }

    public function getTracks()
    {
        $uri = '/v1/albums/' . $this->id . '/tracks';

        $response = Request::api('GET', $uri);
        return $response['body'];
    }

    public function setID($id)
    {
        $this->id = $id;
    }
}
