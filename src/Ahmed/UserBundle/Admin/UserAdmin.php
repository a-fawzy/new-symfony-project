<?php

namespace Ahmed\UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends AbstractAdmin {

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('username')
                ->add('email')
                ->add('enabled')
                ->add('lastLogin')
                ->add('locked')
                ->add('expired')
                ->add('roles')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('username')
                ->add('email')
                ->add('enabled')
                ->add('lastLogin')
                ->add('locked')
                ->add('expired')
                ->add('roles')
                ->add('_action', null, array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $roles = array('Admin' => 'ROLE_ADMIN');

        $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
            ->end()
            ->with('Management')
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'required' => true,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Confirm Password'),
                    'required' => false
                ))
                ->add('rolesAsString', 'choice', array('choices' => $roles))
                ->add('enabled', null, array('required' => false))
                ->setHelps(array('enabled' => 'Check this to approve user'))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('username')
                ->add('email')
                ->add('enabled')
                ->add('lastLogin')
                ->add('roles')
        ;
    }

}
