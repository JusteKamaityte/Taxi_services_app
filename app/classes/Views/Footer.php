<?php
namespace App\Views;
use Core\View;

class Footer extends View{

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->data['text'] = '&copy2020 Justė Kamaitytė, all rights reserved ;';
    }

    public function render(string $template_path = ROOT . '/app/templates/footer.tpl.php')
    {
        return parent::render($template_path);
    }
}