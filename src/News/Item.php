<?php

namespace News;

class Item implements \JsonSerializable
{
    protected $title;

    protected $content;

    protected $lang;

    protected $created_at;

    protected $link;

    /**
     * @param string    $title
     * @param string    $content
     * @param strng     $lang
     * @param \DateTime $created_at
     * @param string    $link
     */
    public function __construct($title, $content, $lang, \DateTime $created_at, $link)
    {
        $this->title      = $title;
        $this->content    = $content;
        $this->lang       = $lang;
        $this->created_at = $created_at;
        $this->link       = $link;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    function jsonSerialize()
    {
        return [
            'title'      => $this->getTitle(),
            'content'    => $this->getContent(),
            'lang'       => $this->getLang(),
            'created_at' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'link'       => $this->getLink(),

        ];
    }

}