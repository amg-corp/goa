<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername = "localhost";
$username = "kocusr";
$password = "Koc@2016";
$dbname = "goa_register";

if (!empty($_GET)) {
    $id = $_GET['id'];

    $sql = "UPDATE `enroll` SET `is_approved` = 1 WHERE `id` in (" . $id . ")";

// Create connection
    $conn = mysql_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysql_error());
    }

    mysql_select_db('goa_register');

    $retval = mysql_query($sql, $conn);

    if (!$retval) {
        echo 'fail' . mysql_errno() . " - " . mysql_error();
        exit();
    }
}

