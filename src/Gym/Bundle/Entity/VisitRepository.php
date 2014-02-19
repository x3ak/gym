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

    /**
     * @param Client $client
     * @return \DateInterval
     */
    public function getTotalInfo(Client $client)
    {
        $sql = "SELECT
            COUNT(1) visits,
            SUM(TIME_TO_SEC(TIMEDIFF(`exit`, enter))) as duration,
            (SELECT id FROM visit
                WHERE
                    client_id = v.client_id AND
                    `exit` is not null AND
                    TIMEDIFF(`exit`, enter) > 300
                    ORDER BY TIMEDIFF(`exit`, enter) DESC LIMIT 1) as longest_id,
            (SELECT id FROM visit
                WHERE
                    client_id = v.client_id AND
                    `exit` is not null AND
                    TIMEDIFF(`exit`, enter) > 300
                    ORDER BY TIMEDIFF(`exit`, enter) ASC LIMIT 1) as shortest_id
            FROM visit v
            WHERE
            v.client_id = ".$client->getId();

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll()[0];

        $data = [
            'count' => $result['visits'],
            'duration' => $this->getInterval((int)$result['duration']),
        ];

        if (!empty($result['longest_id'])) {
            $data['longest'] = $this->find($result['longest_id']);
        }

        if (!empty($result['shortest_id'])) {
            $data['shortest'] = $this->find($result['shortest_id']);
        }

        return $data;
    }

    protected function getInterval($seconds)
    {
        $seconds = $seconds > 0 ? $seconds : 0;

        $now = new \DateTime();
        $end = clone $now;
        $end->add(new \DateInterval('PT'.$seconds.'S'));
        return $end->diff($now);
    }
}