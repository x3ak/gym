<?php
/**
 * VisitController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;


use Gym\Bundle\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
     * @Route("/start/{id}", name="visit_start")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function startVisitAction(Client $client)
    {
        $this->getService()->create($client);

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Visit was started'
        );

        return $this->redirect(
            $this->generateUrl('client_visits', ['id' => $client->getId()])
        );
    }

    /**
     * @param Client $client
     * @Route("/finish/{id}", name="visit_finish")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function finishVisitAction(Client $client)
    {
        $this->getService()->finish($client);

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Visit was finished'
        );

        return $this->redirect(
            $this->generateUrl('client_visits', ['id' => $client->getId()])
        );
    }

    /**
     * @return \Gym\Bundle\Service\VisitsService
     */
    public function getService()
    {
        return $this->get('gym.service.visits');
    }
}