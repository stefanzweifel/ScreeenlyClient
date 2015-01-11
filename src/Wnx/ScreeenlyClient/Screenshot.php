<?php namespace Wnx\ScreeenlyClient;

use \GuzzleHttp\Client as Client;

class Screenshot {

    /**
     * Screeenly API Key
     * @var string
     */
    protected $key;

    /**
     * Response from Screeenly
     * @var object
     */
    protected $response;

    /**
     * Request URL for Screenshot
     * @var string
     */
    protected $url;

    /**
     * Height
     * @var integer
     */
    protected $height;

    /**
     * Width
     * @var integer
     */
    protected $width = 1024;

    /**
     * @param string $key Screeenly API Key
     */
    public function __construct($key)
    {
        $this->key = $key;

    }

    /**
     * Do API Request and store response
     * @param  string $url
     * @return object
     */
    public function capture($url)
    {
        $client = new Client();
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

    /**
     * Set height
     * @param integer $height
     */
    public function setHeight($height)
    {
        if (is_numeric($height) === false) {
            throw new \Exception('Height must be numeric', 1);
        }
        $this->height = $height;
    }

    /**
     * Set width
     * @param integer $width
     */
    public function setWidth($width)
    {
        if (is_numeric($width) === false) {
            throw new \Exception('Width must be numeric', 1);
        }
        $this->width = $width;
    }

    /**
     * Get Path
     * @return string
     */
    public function getPath()
    {
        return $this->response->path;
    }

    /**
     * Get base64 String
     * @return string
     */
    public function getBase64()
    {
        return $this->response->base64;
    }

    /**
     * Store Screenshot no disk
     * @param  string $storagePath
     * @return string              Filename
     */
    public function store($storagePath = '')
    {
        $path = $this->getPath();
        $pathinfo = pathinfo($path);

        $filename = $pathinfo['filename'] . '.jpg';

        $data = file_get_contents($path);

        file_put_contents($storagePath . $filename, $data);

        return $filename;
    }

}