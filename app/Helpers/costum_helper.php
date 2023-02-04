<?php
function userLogin()
{
    $db = \Config\Database::connect();
    return $db->table('user')->where('username', session('username'))->get()->getRow();
}