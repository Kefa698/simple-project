<?php
//delete a student
require 'connect.php';
if (isset($_GET['id']))
{
    $stm= $pdo->prepare("delete from students where id=?");
    $id = $_GET['id'];
    $stm->execute([$id]);

}
//redirect
header("location:show:php");