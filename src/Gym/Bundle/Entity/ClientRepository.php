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
            ->leftJoin('c.subscription', 's'); // add this join to base query to avoid lazy loading on list displaying

    }

}