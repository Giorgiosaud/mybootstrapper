<?php
/**
 * Bootstrapper Breadcrumb facade
 */

namespace Giorgiosaud\Bootstrapper\Facades;

/**
 * Facade for the Breadcrumb class
 *
 * @package Bootstrapper\Facades
 * @see     Bootstrapper\Breadcrumb
 */
class Breadcrumb extends BootstrapperFacade
{

    /**
     * {@inheritdoc}
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootstrapper::breadcrumb';
    }
}
