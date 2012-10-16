<?php

namespace UPRedes\IntranetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UPRedes\IntranetBundle\Entity\Category;

/**
 * Category controller.
 *
 * @Route("/category")
 */
class CategoryController extends Controller
{
    /**
     * Lists all Category entities.
     *
     * @Route("/", name="category")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UPRedesIntranetBundle:Category')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}/show", name="category_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UPRedesIntranetBundle:Category')->find($id)->getLinks();

        if (!$entities) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return array(
            'entities'      => $entities,
        );
    }

}
