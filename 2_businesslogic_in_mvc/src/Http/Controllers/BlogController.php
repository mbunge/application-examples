<?php


namespace Application\Http\Controllers;

use Application\Domain\User\PostRepository;
use Application\Domain\User\PostService;
use Application\Presentation;
use Application\Presentation\Presenters\PostPresenter;

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
    public function getPost(Request $request): Response
    {
        // get input data
        $data = $request->getInput();

        // recognize domain model
        $model = $this->postService->loadPost($data['identifier']);

        // build presentation
        $presenter = new PostPresenter(new Presentation\PostPresentationModel($model, $request));
        $presentationModel = $presenter->present();

        // build http response
        $response = new Response();
        $response->getBody()->write($presentationModel->getOutput());

        return $response;
    }

}