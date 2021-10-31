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
                                'required'
                              ]
            ])

            ->add('role', ChoiceType::class,[
                'multiple'=> false,
                
                'choices' => [  'Utilisateur' => 'ROLE_USER',
                                'Administrateur' => 'ROLE_ADMIN'
                             ],

                'attr' => [ 'class' => 'form-control d-none',
                            'input' => 'title',
                            'name' => 'role',
                            'id' => 'role'
                           //  'value' => 'ROLE_MODO'
                          ],

               //  'choice_attr' => [ 'Utilisateur' => ['attr' => 'selected',
               //                                       'value' => 'ROLE_USER'
               //                                      ],
               //                   ],
            ])

            ->add('actif', TextType::class,[
                'attr' => [ 'class' => 'form-control d-none',
                            'placeholder' => 'actif',
                            'name' => 'actif',
                            // 'required'
                            'value' => 'true',
                          ]
            ])

            ->add('submit', SubmitType::class,[
              'attr' => [ 'class' => 'btn login_btn col-4',
                          'value' => 'Valider'
                        ]
            ])
            //->setAction($this->generateUrl('/inscription'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
