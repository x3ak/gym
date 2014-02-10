<?php
/**
 * ClientController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;

use Gym\Bundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ClientController
 * @package Gym\Bundle\Controller
 *
 * @Route("/client")
 */
class ClientController extends Controller
{
    /**
     * @Route("/{id}/dashboard", name="client_dashboard")
     * @Template
     */
    public function dashboardAction(Client $client)
    {
        return ['client' => $client];
    }

    /**
     * @Route("/{id}/visits", name="client_visits")
     * @Template
     */
    public function visitsAction(Client $client)
    {

        return [
            'client' => $client,
            'visits' => $this->get('gym.service.visits')->getList($client, 1)
        ];
    }

    /**
     * @Route("/{id}/subscriptions", name="client_subscriptions")
     * @Template
     */
    public function subscriptionsAction(Client $client)
    {
        return ['client' => $client];
    }
} 