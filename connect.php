<?php
$dns="mysql:host=localhost;dbname=simple";
$user="root";

$password="";

$options=[
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
];

$pdo =new pdo($dns,$user,$password,$options);


