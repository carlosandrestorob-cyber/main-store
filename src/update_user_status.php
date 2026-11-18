<?php

include('../settings/database.php');

$userID = $_GET['userID'];

$sql = "
UPDATE users
SET status =
CASE
    WHEN status = true THEN false
    ELSE true
END
WHERE id = $1
";

pg_query_params(
    $local_conn,
    $sql,
    array($userID)
);

header("Location: list_users.php");
exit;

?>