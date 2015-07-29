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
     * Local Filename
     * @var string
     */
    public $localFilename;

    /**
     * LocalStoragePath
     * @var string
     */
    public $localStoragePath;

    /**
     * URL to screeenly API
     * @var string
     */
    protected $apiUrl = 'http://screeenly.com/api/v1/fullsize';

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
        $this->setUrl($url);

        $client = new Client();
        $response = $client->post($this->apiUrl, ['form_params' =>
            [
                'key'    => $this->key,
                'url'    => $url,
                'width'  => $this->width,
                'height' => $this->height
            ]
        ]);

        $responseJson =  $response->getBody();
        $responseArray = json_decode($responseJson);

        $this->response = $responseArray;

        return $this;
    }

    /**
     * Store Screenshot no disk
     * @param  string $storagePath
     * @param  string $filename
     * @return string              Local Storage Path
     */
    public function store($storagePath = '', $filename = '')
    {
        $path     = $this->getPath();
        $pathinfo = pathinfo($path);
        $data     = file_get_contents($path);

        // Use Original Filename if no specific filename is set
        if (empty($filename)) {
            $filename = $pathinfo['filename'] . '.jpg';
        }

        file_put_contents($storagePath . $filename, $data);

        $this->setLocalStoragePath($storagePath);
        $this->setLocalFilename($filename);

        return $storagePath . $filename;
    }

    /**
     * Set Url
     * @param string $url
     */
    public function setUrl($url)
    {
        return $this->url = $url;
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
        return $this->height = $height;
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
        return $this->width = $width;
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
     * Set Local StoragePath
     * @param string $path
     */
    public function setLocalStoragePath($path)
    {
        return $this->localStoragePath = $path;
    }

    /**
     * Set Local Filename
     * @param string $filename
     */
    public function setLocalFilename($filename)
    {
        return $this->localFilename = $filename;
    }

}