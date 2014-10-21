<?php
namespace Kinash\JamStorageBundle\Classes;
/**
 * Objects clonner
 */
class CloneFactory
{
    /**
     * Clone object
     * @param object $object
     * @return object
     */
    public function cloneObject($object)
    {
        var_dump(1);
        return clone $object;
    }
}