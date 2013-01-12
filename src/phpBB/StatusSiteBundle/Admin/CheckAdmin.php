<?php

namespace phpBB\StatusSiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class CheckAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('site_id', null, array('required' => true))
            ->add('name')
            ->add('slug')
            ->add('description')
            ->add('pingdom_id')

//            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('site_id', null, array('required' => true))
            ->add('name')
            ->add('slug')
            ->add('description')
            ->add('status')
            

//            ->add('posts')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('site_id')
            ->add('status')
//            ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
/*        $errorElement
            ->with('name')
                ->assertMaxLength(array('limit' => 32))
            ->end()*/
        ;
    }
}
