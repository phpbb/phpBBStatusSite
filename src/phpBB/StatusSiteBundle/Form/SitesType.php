<?php

namespace phpBB\StatusSiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('slug')
            ->add('url')
            ->add('front_page')
            ->add('status')
            ->add('statusCode')
            ->add('major', null, array('required' => false))
            ->add('team', null, array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'phpBB\StatusSiteBundle\Entity\Sites'
        ));
    }

    public function getName()
    {
        return 'phpbb_statussitebundle_sitestype';
    }
}
