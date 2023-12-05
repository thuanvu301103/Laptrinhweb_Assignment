<?php

class ProductDetailController
{

    public function view($id)
    {
        $data = http_build_query(array('id' => $id));

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
        $result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/views/product_detail.php?' . $data, false, $stream);

        return $result;
    }

    public function getDetail($id)
    {
        include_once('../models/product.php');
        $product = new Products();
        $productDetail = $product->getDetail($id);
        return $productDetail;
    }

    public function getAmount($id)
    {
        include_once('../models/product.php');
        $product = new Products();
        $productDetail = $product->getAmount($id);
        $amount = 0;
        while ($row = $productDetail->fetch_assoc()) {
            $amount = $amount + $row['quantity'];
        }
        return $amount;
    }
}
