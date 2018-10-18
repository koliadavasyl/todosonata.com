<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Status;
use AppBundle\Entity\Task;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\User;

/**
 * Class TaskAdmin
 * @package AppBundle\Admin
 */
class TaskAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('TASK')
            ->with('Content', ['class' => 'col-md-9'])
            ->add('nameTask', TextType::class)
            ->add('descriptionTask', TextareaType::class)
            ->add('dateCreate', 'sonata_type_datetime_picker', [
                'required' => false,
                'dp_pick_time' => false,
                'format' => 'yyyy-mm-dd'
            ])
            ->add('dateUpdate', 'sonata_type_datetime_picker', [
                'required' => false,
                'dp_pick_time' => false,
                'format' => 'yyyy-mm-dd'
            ])
            ->end()
            ->end()
            ->tab('Status:')
            ->with('data status', ['class' => 'col-md-3'])
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'title',

            ])
            ->end()
            ->end()
            ->tab('Users:')
            ->with('Data user', ['class' => 'col-md-3'])
            ->add('users', EntityType::class, array(
                    'class' => User::class,
                    'choice_label' => 'firstName',
                    'multiple' => true,
                    'expanded' => true,
                )
            )
            ->end();
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nameTask')
            ->add('status.title');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nameTask')
            ->add('descriptionTask')
            ->add('dateCreate')
            ->add('dateUpdate')
            ->add('status.title');
    }

    /**
     * @param $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Task
            ? $object->getNameTask()
            : 'Task'; // shown in the breadcrumb on the create view
    }
}