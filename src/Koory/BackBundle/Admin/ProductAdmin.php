<?php
namespace Koory\BackBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/**
 * Class ProductAdmin
 *
 * @package Koory\BackBundle\Admin
 */
class ProductAdmin extends AbstractAdmin
{
    /**
     * @var string
     */
    protected $baseRoutePattern = 'product';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $product = $this->getSubject();

        $fileFieldOptions = [
            'required' => true,
            'label' => 'Image'
        ];
        if ($product && ($webPath = $product->getImageWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }

        $formMapper
            ->tab('Identity')
                ->with('General Informations')
                    ->add('name', TextType::class, [
                        'label' => 'Name'
                    ])
                    ->add('type', ChoiceType::class, [
                        'label' => 'Type',
                        'choices'  => [
                            'Entrée' => 'Entrée',
                            'Plat' => 'Plat',
                            'Dessert' => 'Dessert',
                            'Boisson' => 'Boisson'
                        ],
                    ])
                    ->add('description', TextType::class, [
                        'label' => 'Description'
                    ])

                    ->add('is_available', CheckboxType::class, [
                        'label' => 'Is available'
                    ])
                    ->add('price', MoneyType::class, [
                        'label' => 'Price'
                    ])
                    ->add('file', FileType::class, $fileFieldOptions)
                    ->add('restaurant', 'sonata_type_model_autocomplete', [
                        'property' => 'name',
                        'to_string_callback' => function($entity, $property) {
                            return $entity->getName();
                        },
                    ])
                ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type')
            ->add('description')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('type')
            ->addIdentifier('description')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('type')
        ;
    }
}