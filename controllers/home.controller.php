<?php

class HomeController
{

    public function view()
    {

        $opts = array('http' => array('header' => 'Cookie: ' . $_SERVER['HTTP_COOKIE'] . "\r\n"));
        $context = stream_context_create($opts);
        session_write_close(); // unlock the file
        $result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/views/homepage.php', false, $context);
        session_start();
        return $result;
    }
}
