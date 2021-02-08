<?php 
 
namespace App\Form;
 
use App\Entity\Infos;
use App\Classe\Search;
use App\Entity\Category;
use App\Entity\Categories;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 
class SearchType extends AbstractType 
{
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('string', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher un membre soit avec son nom ou son prénom',
                    'class' => 'w3-card w3-input w3-animate-input',
                ]
            ])
            ->add('infos', EntityType::class, [
                'label' => false,
                'required' => true,
                'class' => Categories::class,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Search',
                'attr' => [
                    'class' => 'w3-btn w3-blue-gray'
                ]
            ])
            ;
    }
 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>Search::class,
            'method' => 'GET',
            'crsf_protection' => false,
        ]);
    }
 
    public function getBlockPrefix()
    {
        return '';
    }
}