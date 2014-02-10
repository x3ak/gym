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
     * @Route("/list/{page}", name="clients_list", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template
     */
    public function listAction($page)
    {
        return [
            'clients' => $this->getService()->getList($page),
        ];
    }

} 