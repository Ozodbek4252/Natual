<?php

if (!function_exists('formatPhoneNumber')) {
    /**
     * Format phone number
     *
     * @param  string $number Phone
     * @return string
     */
    function formatPhoneNumber($number)
    {
        if (strpos($number, ' ') !== false) {
            return $number;
        }

        if (strlen($number) == 13 && strpos($number, '+') === 0) {
            $number = substr($number, 0, 4) . ' ' . substr($number, 4, 2) . ' ' . substr($number, 6, 3) . ' ' . substr($number, 9, 2) . ' ' . substr($number, 11);
        } elseif (strlen($number) == 9) {
            $number = substr($number, 0, 2) . ' ' . substr($number, 2, 3) . ' ' . substr($number, 5, 2) . ' ' . substr($number, 7);
        } elseif (strlen($number) == 7) {
            $number = substr($number, 0, 3) . ' ' . substr($number, 3, 2) . ' ' . substr($number, 5);
        } else {
            $number = $number;
        }

        return $number;
    }
}
