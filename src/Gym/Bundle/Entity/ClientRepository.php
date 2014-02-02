<?php
/**
 * ClientRepository.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Entity;


use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository
{
    public function getTodayClients()
    {

    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getListQuery()
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('c, s')
            ->from('GymBundle:Client', 'c')
            ->leftJoin('c.subscription', 's'); // add this join to base query to avoid lazy loading on list displaying

    }

    public function getToadyQuery()
    {
        return $this->getListQuery()
            ->join('c.visits', 'v', 'WITH', 'v.day = CURRENT_DATE()');

    }
}