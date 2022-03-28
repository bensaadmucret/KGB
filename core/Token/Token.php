<?php declare(strict_types=1);

namespace Core\Token;

use Core\Session\Session;

class Token
{
    private  $token = '';

    public function __construct()
    {
        $this->session = new Session();
    }

    public function generateToken(): string
    {
        $token = '';
        $token .= bin2hex(random_bytes(32));
        $this->session->set('csrf_token', $token);       
        //$_SESSION['csrf_token'] = $token;
        $this->token = $token;
       
        return $token;
        
    }
    
    public function getToken(): string
    {
        return $this->token;
    }
    
    
   
    public function getTokenFromSession(): string
    {
        return $_SESSION['csrf_token'];
    }
    
    public function isTokenValidInSession(string $token): bool
    {
        return $token === $_SESSION['csrf_token'];
    }
    
    public function removeTokenFromSession(): void
    {
        unset($_SESSION['csrf_token']);
    }
    
    public function removeTokenFromSessionIfExists(): void
    {
        if (isset($_SESSION['csrf_token'])) {
            unset($_SESSION['csrf_token']);
        }
    }
    
    

    public function __toString()
    {
        return $this->generateToken();
    }
}