<?php

namespace phpBB\StatusSiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChecksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('slug')
            ->add('status_code')
            ->add('status')
            ->add('check_time')
            ->add('pingdom_id')
            ->add('lastresponse')
            ->add('site_id')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'phpBB\StatusSiteBundle\Entity\Checks'
        ));
    }

    public function getName()
    {
        return 'phpbb_statussitebundle_checkstype';
    }
}
