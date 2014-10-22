<?php
session_start();
unset ($_SESSION['name']);
session_unset();
session_destroy();

  header("Location: index.php?msg= you r logged out ");
?>
