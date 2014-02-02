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

    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getByVisitDateQuery(\DateTime $startDate, \DateTime $endDate)
    {
        return $this->getListQuery()
            ->join('c.visits', 'v', 'WITH', 'v.day = :start AND v.day <= :end')
            ->setParameters([
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d')
            ]);
    }
}