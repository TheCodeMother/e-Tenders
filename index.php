<?php
session_start();

require_once 'Classes/DataBase.php';
require_once 'Classes/Employee.php';
require_once 'Classes/Eltender.php';
require_once 'Classes/Elmicrosupply.php';
require_once 'Classes/Department.php';
require_once 'Classes/Closedtender.php';
require_once 'Classes/ClosedMicroSupply.php';


if (isset($_GET['action'])) { // το a (σύνδεση με το maincontent
    $a = $_GET['action'];
} else {
    $a = -1;
}

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- για προσαρμογή οθόνης (κινητό κλπ)-->
        
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
        
        <title> application e_Tenders </title>
        
 
    </head>
    
    
    <body>
        
        <?php
        
    if (!isset($_SESSION['username']))   {
        include 'Menus/loginnavbar.php';
        include 'Menus/login.php';
        

    }
    
    else {
        include 'Menus/navbar.php';
        include 'Menus/body.php';
    }
  
  
  ?>
   
    </body>
</html>

