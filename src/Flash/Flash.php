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
    private $session;

    /**
     * Constructor
     *
     * @param Session $session
     */
    public function __construct()
    {
        $this->session = new Session();
        $this->session->start();

    }

    /**
     * Set flash message
     *
     * @param string $message
     * @param string $type
     * @return void
     */
    public function setMessage($key, $value)
    {
        $this->session->set($key, $value);

    }

    /**
     * Get flash message
     *
     * @param string $key
     * @return string
     */
    public function getMessage($key)
    {
        if($this->session->has($key))
        {
            $value = $this->session->get($key);
            $this->session->remove($key);
            return $value;
        }
    }

    /**
     * Check if flash message exists
     *
     * @param string $key
     * @return bool
     */
    public function removeMessage($key)
    {
        $this->session->remove($key);
    }
}