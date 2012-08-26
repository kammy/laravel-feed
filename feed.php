<?php

class Feed
{

    public $items = array();

    public $title;
    public $description;
    public $link;
    public $pubdate;


    /**
     * Add new item to $items array
     */
    public function add($title, $author, $link, $pubdate, $description)
    {
        $this->items[] = array(
            'title' => $title,
            'author' => $author,
            'link' => $link,
            'pubdate' => $pubdate,
            'description' => $description
        );
    }


    /**
     * Returns aggregated feed with all $items
     */
    public function render($format = 'atom')
    {
        $channel = array(
            'title'=>$this->title,
            'description'=>$this->description,
            'link'=>$this->link,
            'pubdate'=>$this->pubdate
        );
        
        return Response::make(Response::view('feed::'.$format, array('items' => $this->items, 'channel' => $channel) ), 200, array('Content-type' => 'text/xml; charset=utf-8'));
    }

}