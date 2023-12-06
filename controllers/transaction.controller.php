<?php

class TransactionController
{

    public function view($userID)
    {


        // $opts = array('http' => array('header' => 'Cookie: ' . $_SERVER['HTTP_COOKIE'] . "\r\n"));
        // $context = stream_context_create($opts);
        // session_write_close(); // unlock the file

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

        $result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/views/transaction.php?' . $data, false, $stream);
        return $result;
    }
    public function getTransaction($userID)
    {
        include_once('../models/transaction.php');

        $transaction = new Transaction();
        $transactionItems = $transaction->listTransaction($userID);
        return $transactionItems;
    }
}