<?php
/**
 * UserController.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Controller;

use Gym\Bundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class UsersController
 */
class UsersController extends Controller
{
    /**
     * @Route("/user/{id}", name="show_user")
     * @Template
     */
    public function showAction(User $user)
    {
        return ['user' => $user];
    }
} 