<?php

namespace Koory\BackBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class RestaurantAdmin
 */
class RestaurantAdmin extends AbstractAdmin
{

    /**
     * @var string
     */
    protected $baseRoutePattern = 'restaurant';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $restaurant = $this->getSubject();

        $fileFieldOptions = [
            'required' => true,
            'label' => 'Image'
        ];
        if ($restaurant && ($webPath = $restaurant->getImageWebPath())) {
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
                    ->add('speciality', ChoiceType::class, [
                        'label' => 'Speciality',
                        'choices'  => [
                            'Africain' => 'Africain',
                            'Indien' => 'Indien',
                        ],
                    ])
                    ->add('description', TextType::class, [
                        'label' => 'Description'
                    ])
                    ->add('address', TextType::class, [
                        'label' => 'Address'
                    ])
                    ->add('city', TextType::class, [
                        'label' => 'City'
                    ])
                    ->add('postal_code', TextType::class, [
                        'label' => 'Postal code'
                    ])
                    ->add('geocode', TextType::class, [
                        'label' => 'Postal code'
                    ])
                    ->add('phone_number', TextType::class, [
                        'label' => 'Phone Number'
                    ])
                    ->add('email', EmailType::class, [
                        'label' => 'Email'
                    ])
                    ->add('price_range', ChoiceType::class, [
                        'label' => 'Price range',
                        'choices'  => [
                            '$' => '1',
                            '$$' => '2',
                            '$$$' => '3',
                        ],
                    ])
                    ->add('open', CheckboxType::class, [
                        'label' => 'Is open'
                    ])
                    ->add('status', CheckboxType::class, [
                        'label' => 'Status'
                    ])
                    ->add('file', FileType::class, $fileFieldOptions)
                ->end()
            ->end()
            ->tab('Owwner')
                ->with('Content')
                    ->add('owner_firstname', TextType::class, [
                        'label' => 'Owner Firstname'
                    ])
                    ->add('owner_lastname', TextType::class, [
                        'label' => 'Owner Lastname'
                    ])
                    ->add('owner_phone_number', TextType::class, [
                        'label' => 'Owner Phone Number'
                    ])
                    ->add('owner_email', TextType::class, [
                        'label' => 'Owner Email'
                    ])
                    ->add('postal_code', TextType::class, [
                        'label' => 'Postal code'
                    ])
                    ->add('geocode', TextType::class, [
                        'label' => 'Postal code'
                    ])
                ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('speciality')
            ->add('description')
            ->add('city')
            ->add('status')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('speciality')
            ->addIdentifier('description')
            ->addIdentifier('city')
            ->addIdentifier('status')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('speciality')
        ;
    }
}