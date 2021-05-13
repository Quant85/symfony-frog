<?php

namespace App\Form;

use App\Entity\Messaggio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titolo', TextType::class, [
                'attr' => ['class' => 'my-md-3'],
                'required' => true])
            ->add('testo', TextareaType::class, [
                'attr' => ['class' => 'my-md-3'],
                'required' => true])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'my-md-3'],
                'required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Messaggio::class,
        ]);
    }
}
