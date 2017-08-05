<?php


namespace MVC\Example2\Domain\User;


use MVC\Example2\DataSource\DataSource;

class PostRepository
{
    /**
     * @var DataSource
     */
    private $dataSource;

    /**
     * Repository constructor.
     * @param DataSource $dataSource
     */
    public function __construct(DataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * Find by slug
     *
     * @param $slug
     * @return PostModel|null
     */
    public function findBySlug($slug)
    {
        $record = $this->dataSource->newQuery()
            ->from('posts')
            ->where('slug', $slug)
            ->first();

        if (null === $record) {
            return null;
        }

        return $this->buildModel($record);
    }

    /**
     * Find by id
     *
     * @param int $id
     * @return PostModel|null
     */
    public function find(int $id)
    {
        $record = $this->dataSource->newQuery()
            ->from('posts')
            ->where('id', $id)
            ->first();

        if (null === $record) {
            return null;
        }

        return $this->buildModel($record);
    }

    /**
     * @param $record
     * @return PostModel
     */
    private function buildModel($record): PostModel
    {
        $model = new PostModel();
        $model->setTitle($record->title);
        $model->setContent($record->content);
        $model->setSlug($record->slug);
        return $model;
    }

}