<?php

namespace Klabs\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KlabsMenuBundle:Default:index.html.twig');
    }
}
