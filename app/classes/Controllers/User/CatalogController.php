<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Services\Service;
use App\Views\Catalog;
use App\Views\Content;

class CatalogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->page->setTitle('Home');
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * There can be more methods,
     * like edit (for showing edit form)
     * delete (for deleting an item)
     * and more if needed,
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create(),
     * edit() and
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * edit.php:
     * $controller = new ProductsController();
     * print $controller->edit();
     *
     *
     * create.php:
     * $controller = new ProductsController();
     * print $controller->create();
     *
     * @return string|null
     * @throws \Exception
     */
    function index(): ?string
    {
        $user = \App\App::$session->getUser();
        $user ? $user_role = $user->getRole() : null;

        if ($user) {
            $h1 = 'Hello ' . $user->getName() . '!';
        } else {
            $h1 = 'You are not logged in !';
        }

        $services = \App\Services\Model::getWhere();
        if ($services) {
            $catalog = [];

            foreach ($services as $service) {
                $catalog['service'] = $service;

                if (\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
                    $form = new \App\Views\Forms\Catalog\AddServiceForm($service->getId());
                    $catalog['form'] = $form;
                }
            }
            $catalog = new \App\Views\Catalog($catalog);
        } else {
            $catalog = new Catalog();
        }

        if (isset($form) && $form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $safe_input['user_id'] = (\App\App::$session->getUser())->getId();

        }

        $catalog = new \App\Views\Catalog();
            $content = new Content([
                'h1' => $h1,
                'catalog' => $catalog->render()
            ]);

            $this->page->setContent($content->render('content/user/catalog.tpl.php'));

            return $this->page->render();
        }
    }

