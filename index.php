<?php
include '../config/db.php';

session_start();

if ($_SESSION) {
  header("location: view/dashboard.php");
} else {
  header("location: view/login.php");
}
