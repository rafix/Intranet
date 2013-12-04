<?php

namespace UPRedes\IntranetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * Class DefaultController
 * @package UPRedes\IntranetBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     * @Cache(expires="now +10 min", public="true")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('UPRedesIntranetBundle:Category')->findAllOrderedByWeight();

        $this->client = $this->get('rss_client');

        return array(
            'categories' => $categories,
            'nupr'   => $this->client->fetch('channel_upr', 6),
        );
    }

    /**
     * Finds and displays Links of a Category entity.
     */
    public function showAction($id, $icons = true)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UPRedesIntranetBundle:Link')->findByCategoryId($id);

        if (!$entities) {
            throw $this->createNotFoundException('Unable to find Link collection.');
        }

        if ($icons) {
            return $this->render('UPRedesIntranetBundle:Default:show.html.twig', array('entities' => $entities));
        }

        return $this->render('UPRedesIntranetBundle:Default:list.html.twig', array('entities' => $entities));
    }
}
