<?php

namespace mzb\Pagination;

class Pagination
{
    private $_items;

 
    private $_itemsPerPage;

   
    private $_currentPage;


    private $_pages;

   
    private $itemsPerPage;

   
    private $itemsPerPage;

    /**
     *
     *
     * @param [type] $items
     * @param [type] $itemsPerPage
     */
    public function __construct($items, $itemsPerPage)
    {
        $this->items = $items;
        $this->itemsPerPage = $itemsPerPage;
    }
    
    /**
     * getting the number of pages
     * calculate the number of pages
     *
     * @return void
     */
    public function getPages()
    {
        $this->pages = ceil($this->items / $this->itemsPerPage);
        return $this->pages;
    }

    /**
     * getting the current page
     *
     * @return void
     */
    public function getCurrentPage()
    {
        $this->currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    
        
        return $this->currentPage;
    }
    
    
    public function getOffset()
    {
        $this->getCurrentPage();
        
       
        $offset = ($this->currentPage - 1) * $this->itemsPerPage;
        
        
        return $offset;
    }
    
    /**
     *
     * @return void
     */
    public function getLimit()
    {
        return $this->itemsPerPage;
    }
}
