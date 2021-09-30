<?php declare(strict_types=1);


namespace mzb\Controller;

use Nette\Http\RequestFactory;

class Controller
{
    public function httpRequest()
    {
        $factory = new RequestFactory;
        $httpRequest = $factory->fromGlobals();
        return $httpRequest->getPost();
    }
    public function render(string $page, $data=[])
    {
        if (isset($data) && is_array($data) && count($data) > 0) {
            extract($data);
        }

  
        require_once ROOT .  DS . 'src'. DS .'Views'. DS . 'Header.php';

        require_once ROOT .  DS . 'src'. DS .'Views'. DS . 'Navigation.php';
       

        require_once ROOT .  DS . 'src'. DS .'Views'. DS . $page . '.php';
         
        
        require_once ROOT .  DS . 'src'. DS .'Views'. DS . 'Footer.php';
    }
}
