<?php

namespace UPRedes\IntranetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UPRedes\IntranetBundle\Entity\Link;

/**
 * Link controller.
 *
 * @Route("/link")
 */
class LinkController extends Controller
{
    /**
     * Lists all Link entities.
     *
     * @Route("/", name="link")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UPRedesIntranetBundle:Link')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Link entity.
     *
     * @Route("/{id}/show", name="link_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UPRedesIntranetBundle:Link')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Link entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

}
