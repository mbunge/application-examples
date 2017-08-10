<?php


namespace Application\Presentation;


use Application\Domain\DomainModel;

class PostPresentationModel implements PresentationModel
{
    /**
     * @var DomainModel
     */
    private $domainModel;
    /**
     * @var string
     */
    private $output;
    /**
     * @var
     */
    private $input;

    /**
     * PresentationModel constructor.
     * @param DomainModel $domainModel
     * @param $input
     */
    public function __construct(DomainModel $domainModel, $input)
    {
        $this->domainModel = $domainModel;
        $this->input = $input;
    }

    /**
     * @return DomainModel
     */
    public function getDomainModel(): DomainModel
    {
        return $this->domainModel;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return $this->output;
    }

    /**
     * @param string $output
     */
    public function setOutput(string $output)
    {
        $this->output = $output;
    }

    /**
     * Get keywords from kmeans clusterer
     * @return array
     */
    public function getKeywords(): array
    {
        // for simplicity we declare decoration logic within this method
        // for a better architecture we should declare a decorator class
        $kMeans = new KMeans(2);
        $vectorizer = new StringVectorize();
        $samples = $vectorizer->vectorize($this->getContent());
        return $kMeans->cluster($samples);
    }

}