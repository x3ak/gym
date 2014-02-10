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
     * @param $page
     * @param \DateTime $start
     * @param \DateTime|null $end
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function getList($page)
    {
        return $this->paginator->paginate(
            $this->visitRepository->getListQuery()
        );
    }

    public function create(Client $client)
    {

    }

    public function finish(Visit $visit)
    {

    }

} 