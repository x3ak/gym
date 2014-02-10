<?php
/**
 * VisitsController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class VisitsController
 * @package Gym\Bundle\Controller
 *
 * @Route("/visits")
 */
class VisitsController extends Controller
{
    /**
     * @return \Gym\Bundle\Service\VisitsService
     */
    protected function getService()
    {
        return $this->get('gym.service.visits');
    }

    /**
     * @Route("/today/{page}", name="clients_today", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template
     */
    public function todayAction()
    {

    }
} 