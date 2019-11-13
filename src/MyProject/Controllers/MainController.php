<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\UsersAuthService;

class MainController extends AbstractController
{


    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles,
            'user' => UsersAuthService::getUserByToken()]);
    }


}