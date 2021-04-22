<?php 

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }

    // $hostname = "db5001908671.hosting-data.io";
    // $username = "dbu368582";
    // $password = "hvLf3FdqC9MXgN!";
    // $dbname = "dbs1562887";
    
    // $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

    //connexion wamp
    $host="localhost";
    $user="root";
    $password="";
    $dbname="dbs1562887";
    $connection = mysqli_connect($host, $user, $password, $dbname) or die("Database connection not established.")

    ?>