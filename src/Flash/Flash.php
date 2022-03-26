<?php
declare(strict_types=1);
namespace mzb\Flash;
use mzb\Session\Session;

/**
 * Flash messages
 *
 * @package mzb\Flash
 * @author  Mohammed Bensaad
 */

class  Flash
{
    static $session;

    public function __construct()
    {
        self::$session = new Session();
        self::$session->start();

    }

    public static function setMessage($key, $value)
    {
        self::$session->set($key, $value);

    }

    public static function getMessage($key)
    {
        if(self::$session->has($key))
        {
            $value = self::$session->get($key);
            self::$session->remove($key);
            return $value;
        }
    }

    public static function removeMessage($key)
    {
        self::$session->remove($key);
    }
}