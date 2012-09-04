<?php
/**
 * Feed generator class for laravel-feed bundle.
 * 
 * @author Roumen Damianoff <roumen@dawebs.com>
 * @version 1.1
 * @link https://github.com/RoumenMe/laravel-feed GitHub
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

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
     * Returns aggregated feed with all items from $items array
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