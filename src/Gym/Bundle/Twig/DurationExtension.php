<?php
/**
 * FullnameExtension.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Twig;


class DurationExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('duration', array($this, 'durationFilter')),
        );
    }

    public function durationFilter(\DateInterval $diff)
    {
        $format = [];

        if ($diff->y > 0) {
            $format[] = '%yy';
        }

        if ($diff->m > 0) {
            $format[] = '%yy';
        }

        if ($diff->d > 0) {
            $format[] = '%dd';
        }

        if ($diff->h > 0) {
            $format[] = '%hh';
        }

        if ($diff->i > 0) {
            $format[] = '%im';
        }

        if (count($format) == 0) {
            return '< 1m';
        }

        return $diff->format(implode(' ', $format));
    }

    public function getName()
    {
        return 'duration';
    }
} 