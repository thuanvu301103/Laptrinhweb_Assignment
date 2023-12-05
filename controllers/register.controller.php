<?php

class RegisterController
{


    public function view()
    {

        $result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/views/register.php', false);
        return $result;
    }
}
