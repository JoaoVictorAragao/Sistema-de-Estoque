<?php

$inativo = 7200;
ini_set('session.gc_maxlifetime', $inativo);

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
  }

if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inativo)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
//echo $_SESSION['testing'];
$_SESSION['testing'] = time(); // Update session