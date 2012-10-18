<?php

namespace UPRedes\IntranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('UPRedesIntranetBundle:Category')->findAll();

        $this->client = $this->get('rss_client');



        return array(
            'categories' => $categories,
            'nupr'   => $this->client->fetch('channel_upr'),
            'npinux'   => $this->client->fetch('channel_pinux'),
        );
    }
}
