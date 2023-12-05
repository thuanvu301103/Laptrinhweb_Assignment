<?php

class Pharmarcy
{
    private $connection;
    private function connect()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'webDB');
    }

    public function getListPharmacy()
    {
        $this->connect();
        $sql_cmd = "SELECT * FROM stores;";
        $result = $this->connection->query($sql_cmd);

        if ($result->num_rows == 0) {
            echo '<script type="text/javascript">
                alert("Can\'t get list of pharmacy!");
            </script>';
            return;
        } else {
            $this->connection->close();
            return $result;
        }
    }
}
