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
            ->add('port')
            ->add('check_interval')
            ->add('required_md5')
            ->add('ip')
            ->add('url')
            ->add('timeout')
            ->add('status_code')
            ->add('status')



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
            ->add('port')
            ->add('check_interval')
            ->add('required_md5')
            ->add('ip')
            ->add('url')
            ->add('timeout')
            ->add('status_code')

//            ->add('posts')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('site_id')
            ->add('port')
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
