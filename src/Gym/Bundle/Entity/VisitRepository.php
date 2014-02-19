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
            ->orderBy('v.day, v.enter', 'desc')
            ->setParameter('client', $client);
    }

    public function createVisit(Client $client)
    {
        $entity = new Visit();
        $entity->setClient($client);
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function finishVisit(Client $client)
    {

        /** @var Visit[] $list */
        $list = $this->getByClient($client)
            ->andWhere('v.exit is null')
            ->getQuery()
            ->execute();

        foreach ($list as $visit) {
            $visit->setExit(new \DateTime());
            $this->getEntityManager()->persist($visit);

        }

        $this->getEntityManager()->flush();
    }
}