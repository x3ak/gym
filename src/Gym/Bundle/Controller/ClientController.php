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
     * @Route("/{id}/visits/{page}", name="client_visits", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template
     */
    public function visitsAction(Client $client, $page)
    {

        return [
            'client' => $client,
            'visits' => $this->get('gym.service.visits')->getList($client, $page)
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