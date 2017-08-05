<?php


namespace MVC\Example2\Domain\User;

use MVC\Example1\Model;
use MVC\Example2\DataSource\Record;

class PostModel
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get keywords from kmeans clusterer
     * @return array
     */
    public function getKeywords(): array
    {
        $kMeans = new KMeans(2);
        $vectorizer = new StringVectorize();
        $samples = $vectorizer->vectorize($this->getContent());
        return $kMeans->cluster($samples);
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

}