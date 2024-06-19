<?php

namespace App\Form;

use App\Entity\Article;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,[
                'constraints'=>[
                    new NotBlank([
                        'message' => 'Veuillez entrer un titre'
                    ])
                ]
            ])
            ->add('content',CKEditorType::class,[
                'constraints'=>[
                    new NotBlank([
                        'message' => 'Vous ne pouvez pas publier un article vide',
                    ])
                ]
            ])
            ->add('categorie')
            ->add('user')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
