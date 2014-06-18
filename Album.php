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
        $uri = '/v1/albums?ids=' . $id;

        print_r(Request::api('GET', $uri));
    }

    public function getSingle($id)
    {
        $id = $id ?: $this->id;
        $uri = '/v1/albums/' . $id;

        $response = Request::api('GET', $uri));
        return $response['body'];
    }

    public function getTracks()
    {
        $uri = '/v1/albums/' . $this->id . '/tracks';

        $response = Request::api('GET', $uri));
        return $response['body'];
    }

    public function setID($id)
    {
        $this->id = $id;
    }
}
