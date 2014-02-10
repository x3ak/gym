<?php
/**
 * VisitController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;


use Gym\Bundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class VisitController
 * @package Gym\Bundle\Controller
 *
 * @Route("/visit")
 */
class VisitController extends Controller
{
    /**
     * @param Client $client
     * @Route("/start/{id}")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function startVisit(Client $client)
    {
        return $this->redirect(
            $this->generateUrl('show_client', ['id' => $client->getId()])
        );
    }
} 