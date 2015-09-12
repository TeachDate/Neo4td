<?php

namespace TeachDate\Neo4td\Neo4tdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Neo4tdBundle:Default:index.html.twig', array('name' => $name));
    }
}
