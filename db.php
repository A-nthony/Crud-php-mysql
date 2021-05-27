<?php

  session_start();

  $dbserver="remotemysql.com";
  $dbuser="I9bgDB7wXf";
  $dbpass="Uon7OUdT2T";



  try {
    $conn = new PDO("mysql:host=$dbserver;dbname=$dbuser;", $dbuser, $dbpass);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }
?>
