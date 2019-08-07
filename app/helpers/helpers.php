<?php

if (!function_exists('is_active')) {
    function is_active(String $routeName)
    {
        return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '';
    }
}