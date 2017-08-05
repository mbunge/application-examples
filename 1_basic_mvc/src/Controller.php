<?php


namespace MVC\Example1;


class Controller
{

    /**
     * Perform simple logic
     *
     * @return string
     */
    public function handle($request): string
    {
        $model = new Model();
        $view = new View(__DIR__ . '/../resources/viewFile.php', $model);

        return $view->render();
    }

}