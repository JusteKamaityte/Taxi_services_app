<?php
namespace App\Views\Forms\Auth;

use Core\Views\Form;

class LoginForm extends Form
{

    public function __construct(array $form = []){
        $form = [
            'attr' => [
                'id' => 'login-form',
                'class' => 'reg-login-form'
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'name@email.com'
                        ],
                    ],
                    'validate' => [
                        'validate_not_empty',
                        'validate_email',
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'value' => '',
                    'validate' => [
                        'validate_not_empty',
                    ],
                ],
            ],
            'buttons' => [
                'action' => [
                    'text' => 'login',
                    'name' => 'action',
                ],
            ],
            'validators' => [
                'validate_login',
            ],
        ];

        parent::__construct($form);
    }

}
