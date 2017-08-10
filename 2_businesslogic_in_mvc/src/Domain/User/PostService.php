<?php


namespace Application\Domain\User;


use Application\Domain\DomainService;

class PostService implements DomainService
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * BusinessService constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Load post by id or slug
     *
     * @param $identifier
     * @return PostModel
     */
    public function loadPost($identifier): PostModel
    {
        $model = null;

        if (is_numeric($identifier)) {
            $model = $this->repository->find($identifier);
        } elseif (is_string($identifier)) {
            $model = $this->repository->findBySlug($identifier);
        }

        if (null === $model) {
            throw new PostNotFoundException('Unable to find post');
        }

        return $model;

    }

}