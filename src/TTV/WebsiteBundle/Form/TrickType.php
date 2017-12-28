<?php

namespace TTV\WebsiteBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
                    'label'         => 'Figure',
                    'attr'          => ['placeholder' => 'Saisissez le nom de la figure', 'autofocus' => true]])
                ->add('description', TextareaType::class)
                ->add('images', CollectionType::class, [
                    'entry_type'    => ImageType::class,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false])
                ->add('videos', CollectionType::class, [
                    'entry_type'    => VideoType::class,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false])
                ->add('category', EntityType::class, [
                    'class'         => 'TTV\WebsiteBundle\Entity\Category',
                    'choice_label'  => 'name',
                    'expanded'      => false,
                    'multiple'      => false,
                    'label'         => 'Groupe'])
                ->add('envoyer', SubmitType::class);

        /*$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
            $trick = $event->getData();

            if (null === $trick){ return; }
            if (!$trick -> getPublished() || null === $trick->getId()){
                $event->getForm()->add('published', CheckboxType::class, ['required' => false]);
            } else {
                $event->getForm()->remove('published');
            }});*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'TTV\WebsiteBundle\Entity\Trick']);
    }
}