<?php


namespace MVC\Example2\DataSource;


use MongoDB\Driver\Query;

class Gateway
{
    /**
     * @var DataSource
     */
    private $dataSource;
    /**
     * @var string
     */
    private $object;

    /**
     * Gateway constructor.
     * @param DataSource $dataSource
     * @param string $object the data object to perform operations on
     */
    public function __construct(DataSource $dataSource, string $object)
    {
        $this->dataSource = $dataSource;
        $this->object = $object;
    }

    public function insert(Record $record): bool
    {
        return true;
    }

    public function delete(Record $record): bool
    {
        return true;
    }

    public function update(Record $record): bool
    {
        return true;
    }

    public function select(): RecordSet
    {
        $set = new RecordSet();

        // sql for example
        $sql = 'select * from ' . $this->object;
        foreach ($this->dataSource->execute($sql) as $entry){
            $set->push($entry);
        }
        return $set;
    }

}