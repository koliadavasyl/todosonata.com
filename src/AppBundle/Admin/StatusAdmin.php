<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Status;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class StatusAdmin
 * @package AppBundle\Admin
 */
class StatusAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', TextType::class)
            ->add('descriptionStatus', TextareaType::class);
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('descriptionStatus');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->addIdentifier('title')
            ->add('descriptionStatus');
    }

    /**
     * @param $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Status
            ? $object->getTitle()
            : 'Task'; // shown in the breadcrumb on the create view
    }
}