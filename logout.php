<?php session_start();
include_once('functions/redirect.php'); 
session_unset();
session_destroy();

redirect("login.php");

