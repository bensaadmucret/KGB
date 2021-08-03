<?php

namespace mzb\Validator;

class Validator
{
    public function is_email($email)
    {
    

        // Test for the minimum length the email can be.
        if (strlen($email) < 6) {
            return false;
        }

        // Test for an @ character after the first position.
        if (strpos($email, '@', 1) === false) {
            return false;
        }

        // Split out the local and domain parts.
        list($local, $domain) = explode('@', $email, 2);

        // LOCAL PART
        // Test for invalid characters.
        if (! preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\.-]+$/', $local)) {
            return false;
        }

        // DOMAIN PART
        // Test for sequences of periods.
        if (preg_match('/\.{2,}/', $domain)) {
            return false;
        }

        // Test for leading and trailing periods and whitespace.
        if (trim($domain, " \t\n\r\0\x0B.") !== $domain) {
            return false;
        }

        // Split the domain into subs.
        $subs = explode('.', $domain);

        // Assume the domain will have at least two subs.
        if (2 > count($subs)) {
            return false;
        }

        // Loop through each sub.
        foreach ($subs as $sub) {
            // Test for leading and trailing hyphens and whitespace.
            if (trim($sub, " \t\n\r\0\x0B-") !== $sub) {
                return false;
            }

            // Test for invalid characters.
            if (! preg_match('/^[a-z0-9-]+$/i', $sub)) {
                return false;
            }
        }

        return true;
    }
}
