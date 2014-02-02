<?php
/**
 * ClientsController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
     * @Route("/list", name="clients_list")
     * @Template
     */
    public function listAction()
    {
        $list = $this->getService()->getTodayList(1,1);
//        $list = $this->getRepository()->findBy([], ['id' => 'desc']);
        return ['clients' => $list];
    }

    public function todayAction()
    {

    }
} 