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
     * @Route("/{id}/show", name="clients_show")
     * @Template
     */
    public function showAction(Client $client)
    {
        return ['client' => $client];
    }
} 