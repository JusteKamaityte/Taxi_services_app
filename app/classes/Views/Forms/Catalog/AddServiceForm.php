<?php

namespace App\Views\Forms\Catalog;

use Core\Views\Form;

class AddServiceForm extends Form
{
    public function __construct($id, array $form = [])
    {
        $form += [
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'service_id' => [
                    'value' => $id,
                    'type' => 'hidden',
                ]
            ],
            'buttons' => [
                'add_to_cart' => [
                    'text' => 'Order service',
                    'extra' => [
                        'attr' => [
                            'class' => 'add-service',
                        ]
                    ]
                ],
            ]
        ];

        parent::__construct($form);
    }
}