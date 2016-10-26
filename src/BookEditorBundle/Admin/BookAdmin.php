<?php
namespace BookEditorBundle\Admin;


use BookEditorBundle\Entity\Book;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BookAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array(
                'label' => 'Titre',
                'required' => true
            ))
            ->add('author', 'text', array(
                'label' => 'Auteur',
                'required' => true
            ))
            ->add('description', 'text', array(
                'label' => 'Description',
                'required' => true
            ))
            ->add('facebookLinkUrl', 'text', array(
                'label' => 'Lien vers la page Facebook',
                'required' => false
            ))
            ->add('imageUrl', 'file', array(
                'label' => 'Image de la couverture',
                'required' => true
            ))
            ->add('pressTitle', 'text', array(
                'label' => 'Titre de l\'article de presse',
                'required' => false
            ))
            ->add('pressImageUrl', 'file', array(
                'label' => 'Image de l\'article de presse',
                'required' => false
            ))
            ->add('releaseDate', 'date', array(
                'label' => 'Date de publication',
                'required' => true
            ))
            ->add('purchaseOrderImageUrl', 'file', array(
                'label' => 'Bon de commande',
                'required' => false
            ))
            ->add('slug', 'text', array(
                'label' => 'Slug',
                'required' => true
            ))
        ;
    }

    // La liste des champs à partir desquels on pourra filtrer
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
        ;
    }

    // Les champs que l'on veut voir dans la liste
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('description')
        ;
    }

    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload(Book $image)
    {
        if ($image->getCoverImg() || $image->getPressImg() || $image->getPurchaseOrderImg()) {
            $image->refreshUpdated();
        }
    }

}