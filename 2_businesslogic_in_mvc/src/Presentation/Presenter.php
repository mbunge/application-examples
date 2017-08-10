<?php


namespace Application\Presentation;


interface Presenter
{

    /**
     * Decorate presentation model
     *
     * @return PresentationModel
     */
    public function present(): PresentationModel;

}