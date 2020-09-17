<?php
    function createDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "mystore";
        
        $connection = mysqli_connect($servername, $username, $password);

        if(!$connection){
            die("Connecting to database failed");
        }

        $query = "CREATE DATABASE IF NOT EXISTS $db";

        if(mysqli_query($connection, $query)){
            $connection = mysqli_connect($servername, $username, $password, $db);

            $query = "
                CREATE TABLE IF NOT EXISTS Products(
                    id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(30) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100) NOT NULL 
                );
            ";

            if(mysqli_query($connection, $query)){
                return $connection;
            }else{
                echo "Cannot create table";
            }
        }else{
            echo "Cannot connect to database!";
        }
    }