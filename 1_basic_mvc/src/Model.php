<?php


namespace MVC\Example1;

class Model
{

    /**
     * @return \ArrayAccess
     */
    public function loadData()
    {
        // we do not perform any logic at this point
        return new \ArrayObject(['hello' => 'world']);
    }
}