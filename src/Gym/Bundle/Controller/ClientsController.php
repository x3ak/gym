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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/list/{page}", name="clients_list_all", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template
     */
    public function listAction($page)
    {
        return [
            'clients' => $this->getService()->getList($page),
        ];
    }

    /**
     * @Route("/list-active/{page}", name="clients_list_active", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template("@Gym/Clients/list.html.twig")
     */
    public function listActiveAction($page)
    {
        return [
            'clients' => $this->getService()->getActiveList($page),
        ];
    }

    /**
     * @Route("/list-in-club/{page}", name="clients_list_in_club", defaults={"page":1}, requirements={"page":"\d+"})
     * @Template("@Gym/Clients/list.html.twig")
     */
    public function listInClubAction($page)
    {
        return [
            'clients' => $this->getService()->getInClubList($page),
        ];
    }

    /**
     * @param $number
     * @Route("/search.{_format}", name="clients_search", defaults={"_format":"json"}, requirements={"_format":"json"})
     */
    public function searchAction(Request $request)
    {
        $clientCode = $request->query->get('code');
        $maxResults = $request->query->get('maxResults');

        $list = $this->getService()->getListByClientCode($clientCode);

        $data = [];
        $count = 0;

        foreach ($list as $client) {
            if ($count++ == $maxResults)
                break;


            $data[] = [
                'id' => $client->getId(),
                'firstName' => $client->getFirstName(),
                'lastName' => $client->getLastName(),
                'inClub' => !empty($client->getActiveVisit()),
                'code' => $client->getCode(),
                'url'=> [
                    'client_dashboard' => $this->generateUrl('client_dashboard', ['id' => $client->getId()]),
                    'visit_start' => $this->generateUrl('visit_start', ['id' => $client->getId()]),
                    'visit_finish' => $this->generateUrl('visit_finish', ['id' => $client->getId()]),
                ],
            ];
        }

        return new JsonResponse($data);
    }

} 