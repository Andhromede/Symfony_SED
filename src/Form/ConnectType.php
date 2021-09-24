<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ConnectType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('login', TextType::class,[
                'attr' => [ 'class' => 'form-control',
                            'placeholder' => 'Login',
                            'name' => 'login',
                            'required'
                          ]
            ])

            ->add('email', EmailType::class,[
                'attr' => [ 'class' => 'form-control',
                            'placeholder' => 'Email',
                            'name' => 'email',
                            'required'
                          ]
            ])

            ->add('password', PasswordType::class,[
                'attr' => [ 'class' => 'form-control',
                            'placeholder' => 'Mots de passe',
                            'name' => 'password',
                            'required'
                          ]
            ])

            ->add('confirmPassword', PasswordType::class,[   
                    'mapped' => false, 'required' => true,

                    'attr' => [ 'class' => 'form-control',
                            'placeholder' => 'Mots de passe',
                            'name' => 'password',
                            'required']
                ])

            ->add('role', ChoiceType::class,[
                'choices' => [  'Administrateur' => true,
                                'Utilisateur' => true
                            ],
                
                'label' => 'Role',

                'attr' => [ 'class' => 'form-control',
                            'input' => 'title',
                            'name' => 'role',
                            'id' => 'role'
                          ]
            ])

            ->add('actif', TextType::class,[
                'attr' => [ 'class' => 'form-control',
                            'placeholder' => 'Login',
                            'name' => 'login',
                            'required'
                          ]
            ])

            ->add('submit', SubmitType::class,[
              'attr' => [ 'class' => 'btn login_btn col-4',
                          'value' => 'Valider'
                        ]
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
