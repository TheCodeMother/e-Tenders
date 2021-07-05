<?php
//Αποσύνδεση του τρέχοντος χρήστη
session_start();

session_unset();

session_destroy();

// Redirect στην Index σελίδα
header("Location: ../index.php"); 

