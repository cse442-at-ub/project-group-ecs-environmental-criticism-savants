<?php
    // Use this function to connect to the database. It will return a variable which represents the connection itself,
    // which you should assign to a variable named $pdo. After you are done, ensure to immediately close the connection
    // by setting $pdo to null.
    function get_database_connection($host, $username, $password, $database_name)
    {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Successful db connection"; // Sanity test to check that it connects
            return $pdo;
        } catch (PDOException $e) {
            die("Connection to ocean database failed: " . $e->getMessage());
        }
    }
?>