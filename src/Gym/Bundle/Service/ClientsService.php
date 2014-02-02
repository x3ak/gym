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

    public function __construct(ClientRepository $clientRepository, Paginator $paginator)
    {
        $this->clientRepository = $clientRepository;
        $this->paginator = $paginator;
    }

    public function getTodayList($page, $pageSize)
    {
        return $this->clientRepository->getToadyQuery()->getQuery()->execute();
    }

} 