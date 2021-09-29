<?php declare(strict_types=1);


namespace mzb\Controller;

class Controller
{
    public function render(string $page, $data=[])
    {
        if (isset($data) && is_array($data) && count($data) > 0) {
            extract($data);
        }

   
        require_once ROOT . DS . 'src'. DS .'Views'. DS . 'Header.php';

        require_once ROOT . DS . 'src'. DS .'Views'. DS . 'Navigation.php';
       

        require_once ROOT . DS . 'src'. DS .'Views'. DS . $page . '.php';
         
        
        require_once ROOT . DS . 'src'. DS .'Views'. DS . 'Footer.php';
    }
}
