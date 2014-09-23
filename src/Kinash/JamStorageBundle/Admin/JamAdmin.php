<?php
namespace Kinash\JamStorageBundle\Admin;

use Kinash\JamStorageBundle\Service\CloneService;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Kinash\JamStorageBundle\Service\CloneSevice;


class JamAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';
    protected $cloneService;
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('type', 'entity', array('class' => 'Kinash\JamStorageBundle\Entity\Type'))
            ->add('year', 'entity', array('class' => 'Kinash\JamStorageBundle\Entity\Year'))
            ->add('comment');
        if ($this->getSubject()->getId() == 0) {
            $formMapper->add('count', 'number', array('mapped' => false,'data'=>1));
        }


        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('type')
            ->add('year')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('type')
            ->add('year')
            ->add('comment')
            ->add('_action', 'actions', array(
            'actions' => array(
                'delete'=>array()
            )
         ));
    }


    public function postPersist($entity)
    {
        $form = $this->getForm();
        if ($form->offsetExists('count')) {
            $count = intval($form->get('count')->getData());
            $this->cloneService->duplicate($entity, $count - 1);
        }

    }


    public function setCloneService(CloneService $cloneService){
        $this->cloneService = $cloneService;
    }

}