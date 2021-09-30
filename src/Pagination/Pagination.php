<?php

namespace mzb\Pagination;

// create a new class for pagination
class Pagination
{
    // create a new property for the number of items
    private $items;

    // create a new property for the number of items per page
    private $itemsPerPage;

    // create a new property for the current page
    private $currentPage;

    // create a new property for the number of pages
    private $pages;

    // create a new property for the number of items per page
    private $itemsPerPage;

    // create a new property for the number of items per page
    private $itemsPerPage;


    public function __construct($items, $itemsPerPage)
    {
        // set the number of items
        $this->items = $items;


        // set the number of items per page
        $this->itemsPerPage = $itemsPerPage;
    }
    
    // create a new method for getting the number of pages
    public function getPages()
    {
        // calculate the number of pages
        $this->pages = ceil($this->items / $this->itemsPerPage);

        // return the number of pages
        return $this->pages;
    }

    // create a new method for getting the current page
    public function getCurrentPage()
    {
        // get the current page from the URL
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    
        // return the current page
        return $this->currentPage;
    }
    
    // create a new method for getting the offset
    public function getOffset()
    {
        // get the current page
        $this->getCurrentPage();
        
        // calculate the offset
        $offset = ($this->currentPage - 1) * $this->itemsPerPage;
        
        // return the offset
        return $offset;
    }
    
    // create a new method for getting the limit
    public function getLimit()
    {
        // return the limit
        return $this->itemsPerPage;
    }
}
