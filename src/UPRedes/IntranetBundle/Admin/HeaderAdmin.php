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

class HeaderAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('enabled')
            ->addIdentifier('name')
            ->add('description', 'textarea')
            ->add('url')
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
            ->add('enabled', null, array(
                'required' => false,
            ))
            ->add('name')
            ->add('description', 'textarea', array(
                'required' => false,
            ))
            ->add('image', 'sonata_type_model_list', array(
                'required' => false,
            ))
            ->add('desktopFile', 'vich_image', array(
                'required' => false,
            ))
            ->add('mobileFile', 'vich_image', array(
                'required' => false,
            ))
            ->add('url', 'url', array(
                'required' => false,
            ));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('url')
            ->add('enabled');
    }
}
