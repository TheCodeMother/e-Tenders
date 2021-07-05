<?php // ελέγχει τι user type  είναι ο χρήστης και τι λειτουργίες θα υπάρχουν  στη navbar
if ($_SESSION['user_type'] == 11) {
include "ButtonsPerUserType/11AdminButtons.php";
}
if ($_SESSION['user_type'] == 20) {
include "ButtonsPerUserType/20DioikisiButtons.php";
}
if ($_SESSION['user_type'] == 30) {
include "ButtonsPerUserType/30ManagerButtons.php";
}
if ($_SESSION['user_type'] == 40) {
include "ButtonsPerUserType/40AuthorButtons.php";
}


