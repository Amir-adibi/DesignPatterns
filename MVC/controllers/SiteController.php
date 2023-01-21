<?php

namespace app\controllers;

use app\core\Application;

class SiteController
{
    public function home()
    {
        $params = [
            'name' => 'Hello World!'
        ];

        return Application::$app->router->renderView('contact', $params);
    }

    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public function handleContact()
    {
        return 'Handling submitted data';
    }
}