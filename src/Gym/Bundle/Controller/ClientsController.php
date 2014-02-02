<?php
/**
 * ClientsController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ClientsController
 * @package Gym\Bundle\Controller
 * @Route("/clients")
 */
class ClientsController extends Controller
{
    protected function getService()
    {
        return $this->get('gym.service.clients');
    }

    /**
     * @Route("/today/{page}", name="clients_today", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template
     */
    public function todayAction($page)
    {
        return [
            'clients' => $this->getService()->getListByDate($page, new \DateTime(), new \DateTime()),
        ];
    }

    /**
     * @param $page
     * @param \DateTime $week
     * @return array
     * @Route("/week/{page}/{week}", name="clients_week", defaults={"page":1}, requirements={"page":"\d+"})
     * @ParamConverter("week", options={"optional":true})
     * @Template
     */
    public function weekAction($page, \DateTime $week)
    {

        return [];
    }
} 