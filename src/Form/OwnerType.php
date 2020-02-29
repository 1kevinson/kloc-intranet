<?php


namespace App\Form;


use App\Entity\Users\Owner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class OwnerType extends AbstractType
{

    #region constantes
    #endregion

    #region properties
    #endregion

    #region constructor
    #endregion

    #region getters / setters
    #endregion

    #region methods
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName',TextType::class,[
                'label' => 'Nom Complet'
            ])
            ->add('username',TextType::class,[
                'label' => 'Nom d\'utilisateur '
            ])
            ->add('email',EmailType::class,[
                'label' => 'Adresse email'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer mot de passe']
            ])
            ->add('profilePictureFile',FileType::class, [
                'label' => 'Votre Photo',
                'attr' => array(
                    'placeholder' => 'Chargez une image',
                ),
                'required' => false,
                'empty_data' => 'NO_PICTURE'
            ])
            ->add('termsAgreed', CheckboxType::class, [
                'mapped' => false,
                'constraints' => new IsTrue(),
                'label' => 'J\'accepte les conditions d\'utilisation du site',
                'label_attr' => array(
                    'class' => 'ml-1'
                )
            ])
            ->add('Register', SubmitType::class, [
                'label' => 'Enregistrement'
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => Owner::class
                               ]);
    }
    #endregion

}