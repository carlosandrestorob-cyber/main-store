<?php
/*
  Use this Endpoint to test request
  http://localhost/main-store/src/delete_user.php?userID=ANY-ID-NUMBER
*/
include('../settings/database.php');

$userID = $_GET['userID'];

$sql = "DELETE FROM users WHERE id = $1";
$res = pg_query_params($local_conn, $sql, array($userID));

if ($res) {
   echo "<script>alert('User has been deleted successfully !!!')</script>";
header('refresh:0;url=list_users.php');
} else {
    echo "Error deleting user.";
}
