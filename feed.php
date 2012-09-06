<?php
/**
 * Feed generator class for laravel-feed bundle.
 * 
 * @author Roumen Damianoff <roumen@dawebs.com>
 * @version 1.2
 * @link https://github.com/RoumenMe/laravel-feed GitHub
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

class Feed
{

    public $items = array();
    public $title = 'My feed title';
    public $description = 'My feed description';
    public $link;
    public $pubdate;
    public $lang;

    
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
        if (empty($this->lang)) $this->lang = Config::get('application.language');
        if (empty($this->link)) $this->link = Config::get('application.url');
        if (empty($this->pubdate)) $this->pubdate = date('D, d M Y H:i:s O');
        
        $channel = array(
            'title'=>$this->title,
            'description'=>$this->description,
            'link'=>$this->link,
            'pubdate'=>$this->pubdate,
            'lang'=>$this->lang
        );
        
        return Response::make(Response::view('feed::'.$format, array('items' => $this->items, 'channel' => $channel) ), 200, array('Content-type' => 'text/xml; charset=utf-8'));
    }

}