<?php
/**
 * Helper.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Service;


class HelperService
{
    /**
     * @param $weekNumber
     * @param $weekYear
     * @throws \RuntimeException
     * @return \DateTime
     */
    public function getWeekByNumber($weekNumber, $weekYear)
    {
        if (strlen($weekYear) < 4) {
            throw new \RuntimeException('Unsupported yer format');
        }

        if ($weekNumber < 1) {
            throw new \RuntimeException('Week should be greater than 0');
        }

        $weekNumber = str_pad($weekNumber, 2, '0', STR_PAD_LEFT);
        return new \DateTime($weekYear.'W'.$weekNumber);
    }
} 