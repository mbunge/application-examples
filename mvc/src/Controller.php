<?php


namespace MVC;


class Controller
{

    public function handle(){
        $model = new Model();
        $view = new View($model);

        return $view->process(__DIR__ . '/../resources/viewFile.php');
    }

}