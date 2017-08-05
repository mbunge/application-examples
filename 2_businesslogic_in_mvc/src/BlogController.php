<?php


namespace MVC\Example2;

use MVC\Example1\View;
use MVC\Example2\DataSource\DataSource;
use MVC\Example2\Domain\User\PostRepository;
use MVC\Example2\Domain\User\PostService;

class BlogController
{

    /**
     * @var PostService
     */
    private $postService;

    public function __construct()
    {
        $this->postService = new PostService(new PostRepository(new DataSource()));
    }

    /**
     * Perform simple logic
     *
     * @return Response
     */
    public function getPost(Input $request): Response
    {
        // get input data
        $data = $request->getInput();

        // recognize domain model
        $model = $this->postService->loadPost($data['identifier']);

        // build view for http model
        // domain model could also converted to a view model
        $view = new View('blog/default', $model);

        // build http response
        $response = new Response();
        $response->getBody()->write($view->render());

        return $response;
    }

}