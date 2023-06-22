<?php

namespace App\Form;

use App\Entity\Attack;
use App\Entity\Pokemon;
use App\Entity\Specie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('specie',null,[
                'class' => Specie::class,
                'label' => 'Pokemon',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false
            ])
            ->add('name', null, [
                'label'=>'Pseudo',
                'attr'=>[
                    'placeholder'=>'bulbipuce...'
                ]
            ])
            ->add('catchDay', null, [
                'label'=>'Date de capture',
                'attr'=>[
                    'class'=>'me-5'
                ]
            ])
            ->add('catchPlace', null, [
                'label'=>'Lieu de capture',
                'attr'=>[
                    'placeholder'=>'Bourg palette'
                ]
            ])
            ->add('level', null, [
                'label'=>'Niveau',
                'attr'=>[
                    'min'=>1,
                    'max'=>100,
                    'placeholder'=>1
                ]
            ])
            ->add('hp', null, [
                'label'=>'Points de vie',
                'attr'=>[
                    'min'=>1,
                    'max'=>300,
                    'placeholder'=>100
                ]
            ])
            ->add('shiny', null, [
                'label'=>'Chromatique',
                'attr'=>[
                    'class'=>'form-check-input'
                ]
            ])
            ->add('attacks', null, [
                'class' => Attack::class,
                'label' => 'Attaques',
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokemon::class,
        ]);
    }
}
