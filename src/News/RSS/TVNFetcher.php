<?php

namespace News\RSS;

use News\Item;

class TVNFetcher
{
    const NEWS_FEED = 'http://www.tvn24.pl/najnowsze.xml';

    protected $rss;

    /**
     * @param \Vinelab\Rss\Rss $rss
     */
    public function __construct(\Vinelab\Rss\Rss $rss)
    {
        $this->rss = $rss;
    }

    public function getLatest($page = 1)
    {
        $items = [];
        $feed = $this->rss->feed(self::NEWS_FEED);
        foreach($feed->articles() as $article) {
            $items[] = new Item(
                $article->title,
                $article->description,
                'pl',
                new \DateTime($article->pubDate),
                $article->link
            );
        }

        return $items;
    }
}