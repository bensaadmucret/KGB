<?php declare(strict_types=1);

namespace mzb\Security;

class Csrf
{
    private static $token = '';

    public function generateToken(): string
    {
        $token = '';
        $token .= bin2hex(random_bytes(32));
        self::$token = $token;
        return $token;
    }
    
    public function getToken(): string
    {
        return self::$token;
    }
    
    public function isTokenValid(string $token): bool
    {
        return $token === self::$token;
    }

    public function generateTokenAndSetItToSession(): void
    {
        $token = $this->generateToken();
        $_SESSION['csrf_token'] = $token;
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
    
    public function generateTokenAndSetItToSessionIfNotExists(): void
    {
        if (!isset($_SESSION['csrf_token'])) {
            $this->generateTokenAndSetItToSession();
        }
    }

    public function __toString()
    {
        return $this->generateToken();
    }
}
