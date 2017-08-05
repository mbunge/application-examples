<?php


namespace MVC\Example2\DataSource;


class DataSource
{

    public function connect()
    {

    }

    public function disconnect()
    {

    }

    /**
     * @param $query
     * @return \Generator
     */
    public function execute($query)
    {
        // some magic happends here. we return sample data

        yield [
            'id' => '1',
            'name' => 'testuser'
        ];


        yield [
            'id' => '2',
            'name' => 'testuser2'
        ];
    }

    public function createGateway($object): Gateway
    {
        return new Gateway($this, $object);
    }

}