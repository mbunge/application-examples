<?php


namespace MVC;


use ArrayObject;
use SplObjectStorage;

class View
{
    /**
     * @var Model
     */
    private $model;

    /**
     * View constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Assign model to a view file
     * @param $file
     * @return string
     */
    public function process($file): string
    {
        $file = $this->resolve($file);

        return $this->capture($file, $this->model);
    }

    /**
     * Optimistic output capturing from view file
     *
     * $model is accessible within view file
     *
     * @param $file
     * @param $model
     * @return string
     */
    private function capture($file, Model $model): string
    {
        ob_start();
        require_once $file;
        return ob_end_clean();
    }

    /**
     * Resolves file
     *
     * @param $file
     * @return string
     */
    private function resolve($file): string
    {
        $file = realpath($file);

        if (false === $file) {
            throw new \RuntimeException('View not found');
        }

        return $file;
    }
}