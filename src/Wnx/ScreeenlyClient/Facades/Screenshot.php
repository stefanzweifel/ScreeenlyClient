<?php namespace Wnx\ScreeenlyClient\Facades;

use \Illuminate\Support\Facades\Facade;

/**
 * @see \Wnx\ScreeenlyClient\
 */
class Screenshot extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Screenshot'; }

}