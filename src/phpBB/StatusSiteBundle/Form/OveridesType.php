<?php

namespace phpBB\StatusSiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OveridesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start_time')
            ->add('end_time')
            ->add('up_down')
            ->add('finished', null, array('required' => false))
            ->add('site_id')
            ->add('update_id')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'phpBB\StatusSiteBundle\Entity\Overides'
        ));
    }

    public function getName()
    {
        return 'phpbb_statussitebundle_overidestype';
    }
}
