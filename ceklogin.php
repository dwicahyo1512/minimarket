<?php

require 'function.php';

if(isset($_SESSION['login'])){
    //sudah login
} else {
    header('location:login.php');
}
?>