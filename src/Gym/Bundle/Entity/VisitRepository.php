<?php
/**
 * VisitRepository.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Entity;


use Doctrine\ORM\EntityRepository;

class VisitRepository extends EntityRepository
{

    /**
     * @param Client $client
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getByClient(Client $client)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('v')
            ->from('GymBundle:Visit', 'v')
            ->where('v.client = :client')
            ->setParameter('client', $client);
    }
}