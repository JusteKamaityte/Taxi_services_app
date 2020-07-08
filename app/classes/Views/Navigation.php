<?php

namespace App\Views;

use App\App;
use App\Users\User;
use Core\Router;
use Core\View;

class Navigation extends View
{
    public function __construct($data = [])
    {
        $user = App::$session->getUser();
        if($user){
            switch ($user->getRole()){
                case User::ROLE_USER:
                    $data = $this->getUserNavigation();
                    break;

                    case User::ROLE_ADMIN:
                        $data = $this->getAdminNavigation();
                    break;
            }
        }else{
            $data = $this->getAnonymousNavigation();
        }
        parent::__construct($data);

    }

    public function render(string $template_path = ROOT . '/app/templates/nav.tpl.php')
    {
        return parent::render($template_path);
    }

    public function getUserNavigation(){
        return [
            'left_buttons' => [
                'home' => [
                    'text' => 'Home',
                    'href' => Router::getUrl('index')
                ],
                'feedback' => [
                    'text' => 'Feedback',
                    'href' => Router::getUrl('feedback')
                ]
            ],
            'right_buttons' => [
                'logout' => [
                    'text' => 'Logout',
                    'href' => Router::getUrl('logout')
                ],
            ]
        ];
    }

    public function getAdminNavigation(){
        return [
            'left_buttons' => [
                'home' => [
                    'text' => 'Home',
                    'href' => Router::getUrl('index')
                ],
//                'add' => [
//                    'text' => 'Add Service',
//                    'href' => Router::getUrl('admin.add')
//                ],
//                'view' => [
//                    'text' => 'Service catalog',
//                    'href' => Router::getUrl('admin.view')
//                ],
//                'orders' => [
//                    'text' => 'Orders',
//                    'href' => Router::getUrl('admin.orders.index')
//                ],
            ],
            'right_buttons' => [
                'logout' => [
                    'text' => 'Atsijungti',
                    'href' => Router::getUrl('logout')
                ],
            ]
        ];
    }

    public function getAnonymousNavigation(){
        return [
            'left_buttons' => [
                'home' => [
                    'text' => 'Home',
                    'href' => Router::getUrl('index')
                ],
                'feedback' => [
                    'text' => 'Feedback',
                    'href' => Router::getUrl('feedback')
                ]
            ],
            'right_buttons' => [
                'login' => [
                    'text' => 'Login',
                    'href' => Router::getUrl('login')
                ],
                'register' => [
                    'text' => 'Register',
                    'href' => Router::getUrl('register')
                ]
            ]
        ];
    }
}
