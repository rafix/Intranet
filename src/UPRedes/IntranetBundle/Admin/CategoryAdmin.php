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

class CategoryAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('homepage')
            ->addIdentifier('name')
            ->add('slug')
            ->add('weight')
            ->add('_action', 'actions', array(
            'actions' => array(
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
            ->add('slug')
            ->add('weight')
            ->add('homepage', null, array(
                'required' => false,
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('slug')
            ->add('weight')
            ->add('homepage');
    }
}
