<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Views\Content;
use App\Views\Forms\Auth\LoginForm;
use App\Views\Forms\Buttons\Delete;
use App\Views\Forms\Buttons\Order;
use App\Views\Forms\FeedbackForm;
use Core\Views\Form;
use Core\Views\Table;

class FeedbackController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->page->setTitle('Feedbacks');

        date_default_timezone_set('Europe/Vilnius');
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
        require ROOT . '/app/data/tables/feedback.php';

        $user = \App\App::$session->getUser();
//        $user ? $user_role = $user->getRole() : null;
        $form = new FeedbackForm($user);

        $user = \App\Feedbacks\Model::getWhere([]);
        if ($user) {
            foreach ($user as $comment) {
                $delete = new Delete($comment->getId());

                $row = [
                    'id' => $comment->getId(),
                    'name' => $comment->getName(),
                    'date' => $comment->getDate(),
                    'feedback' => $comment->getFeedback(),
                    'delete' => $delete->render()
                ];

                $table['tbody'][] = $row;
            }
            $h1 = 'Feedbacks';
            $table = new \Core\Views\Table();
        } else {
            $h1 = 'Want to leave a feedback register !';
        }


        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $feedback = new \App\Feedbacks\Feedback($safe_input);
            $feedback->setRole(\App\Users\User::ROLE_USER);

            $feedback_id = \App\Feedbacks\Model::insert($user);
            $feedback->setId($feedback_id);
            \App\Feedbacks\Model::update($feedback);
            header("Location: /feedback");
        }

        $content = new Content([
            'h1' => $h1,
//            'table' => $table->render(),
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('content/user/feedback.tpl.php'));

        return $this->page->render();
    }
}
