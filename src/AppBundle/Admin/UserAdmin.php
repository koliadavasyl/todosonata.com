<?php


namespace AppBundle\Admin;

use AppBundle\Entity\Task;
use AppBundle\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\DateType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class UserAdmin
 * @package AppBundle\Admin
 */
class UserAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('User:')
            ->with('Content', ['class' => 'col-md-9'])
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class)
            ->add('dateBirth', 'sonata_type_datetime_picker', [
                'required' => false,
                'dp_pick_time' => false,
                'format' => 'yyyy-mm-dd'
            ])
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
            ->tab('Tasks:')
            ->with('Meta data', ['class' => 'col-md-3'])
            ->add('task', EntityType::class, array(
                    'class' => Task::class,
                    'choice_label' => 'nameTask',
                    'multiple' => true,
                    'expanded' => true,
                )
            )->end()
            ->end();
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstName');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('firstName')
            ->add('lastName')
            ->add('email')
            ->add('dateBirth')
            ->add('dateCreate')
            ->add('dateUpdate');
    }

    /**
     * @param $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof User
            ? $object->getFirstName()
            : 'User'; // shown in the breadcrumb on the create view
    }
}