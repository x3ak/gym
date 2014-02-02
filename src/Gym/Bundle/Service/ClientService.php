<?php
/**
 * ClientService.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Service;


use Gym\Bundle\Entity\ClientRepository;

class ClientService
{
    /**
     * @var \Gym\Bundle\Entity\ClientRepository
     */
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

} 