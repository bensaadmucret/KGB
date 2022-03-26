<?php

namespace mzb\Pagination;

/**
 * Pagination class
 *
 * @package mzb\Pagination
 */

// Create a new class pagination
 Class Pagination
 {
     // Create a new property
     protected $total;
     protected $perPage;
     protected $currentPage;
     protected $url;

     // Create a new method
     public function __construct($total, $perPage, $currentPage, $url)
     {
         $this->total = $total;
         $this->perPage = $perPage;
         $this->currentPage = $currentPage;
         $this->url = $url;
     }

     // Create a new method
     public function get()
     {
         // Get the total number of pages
         $pages = ceil($this->total / $this->perPage);

         // Get the current page
         $currentPage = $this->currentPage;

         // Create an array for the pagination items
         $items = [];

         // Create a first page
         $items[] = $this->createItem(1, 'First');

         // Create a previous page
         if ($currentPage > 1) {
             $items[] = $this->createItem($currentPage - 1, 'Previous');
         }

         // Create the pagination items
         for ($i = 1; $i <= $pages; $i++) {
             $items[] = $this->createItem($i, $i);
         }

         // Create a next page
         if ($currentPage < $pages) {
             $items[] = $this->createItem($currentPage + 1, 'Next');
         }

         // Create a last page
         $items[] = $this->createItem($pages, 'Last');

         // Create an array for the pagination
         $pagination = [
             'items' => $items,
             'total' => $this->total,
             'perPage' => $this->perPage,
             'currentPage' => $this->currentPage,
             'url' => $this->url,
         ];

         // Return the pagination array
         return $pagination;
     }

     // Create a new method
     protected function createItem($page, $text)
     {
         // Create an array for the pagination item
         $item = [
             'page' => $page,
             'text' => $text,
             'url' => $this->url . $page,
         ];

         // Return the pagination item array
         return $item;
     }
 }
