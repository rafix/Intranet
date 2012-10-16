<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafix
 * Date: 10/14/12
 * Time: 12:50 p.m.
 * To change this template use File | Settings | File Templates.
 */
namespace UPRedes\IntranetBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Knp\Bundle\MenuBundle\MenuItem;

class LinkAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->addIdentifier('image')
            ->addIdentifier('name')
            ->add('category')
            ->add('url')
            ->add('_action', 'actions', array(
            'actions' => array(
                'view' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('category')
            ->add('url')
            ->add('image', 'sonata_type_model_list')
            ->add('description', 'textarea', array('required' => false))
        ;

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name');
    }
}
