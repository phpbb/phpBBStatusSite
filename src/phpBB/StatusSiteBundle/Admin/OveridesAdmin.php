<?php

namespace phpBB\StatusSiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class OveridesAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('site_id', null, array('required' => true))
            ->add('start_time')
            ->add('end_time')
            ->add('update_id', null, array('required' => true))
//            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('site_id')
            ->add('start_time')
            ->add('end_time')
//            ->add('posts')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('site_id')
            ->add('start_time')
            ->add('end_time')
//            ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {

    }
}
