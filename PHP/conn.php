<?php

session_start();
$conn = mysqli_connect("localhost" ,"root", "" , "nerumeru");

// Universal Start

// Show All data
function showdata($query) {
    global $conn ;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while($row =  mysqli_fetch_assoc($result)) {
        $rows[]= $row;

    }
    return $rows;

}



?>