<?php

class DbConnector
{
    public function connect() {
        $connect = mysqli_connect( "172.26.11.68", "root", "vagrant", "vagrant");
        echo "connection successful";
        if ($connect === false) {
            die("Error: Could not connect. " .mysqli_connect_error());
        }
    }

}