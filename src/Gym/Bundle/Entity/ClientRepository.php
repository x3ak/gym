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
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getListQuery()
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('c, s')
            ->from('GymBundle:Client', 'c')
            ->leftJoin('c.subscription', 's') // add this join to base query to avoid lazy loading on list displaying
            ->leftJoin('c.visits', 'v') // add this join to base query to avoid lazy loading on list displaying
            ->orderBy('c.id', 'DESC');

    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getActiveListQuery()
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('c, s')
            ->from('GymBundle:Client', 'c')
            ->innerJoin('c.subscription', 's')
            ->leftJoin('c.visits', 'v')
            ->orderBy('c.id', 'DESC');

    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getInClubListQuery()
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('c, s')
            ->from('GymBundle:Client', 'c')
            ->innerJoin('c.subscription', 's')
            ->innerJoin('c.visits', 'v', 'WITH', 'v.exit is null')
            ->orderBy('c.id', 'DESC');


    }



}