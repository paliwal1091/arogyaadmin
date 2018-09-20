<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getDBConnection() {

    $servername = "localhost";
    $username = "root";
    $password = "123";
    $db = "hmsdb";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}

function setData($sql, $flag) {
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        if ($flag)
            echo '<p class="bg-success msg-success">New record created successfully<p>';
    } else {
        echo ' <p class="bg-danger msg-error"> Invalid or Duplicate Input</p> ';
    }

    mysqli_close($conn);
}

function getData($sql) {
    // Create connection
    $conn = getDBConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        return $result;
    } else {
        return FALSE;
    }

    mysqli_close($conn);
}

function setUpdate($sql, $MSG) {
    $flag = TRUE;
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (mysqli_query($conn, $sql)) {
        if ($MSG)
            echo '<p class="bg-success msg-success">Record updated successfully<p>';
    } else {
        if ($MSG)
            echo '<p class="bg-danger msg-error"> Invalid or Duplicate Input</p>';
        $flag = FALSE;
    }

    mysqli_close($conn);
    return $flag;
}

function setDelete($sql) {
    $flag = TRUE;
    $conn = getDBConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $sql)) {
        echo '<p class="bg-success msg-success">Record deleted successfully</p>';
    } else {
         echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


?>