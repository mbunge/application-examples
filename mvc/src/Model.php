<?php


namespace MVC;

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