<?php
function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}
function getSession($key)
{
    return $_SESSION[$key];
}
function removeSession($key)
{
    unset($_SESSION[$key]);
}
function setFlashData($key, $value)
{
    $_SESSION[$key] = $value;
}
function getFlashData($key)
{
    $data = isset($_SESSION[$key]) ? $_SESSION[$key] : '';
    removeSession($key);
    return $data;
}
