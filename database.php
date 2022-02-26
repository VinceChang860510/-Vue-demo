<?php
session_start();
$hostname="localhost";
$username="user_name";
$password="your_password";
$database_conn="your_db";
$conn=mysql_connect($hostname,$username,$password,$database_conn);//連結伺服器
$conn_sqli = mysqli_connect($hostname,$username,$password,$database_conn);
$mysqli = new mysqli($hostname,$username,$password,$database_conn);


mysql_query("SET NAMES UTF8;");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
mysqli_query($conn_sqli, "SET NAMES utf8");
$mysqli->query("SET NAMES utf8");


function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

?>