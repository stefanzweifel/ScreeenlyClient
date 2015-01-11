<?php namespace Wnx\ScreeenlyClient;

class Screenshot {

    protected $key;

    protected $response;

    protected $url;

    protected $height;

    protected $width = 1024;

    public function __construct($key)
    {
        $this->key = $key;

    }

    public function capture($url)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://screeenly.com/api/v1/fullsize', ['body' =>
            [
                'key'    => $this->key,
                'url'    => $url,
                'width'  => $this->width,
                'height' => $this->height
            ]
            ]);

        $this->response = (object) $response->json();

        return $this->response;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getPath()
    {
        return $this->response->path;
    }

    public function getBase64()
    {
        return $this->response->base64;
    }

    public function store()
    {
        $path = $this->getPath();
        $pathinfo = pathinfo($path);

        $filename = $pathinfo['filename'] . '.jpg';

        $data = file_get_contents($path);

        file_put_contents($filename, $data);

        return $filename;
    }

}