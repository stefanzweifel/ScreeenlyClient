<?php namespace Wnx\ScreeenlyClient;

use PHPUnit\Framework\TestCase;
use Wnx\ScreeenlyClient\Screenshot;

class ScreenshotTest extends TestCase {

    public function testIsInstanceOfScreenshot()
    {
        $screenshot = new Screenshot('random-key');
        $this->assertInstanceOf('Wnx\ScreeenlyClient\Screenshot', $screenshot);
    }

    public function testHasKeyAsAttribute()
    {
        $key        = 'random-key';
        $screenshot = new Screenshot($key);

        $this->assertObjectHasAttribute('key', $screenshot);
        $this->assertAttributeEquals($key, 'key', $screenshot);
    }

    public function testHeightIsInteger()
    {
        $screenshot = new Screenshot('key');
        $height = $screenshot->setHeight(1);

        $this->assertEquals(1, $height);

    }

    /**
     * @expectedException Exception
     */
    public function testHeightNotInteger()
    {
        $screenshot = new Screenshot('key');
        $height = $screenshot->setHeight('string');
    }

    public function testWidthIsInteger()
    {
        $screenshot = new Screenshot('key');
        $height = $screenshot->setWidth(1);

        $this->assertEquals(1, $height);

    }

    /**
     * @expectedException Exception
     */
    public function testWidthNotInteger()
    {
        $screenshot = new Screenshot('key');
        $height = $screenshot->setWidth('string');
    }

    /**
     * @expectedException Exception
     */
    public function testCaptureFails()
    {
        $screenshot = new Screenshot('key');
        $screenshot->capture('http://google.com');
    }


}

