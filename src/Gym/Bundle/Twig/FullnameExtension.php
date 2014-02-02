<?php
/**
 * FullnameExtension.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Twig;


class FullnameExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('fullname', array($this, 'fullnameFilter')),
        );
    }

    public function fullnameFilter($object)
    {
        if (!method_exists($object, 'getFirstName') || !method_exists($object, 'getLastName')) {
            throw new \RuntimeException("Object does not have getFirstName and/or getLastName methods");
        }


        return $object->getFirstName() . ' ' . $object->getLastName();
    }

    public function getName()
    {
        return 'fullname';
    }
} 