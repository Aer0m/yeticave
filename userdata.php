<?php

$link = mysqli_connect('127.0.0.1', 'root', '','schema2');
mysqli_set_charset($con,'utf8');

$sql = 'SELECT * FROM users';
$res = mysqli_query($link, $sql);

$rows = mysqli_fetch_all($res, MYSQLI_ASSOC);

$users=[];

foreach ($rows as $row){
    $users[] = $row;
}

?>