<?php

class EditPasswordController
{
    public function view($userID)
    {

        $data = http_build_query(array('userid' => $userID));
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($data) . "\r\n" .
                    "User-Agent: MyAgent/1.0\r\n" .
                    "Cookie: " . $_SERVER['HTTP_COOKIE'] . "\r\n",
                'method' => 'GET',
                'content' => $data
            )
        );
        $stream = stream_context_create($options);
        session_write_close();

        $result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/views/editPassword.php?' . $data, false, $stream);
        return $result;
    }
}
