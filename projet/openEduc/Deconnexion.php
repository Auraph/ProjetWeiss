<?php
session_start();
unset($_SESSION['droit']);
header("location:ConnexionHTML.php");