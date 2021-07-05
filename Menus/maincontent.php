<?php

switch ($a) {
 

  case 1 : {
   include ("../Logout.php");
            break;   
 }
 
 
 //--------Tα cases 1x αφορούν χρήστες------//////
 case 10 : {
            include ("Functions/Employee/ViewAllEmployees.php");
            break;
        }
        
        
        case 11 : {
            include ("Functions/Employee/AddEmployee.php");
            break;
        } 
        
}
