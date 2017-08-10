<?php


namespace Application\Presentation\Presenters;

use Application\Domain\User\PostModel;
use Application\Presentation\PresentationModel;
use Application\Presentation\Presenter;
use Application\Presentation\PostPresentationModel;

class PostPresenter implements Presenter
{
    /**
     * @var PostModel
     */
    private $model;

    /**
     * @param PostPresentationModel $model
     */
    public function __construct(PostPresentationModel $model)
    {
        $this->model = $model;
    }

    /**
     * Decorate presentation model
     *
     * @return PresentationModel
     */
    public function present(): PresentationModel
    {
        $model = $this->model;

        // we assign the presentation model,
        // for a better architecture we should assign a specific view model
        $view = new View('blog/post', $model);
        $this->model->setOutput($view->render());

        return $model;
    }
}