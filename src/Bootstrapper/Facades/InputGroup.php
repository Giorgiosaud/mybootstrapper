<?php
/**
 * Bootstrapper InputGroup facade
 */

namespace Giorgiosaud\Bootstrapper\Facades;

/**
 * Facade for InputGroup class
 *
 * @package Bootstrapper\Facades
 * @see     Bootstrapper\InputGroup
 */
class InputGroup extends BootstrapperFacade
{

    const LARGE = 'input-group-lg';
    const SMALL = 'input-group-sm';

    /**
     * {@inheritdoc}
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootstrapper::inputgroup';
    }
}
