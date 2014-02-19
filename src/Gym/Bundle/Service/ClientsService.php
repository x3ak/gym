<?php
/**
 * ClientService.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Service;


use Gym\Bundle\Entity\Client;
use Gym\Bundle\Entity\ClientRepository;
use Gym\Bundle\Entity\Visit;
use Knp\Component\Pager\Paginator;

class ClientsService
{
    /**
     * @var \Gym\Bundle\Entity\ClientRepository
     */
    protected $clientRepository;

    /**
     * @var \Knp\Component\Pager\Paginator
     */
    protected $paginator;

    /**
     * @var int
     */
    protected $pageSize;

    public function __construct(ClientRepository $clientRepository, Paginator $paginator, $pageSize)
    {
        $this->clientRepository = $clientRepository;
        $this->paginator = $paginator;
        $this->pageSize = $pageSize;
    }

    /**
     * @param $page
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getList($page)
    {
        return $this->paginator->paginate(
            $this->clientRepository->getListQuery(),
            $page,
            $this->pageSize
        );
    }

    /**
     * @param $page
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getInClubList($page)
    {
        return $this->paginator->paginate(
            $this->clientRepository->getInClubListQuery(),
            $page,
            $this->pageSize
        );
    }

    /**
     * @param $page
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getActiveList($page)
    {
        $queryBuilder = $this->clientRepository->getActiveListQuery();
        return $this->paginator->paginate(
            $queryBuilder,
            $page,
            $this->pageSize
        );
    }

    /**
     * @param $clientCode
     * @return Client[]
     */
    public function getListByClientCode($clientCode)
    {
        return $this->clientRepository->getActiveListQuery()
            ->andWhere('c.code LIKE :code')
            ->setParameter('code', '%'.$clientCode.'%')
            ->getQuery()
            ->execute();
    }

} 