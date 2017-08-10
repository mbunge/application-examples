<?php


namespace Application\Presentation;


use Application\Domain\DomainModel;

interface PresentationModel
{
    /**
     * @return DomainModel
     */
    public function getDomainModel(): DomainModel;

    /**
     * @return mixed
     */
    public function getInput();

    /**
     * @return string
     */
    public function getOutput(): string;
}