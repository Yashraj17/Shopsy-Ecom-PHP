<?php
$conn = mysqli_connect("localhost","root","","shopsy") or die("db fail");
session_start();
function insert($table,$data){
    global $conn;
    $cols = implode(",",array_keys($data));
    $values = implode("','",array_values($data));
    $query = mysqli_query($conn,"insert into $table ($cols) value ('$values')");
    return $query;
}
function callingAlldata($table){
    $array=[];
    global $conn;
    $query = mysqli_query($conn,"select * from $table");
    while ($row = mysqli_fetch_array($query)) {
        $array[] = $row;
    }
    return $array;
}
function specificCalling($table,$sql){
    $array=[];
    global $conn;
    $query = mysqli_query($conn,"select * from $table where $sql");
   $row = mysqli_fetch_array($query);
        $array[] = $row;
    return $array;
}
function singleCalling($table){
 
    global $conn;
    $query = mysqli_query($conn,"select * from $table");
    $row = mysqli_fetch_array($query);
    return $row;
}
function deleteItem($table,$count = NULL){
    global $conn;
    if ($count == NULL) {
        echo "invalid sql query";
    }
    else {
        $query = mysqli_query($conn,"delete from $table where $count");
    }
}
function refresh($page = "index.php"){
    echo "<script>window.open('$page','_self')</script>";
}
?> 