<?php


namespace MVC\Example2\DataSource;


class Record extends \ArrayObject
{
    /**
     * @var string
     */
    private $objectName;

    /**
     * Record constructor.
     * @param string $objectName
     * @param array $input
     * @param int $flags
     * @param string $iterator_class
     */
    public function __construct(string $objectName, $input = array(), $flags = 0, $iterator_class = "ArrayIterator")
    {
        parent::__construct($input, $flags, $iterator_class);
        $this->objectName = $objectName;
    }

    /**
     * @return string
     */
    public function getObjectName(): string
    {
        return $this->objectName;
    }

}