<?php declare(strict_types=1);

namespace mzb\Security;

class Session
{
    public function get_session(string $name)
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = [];
        }
        return $_SESSION[$name];
    }

    public function set_session(string $name, array $data)
    {
        $_SESSION[$name] = $data;
    }

    public function destroy_session(string $name)
    {
        unset($_SESSION[$name]);
    }
    
    public function destroy_all_sessions()
    {
        $_SESSION = [];
    }
    
    public function destroy_all_sessions_except(array $except)
    {
        foreach ($_SESSION as $key => $value) {
            if (!in_array($key, $except)) {
                unset($_SESSION[$key]);
            }
        }
    }
}
