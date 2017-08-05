<?php


namespace MVC\Example1;


use ArrayObject;
use SplObjectStorage;

class View
{
    /**
     * @var Model
     */
    private $model;
    /**
     * @var string
     */
    private $file;

    /**
     * View constructor.
     * @param Model $model
     * @param string $file
     */
    public function __construct(string $file, Model $model)
    {
        $this->model = $model;
        $this->file = $file;
    }

    /**
     * Assign model to a view file
     * @return string
     */
    public function render(): string
    {
        $file = $this->resolve($this->file);
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