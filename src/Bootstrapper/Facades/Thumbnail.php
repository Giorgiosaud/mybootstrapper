<?php
/**
 * Bootstrapper Thumbnail facade
 */

namespace Giorgiosaud\Bootstrapper\Facades;

/**
 * Facade for Thumbnails
 *
 * @package Bootstrapper\Facades
 * @see     Bootstrapper\Thumbnail
 */
class Thumbnail extends BootstrapperFacade
{

    /**
     * {@inheritdoc}
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootstrapper::thumbnail';
    }
}
