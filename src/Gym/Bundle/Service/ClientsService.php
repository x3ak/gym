<?php
/**
 * ClientService.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Service;


use Gym\Bundle\Entity\ClientRepository;
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
     * @param \DateTime $start
     * @param \DateTime|null $end
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getListByDate($page, \DateTime $start, \DateTime $end = null)
    {
        return $this->paginator->paginate(
            $this->clientRepository->getByVisitDateQuery(
                $start,
                $end === null ? $start : $end
            )->getQuery(),
            $page,
            $this->pageSize
        );
    }

} 