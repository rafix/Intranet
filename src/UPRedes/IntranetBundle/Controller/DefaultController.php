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

        $categories = $em->getRepository('UPRedesIntranetBundle:Category')->findAllOrderedByWeight();

        $this->client = $this->get('rss_client');

        return array(
            'categories' => $categories,
            'nupr'   => $this->client->fetch('channel_upr'),
        );
    }

    /**
     * Finds and displays Links of a Category entity.
     *
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UPRedesIntranetBundle:Link')->findByCategoryId($id);

        if (!$entities) {
            throw $this->createNotFoundException('Unable to find Link collection.');
        }

        return array(
            'entities'      => $entities,
        );
    }
}
