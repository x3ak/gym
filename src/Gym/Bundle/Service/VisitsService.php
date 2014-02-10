<?php
/**
 * ClientService.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Service;


use Gym\Bundle\Entity\Client;
use Gym\Bundle\Entity\Visit;
use Gym\Bundle\Entity\VisitRepository;
use Knp\Component\Pager\Paginator;

class VisitsService
{
    /**
     * @var \Gym\Bundle\Entity\VisitRepository
     */
    protected $visitRepository;

    /**
     * @var \Knp\Component\Pager\Paginator
     */
    protected $paginator;

    /**
     * @var int
     */
    protected $pageSize;

    public function __construct(VisitRepository $visitRepository, Paginator $paginator, $pageSize)
    {
        $this->visitRepository = $visitRepository;
        $this->paginator = $paginator;
        $this->pageSize = $pageSize;
    }

    /**
     * @param \Gym\Bundle\Entity\Client $client
     * @param $page
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getList(Client $client, $page)
    {
        return $this->paginator->paginate(
            $this->visitRepository->getByClient($client),
            $page,
            $this->pageSize,
            [
                'defaultSortFieldName' => 'v.day',
                'defaultSortDirection' => 'desc'
            ]
        );
    }

    public function create(Client $client)
    {

    }

    public function finish(Visit $visit)
    {

    }

} 